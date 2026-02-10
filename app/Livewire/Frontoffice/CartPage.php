<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
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

        return redirect()->route('checkout');
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
