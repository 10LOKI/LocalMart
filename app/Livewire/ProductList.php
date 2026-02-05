<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class ProductList extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $sortBy = 'newest';

    public function delete($id)
    {
        $product = Product::find($id);
        
        // Check if user is seller and owns this product
        if (auth()->user()->hasRole('seller') && $product->seller_id == auth()->id()) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
    }

    public function render()
    {
        $query = Product::with('category', 'seller', 'photos');
        
        // Filter by seller if user is a seller
        if (auth()->user()->hasRole('seller')) {
            $query->where('seller_id', auth()->id());
        }

        // Search functionality
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Category filter
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Sorting
        switch ($this->sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        return view('livewire.product-list', [
            'products' => $query->get(),
            'categories' => Category::all()
        ]);
    }
}