<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\Layout;

#[Layout('layouts.backoffice')]
class ProductList extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $sortBy = 'newest';

    public $quantity = 1;


    public function delete($id)
    {
        $product = Product::find($id);

        if (auth()->user()->hasRole('seller') && $product->seller_id == auth()->id()) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        } elseif (auth()->user()->hasRole('admin')) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
    }

    public function render()
    {
        $query = Product::with(['category', 'seller', 'photos']);

        if (auth()->user()->hasRole('seller')) {
            $query->where('seller_id', auth()->id());
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

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

    public function preview($productId)
    {
        $this->selectedProduct = Product::with([
            'photos', 
            'category', 
            'seller',
            'reviews.user',
            'likes'
        ])->findOrFail($productId);
        
        $cart = auth()->user()->getOrCreateCart();
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        
        $this->quantity = $cartItem ? $cartItem->quantity : 1;
        
        $this->showModal = true;
        $this->resetComment();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProduct = null;
        $this->resetComment();
    }

    public function toggleLike($productId)
    {
        $userId = auth()->id();
        $like = Like::where('product_id', $productId)
                    ->where('user_id', $userId)
                    ->first();

        if ($like) {
            $like->delete();
            session()->flash('message', "We're Sorry It Didn't Meet Your Satisfaction :(...");
        } else {
            Like::create([
                'product_id' => $productId,
                'user_id' => $userId
            ]);
            session()->flash('message', "You Liked The Product, We'd Love To Hear Your Review About It.");
        }
       
        if ($this->selectedProduct && $this->selectedProduct->id == $productId) {
            $this->selectedProduct->load('likes');
        }
    }

    public function isLiked($productId)
    {
        return Like::where('product_id', $productId)
                   ->where('user_id', auth()->id())
                   ->exists();
    }

    public function submitComment()
    {
        $this->validate([
            'newComment' => 'required|min:3|max:500',
            'newRating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'product_id' => $this->selectedProduct->id,
            'user_id' => auth()->id(),
            'rating' => $this->newRating,
            'comment' => $this->newComment
        ]);
       
        $this->selectedProduct->load('reviews.user');
        
        session()->flash('message', 'Review submitted successfully!');
        $this->resetComment();
    }

    public function deleteComment($reviewId)
    {
        $review = Review::find($reviewId);
        
        if ($review && $review->user_id == auth()->id()) {
            $review->delete();
            $this->selectedProduct->load('reviews.user');
            session()->flash('message', 'Review deleted successfully!');
        }
    }

    private function resetComment()
    {
        $this->newComment = '';
        $this->newRating = 5;
    }

    public function getAverageRating($product)
    {
        if ($product->reviews->count() == 0) {
            return 0;
        }
        return round($product->reviews->avg('rating'), 1);
    }

    public function addToCart($productId)
    {
        $cart = auth()->user()->getOrCreateCart();
                
        $item = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->update(['quantity' => $this->quantity]);
            session()->flash('message', 'Product quantity updated in cart!');
        } else {
            $product = Product::findOrFail($productId);

            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $this->quantity,
                'price' => $product->price,
            ]);
            
            session()->flash('message', 'Product added to cart!');
        }
    }
    public function incrementQuantity()
{
    $this->quantity++;
}

public function decrementQuantity()
{
    if ($this->quantity > 1) {
        $this->quantity--;
    }
}
}
