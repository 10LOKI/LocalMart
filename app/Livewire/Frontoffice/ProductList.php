<?php

namespace App\Livewire\Frontoffice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Like;
use App\Models\Review;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = '';
    public $sortBy = 'newest';
    public $perPage = 12;
    
    public $selectedProduct = null;
    public $showModal = false;
    public $quantity = 1;
    
    public $newComment = '';
    public $newRating = 5;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'sortBy' => ['except' => 'newest'],
    ];

    public function mount(): void
    {
        $this->perPage = (int) config('pagination.products', 12);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedSortBy(): void
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        
        if (auth()->user()->hasRole('seller') && $product->seller_id == auth()->id()) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
    }
 
    public function render()
    {
        $query = Product::with(['category', 'seller', 'photos', 'likes', 'reviews']);
        
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

        return view('livewire.frontoffice.product-list', [
            'products' => $query->paginate($this->perPage),
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
        
        $this->showModal = true;
        $this->resetComment();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProduct = null;
        $this->quantity = 1;
        $this->resetComment();
    }

    public function incrementQuantity()
    {
        if ($this->selectedProduct && $this->quantity < $this->selectedProduct->stock) {
            $this->quantity++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
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

    public function addToCart($productId, $quantity = null)
    {
        $cart = auth()->user()->getOrCreateCart();
        
        // Use provided quantity or default to the component's quantity property
        $qty = $quantity ?? $this->quantity;

        $item = $cart->items()
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $product = $item->product;
            if ($product && ! is_null($product->stock) && ($item->quantity + $qty) > $product->stock) {
                session()->flash('message', 'Not enough stock available for this product.');
                return;
            }

            $item->increment('quantity', $qty);
            session()->flash('message', 'Product quantity updated in cart!');
        } else {
            $product = Product::findOrFail($productId);
            if (! is_null($product->stock) && $qty > $product->stock) {
                session()->flash('message', 'Not enough stock available for this product.');
                return;
            }

            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $qty,
                'price' => $product->price,
            ]);
            
            session()->flash('message', 'Product added to cart!');
        }
        
        // Reset quantity after adding to cart
        $this->quantity = 1;
    }

    public function checkout()
    {
        if (! $this->selectedProduct) {
            return;
        }

        $this->addToCart($this->selectedProduct->id, $this->quantity);

        return redirect()->route('checkout');
    }
}
