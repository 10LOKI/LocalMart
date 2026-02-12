<?php

namespace App\Livewire\Frontoffice;

use App\Models\Cart;
use App\Models\Order;
use App\Services\RealtimeNotificationService;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CheckoutPage extends Component
{
    public $shipping_name = '';
    public $shipping_phone = '';
    public $shipping_address = '';
    public $shipping_city = '';

    public function mount()
    {
        $cart = $this->getActiveCart();

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()->route('cart');
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'shipping_name' => ['required', 'string', 'max:255'],
            'shipping_phone' => ['required', 'string', 'max:50'],
            'shipping_address' => ['required', 'string', 'max:255'],
            'shipping_city' => ['required', 'string', 'max:255'],
        ]);

        $cart = $this->getActiveCart();
        if (! $cart || $cart->items->isEmpty()) {
            session()->flash('error', 'Your cart is empty.');
            return redirect()->route('cart');
        }

        try {
            $order = DB::transaction(function () use ($cart) {
                $cart->loadMissing('items.product');

                $total = 0;

                foreach ($cart->items as $item) {
                    $product = $item->product;
                    if (! $product) {
                        throw new \RuntimeException('A product in your cart is no longer available.');
                    }

                    if ($item->quantity < 1) {
                        throw new \RuntimeException('Invalid quantity detected in your cart.');
                    }

                    if (! is_null($product->stock) && $product->stock < $item->quantity) {
                        throw new \RuntimeException("Not enough stock for {$product->name}.");
                    }

                    $total += $product->price * $item->quantity;
                }

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'total' => $total,
                    'status' => 'on_hold',
                    'address' => $this->shipping_address . ', ' . $this->shipping_city,
                    'shipping_name' => $this->shipping_name,
                    'shipping_phone' => $this->shipping_phone,
                    'shipping_address' => $this->shipping_address,
                    'shipping_city' => $this->shipping_city,
                ]);

                foreach ($cart->items as $item) {
                    $product = $item->product;
                    $order->items()->create([
                        'product_id' => $product->id,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                    ]);

                    if (! is_null($product->stock)) {
                        $product->decrement('stock', $item->quantity);
                    }
                }

                $cart->update(['status' => 'ordered']);

                return $order;
            });
        } catch (\Throwable $e) {
            report($e);
            session()->flash('error', $e->getMessage());
            return;
        }

        $notificationService = app(RealtimeNotificationService::class);
        $notificationService->sendToUser(
            $order->user_id,
            'Order created',
            "Order {$order->order_number} was created. Complete payment to confirm it.",
            'info',
            ['order_id' => $order->id]
        );

        $notificationService->sendToRoles(
            ['admin', 'seller'],
            'New order',
            "A new order ({$order->order_number}) was placed.",
            'info',
            ['order_id' => $order->id]
        );

        session()->flash('message', 'Order created. Continue to secure payment.');

        return redirect()->route('payments.checkout', $order->id);
    }

    public function render()
    {
        $cart = $this->getActiveCart();

        $total = 0;
        if ($cart) {
            $total = $cart->items->sum(function ($item) {
                $price = $item->product?->price ?? 0;
                return $price * $item->quantity;
            });
        }

        return view('livewire.frontoffice.checkout-page', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    private function getActiveCart()
    {
        return Cart::where('user_id', auth()->id())
            ->where('status', 'active')
            ->with('items.product.photos')
            ->first();
    }
}
