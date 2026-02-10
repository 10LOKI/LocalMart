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
    
    // Store only the ID instead of the full product object
    public $selectedProductId = null;
    public $showModal = false;
    
    public $newComment = '';
    public $newRating = 0;

    public $quantity = 1;

    // Check if current user is a seller
    public function isSeller()
    {
        return auth()->user()->hasRole('seller');
    }

    // Check if current user is a customer
    public function isCustomer()
    {
        return auth()->user()->hasRole('customer');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        
        if (($this->isSeller() && $product->seller_id == auth()->id())|| auth()->user()->hasRole('moderator')) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        } elseif (auth()->user()->hasRole('admin')) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
    }

    public function render()
    {
        $query = Product::with(['category', 'seller', 'photos', 'likes', 'reviews']);
        
        // SELLER VIEW: Show only their products
        if ($this->isSeller()) {
            $query->where('seller_id', auth()->id());
        }
        
        // CUSTOMER VIEW: Show all products from all sellers
        // (no additional filter needed)

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

        $selectedProduct = null;
        if ($this->selectedProductId) {
            $selectedProduct = Product::with([
                'photos', 
                'category', 
                'seller',
                'reviews.user',
                'likes'
            ])->find($this->selectedProductId);
        }

        return view('livewire.frontoffice.product-list', [
            'products' => $query->get(),
            'categories' => Category::all(),
            'selectedProduct' => $selectedProduct,
            'isSeller' => $this->isSeller(),
            'isCustomer' => $this->isCustomer()
        ]);
    }

    public function preview($productId)
    {
        // Store only the ID
        $this->selectedProductId = $productId;
        
        // Only set quantity for customers
        if ($this->isCustomer()) {
            $cart = auth()->user()->getOrCreateCart();
            $cartItem = $cart->items()->where('product_id', $productId)->first();
            $this->quantity = $cartItem ? $cartItem->quantity : 1;
        }
        
        $this->showModal = true;
        $this->resetComment();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProductId = null;
        $this->resetComment();
    }

    // CUSTOMER ONLY: Toggle like
    public function toggleLike($productId)
    {
        if (!$this->isCustomer()) {
            session()->flash('error', 'Only customers can like products.');
            return;
        }

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
    }

    public function isLiked($productId)
    {
        if (!$this->isCustomer()) {
            return false;
        }
        
        return Like::where('product_id', $productId)
                   ->where('user_id', auth()->id())
                   ->exists();
    }

    // CUSTOMER ONLY: Submit review
    public function submitComment()
    {
        if (!$this->isCustomer()) {
            session()->flash('error', 'Only customers can submit reviews.');
            return;
        }

        $this->validate([
            'newComment' => 'required|min:3|max:500',
            'newRating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'product_id' => $this->selectedProductId,
            'user_id' => auth()->id(),
            'rating' => $this->newRating,
            'comment' => $this->newComment
        ]);
        
        session()->flash('message', 'Review submitted successfully!');
        $this->resetComment();
    }

    public function deleteComment($reviewId)
    {
        $review = Review::find($reviewId);
        
        if (($review && $review->user_id == auth()->id())|| auth()->user()->hasRole('moderator')) {
            $review->delete();
            session()->flash('message', 'Review deleted successfully!');
        }
    }

    private function resetComment()
    {
        $this->newComment = '';
        $this->newRating = 0;
    }

    public function getAverageRating($product)
    {
        if ($product->reviews->count() == 0) {
            return 0;
        }
        return round($product->reviews->avg('rating'), 1);
    }

    // CUSTOMER ONLY: Add to cart
    public function addToCart($productId)
    {
        if (!$this->isCustomer()) {
            session()->flash('error', 'Only customers can add products to cart.');
            return;
        }

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

    // SELLER ONLY: Navigate to edit product
    public function editProduct($productId)
    {
        if ($this->isSeller()) {
            return redirect()->route('products.edit', ['id' => $productId]);
        }
    }
}
