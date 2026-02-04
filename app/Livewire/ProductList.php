<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class ProductList extends Component
{
    public function delete($id)
    {
        Product::find($id)->delete();
    }

    public function render()
    {
        $query = Product::with('category');
        
        if (auth()->user()->hasRole('seller')) {
            $query->where('seller_id', auth()->id());
        }

        return view('livewire.product-list', [
            'products' => $query->get()
        ]);
    }
}