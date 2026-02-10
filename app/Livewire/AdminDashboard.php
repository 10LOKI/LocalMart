<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class AdminDashboard extends Component
{
    use WithPagination;

    // Active tab management
    public $activeTab = 'overview';

    // User role management
    public $selectedUser;
    public $selectedRoles = [];
    public $searchUsers = '';

    // Statistics
    public $stats = [];

    // Filters
    public $productStatusFilter = '';
    public $searchCategories = '';
    public $dateFrom = '';
    public $dateTo = '';

    // Modals
    public $showUserRoleModal = false;

    protected $queryString = ['activeTab'];

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $this->stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_reviews' => Review::count(),
            'avg_rating' => Review::avg('rating') ?? 0,
            'low_stock_products' => Product::where('stock', '<', 10)->count(),
            'products_per_category' => Category::withCount('products')->get(),
        ];
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    // User Role Management
    public function openUserRoleModal($userId)
    {
        $this->selectedUser = User::with('roles')->find($userId);
        $this->selectedRoles = $this->selectedUser->roles->pluck('name')->toArray();
        $this->showUserRoleModal = true;
    }

    public function updateUserRoles()
    {
        $this->validate([
            'selectedRoles' => 'required|array|min:1',
        ]);

        $this->selectedUser->syncRoles($this->selectedRoles);

        session()->flash('message', 'User roles updated successfully!');
        $this->showUserRoleModal = false;
        $this->selectedUser = null;
        $this->selectedRoles = [];
    }

    public function deleteUser($userId)
    {
        if (auth()->id() === $userId) {
            session()->flash('error', 'You cannot delete your own account!');
            return;
        }

        User::findOrFail($userId)->delete();
        session()->flash('message', 'User deleted successfully!');
        $this->loadStatistics();
    }

    // Product Management
    public function toggleProductStatus($productId)
    {
        $product = Product::findOrFail($productId);
        $product->update(['stock' => $product->stock > 0 ? 0 : 10]);
        session()->flash('message', 'Product status updated!');
    }

    public function deleteProduct($productId)
    {
        Product::findOrFail($productId)->delete();
        session()->flash('message', 'Product deleted successfully!');
        $this->loadStatistics();
    }

    // Category Management
    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        
        // Check if category has products
        if ($category->products()->count() > 0) {
            session()->flash('error', 'Cannot delete category with existing products!');
            return;
        }
        
        $category->delete();
        session()->flash('message', 'Category deleted successfully!');
        $this->loadStatistics();
    }

    // Review Moderation
    public function deleteReview($reviewId)
    {
        Review::findOrFail($reviewId)->delete();
        session()->flash('message', 'Review deleted successfully!');
        $this->loadStatistics();
    }

    public function render()
    {
        $data = [];

        switch ($this->activeTab) {
            case 'users':
                $data['users'] = User::with('roles')
                    ->when($this->searchUsers, function ($query) {
                        $query->where('name', 'like', '%' . $this->searchUsers . '%')
                            ->orWhere('email', 'like', '%' . $this->searchUsers . '%');
                    })
                    ->paginate(15);
                $data['roles'] = Role::all();
                break;

            case 'products':
                $data['products'] = Product::with(['seller', 'category'])
                    ->when($this->productStatusFilter === 'low_stock', function ($query) {
                        $query->where('stock', '<', 10);
                    })
                    ->when($this->productStatusFilter === 'out_of_stock', function ($query) {
                        $query->where('stock', 0);
                    })
                    ->paginate(15);
                break;

            case 'categories':
                $data['categories'] = Category::withCount('products')
                    ->when($this->searchCategories, function ($query) {
                        $query->where('name', 'like', '%' . $this->searchCategories . '%');
                    })
                    ->paginate(15);
                break;

            case 'reviews':
                $data['reviews'] = Review::with(['user', 'product'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
                break;

            case 'analytics':
                $data['category_distribution'] = Category::withCount('products')
                    ->having('products_count', '>', 0)
                    ->orderBy('products_count', 'desc')
                    ->get();

                $data['top_products'] = Product::withCount('orderItems')
                    ->orderBy('order_items_count', 'desc')
                    ->limit(10)
                    ->get();

                $data['top_sellers'] = User::role('seller')
                    ->withCount('products')
                    ->withSum('products', 'stock')
                    ->orderBy('products_count', 'desc')
                    ->limit(10)
                    ->get();
                break;
        }

        return view('livewire.backoffice.admin-dashboard', array_merge($data, [
            'stats' => $this->stats
        ]));
    }
}