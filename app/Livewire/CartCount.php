<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;



class CartCount extends Component
{
    #[On('cartUpdated')]
    public function refreshComponent()
    {
    }
    
    public function render()
    {
        
        $count = Cart::where('user_id', auth()->id())
            ->where('status', 'active')
            ->withCount('items')
            ->first()?->items_count ?? 0;

        return view('livewire.cart-count', [
            'count' => $count
        ]);

}
}