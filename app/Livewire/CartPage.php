<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;

use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class CartPage extends Component
{
    public function remove($itemId)
    {
        CartItem::find($itemId)->delete();
    }

    public function render()
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $total = $cart ? $cart->items->sum(fn($item) => $item->product->price * $item->quantity) : 0;

        return view('livewire.cart-page', compact('cart', 'total'));
    }
}