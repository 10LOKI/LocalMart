<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
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
            $product = $item->product;
            if (! $product) {
                session()->flash('error', 'This product is no longer available.');
                return;
            }

            if (! is_null($product->stock) && $quantity > $product->stock) {
                session()->flash('error', 'Not enough stock available for this product.');
                return;
            }

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

        if (! $cart || $cart->items->isEmpty()) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

<<<<<<< HEAD:app/Livewire/Frontoffice/CartPage.php
        return redirect()->route('checkout');
=======
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

            session()->flash(
                'message',
                'Order placed successfully! Order number: ' . $order->order_number
            );

            return redirect()->route('orders.show', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Something went wrong. Please try again.');
            return;
        }
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face:app/Livewire/CartPage.php
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
