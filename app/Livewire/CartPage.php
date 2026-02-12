<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewOrderNotification;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

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

            // Send emails (non-blocking)
            try {
                $order->user->notify(new NewOrderNotification($order));
                $sellers = $order->items->pluck('product.seller')->unique()->filter();
                foreach ($sellers as $seller) {
                    $seller->notify(new NewOrderNotification($order));
                }
            } catch (\Exception $e) {
                \Log::warning('Email notification failed: ' . $e->getMessage());
            }

            session()->flash(
                'message',
                'Order placed successfully! Order number: ' . $order->order_number
            );

            return redirect()->route('orders.show', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            
            session()->flash('error', 'Error: ' . $e->getMessage());
            \Log::error('Checkout error: ' . $e->getMessage());
            return;
        }
    }

    public function checkoutWithStripe()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $line_items = [];
        foreach ($cart->items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->price * 100, // Convert to cents
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cart'),
            'metadata' => [
                'cart_id' => $cart->id,
                'user_id' => auth()->id(),
            ],
        ]);

        return redirect($session->url);
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