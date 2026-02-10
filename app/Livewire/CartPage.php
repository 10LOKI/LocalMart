<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Livewire\Attributes\Layout;

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

        
        $total = $cart->items->sum(function($item) {
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
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

       
        $cart->update(['status' => 'ordered']);

        session()->flash('message', 'Order placed successfully! Order number: ' . $order->order_number);
        
        return redirect()->route('orders.show', $order->id);
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