<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Services\RealtimeNotificationService;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.app')]
class CartPage extends Component
{
    public function remove($itemId)
    {
        $item = CartItem::find($itemId);
        
        if ($item && $item->cart->user_id == auth()->id()) {
            $item->delete();
            session()->flash('message', 'Item removed from cart!');
        }
    }

    public function updateQuantity($itemId, $quantity)
    {
        if ($quantity < 1) {
            return;
        }

        $item = CartItem::find($itemId);
        
        if ($item && $item->cart->user_id == auth()->id()) {
            $item->update(['quantity' => $quantity]);
            session()->flash('message', 'Quantity updated!');
        }
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        DB::beginTransaction();

        try {
            foreach ($cart->items as $item) {
                $product = $item->product;

                if ($item->quantity > $product->stock) {
                    DB::rollBack();

                    session()->flash(
                        'error',
                        "Not enough stock for {$product->name}"
                    );
                    return;
                }
            }

            $total = $cart->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total' => $total,
                'status' => 'on_hold',
                'address' => auth()->user()->address ?? 'Default Address',
            ]);

            foreach ($cart->items as $item) {
                $product = $item->product;

                $product->decrement('stock', $item->quantity);

                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            $cart->update(['status' => 'ordered']);

            DB::commit();

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

            session()->flash(
                'message',
                'Order created. Continue to secure payment.'
            );

            return redirect()->route('payments.checkout', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Something went wrong. Please try again.');
            return;
        }
    }


    public function render()
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->where('status', 'active')
                    ->with('items.product.photos')
                    ->first();
        
        $total = 0;
        
        if ($cart) {
            $total = $cart->items->sum(function($item) {
                return $item->price * $item->quantity;
            });
        }

        return view('livewire.frontoffice.cart-page', compact('cart', 'total'));
    }
}
