<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
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
    public $orderStatusFilter = '';
    public $productStatusFilter = '';
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
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'Livrée')->sum('total'),
            'pending_orders' => Order::where('status', 'En attente')->count(),
            'paid_orders' => Order::where('status', 'Payée')->count(),
            'delivered_orders' => Order::where('status', 'Livrée')->count(),
            'total_reviews' => Review::count(),
            'avg_rating' => Review::avg('rating') ?? 0,
            'low_stock_products' => Product::where('stock', '<', 10)->count(),
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

    // Order Management
    public function updateOrderStatus($orderId, $status)
    {
        Order::findOrFail($orderId)->update(['status' => $status]);
        session()->flash('message', 'Order status updated successfully!');
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

            case 'orders':
                $data['orders'] = Order::with(['user', 'items'])
                    ->when($this->orderStatusFilter, function ($query) {
                        $query->where('status', $this->orderStatusFilter);
                    })
                    ->when($this->dateFrom, function ($query) {
                        $query->whereDate('created_at', '>=', $this->dateFrom);
                    })
                    ->when($this->dateTo, function ($query) {
                        $query->whereDate('created_at', '<=', $this->dateTo);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
                break;

            case 'reviews':
                $data['reviews'] = Review::with(['user', 'product'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
                break;

            case 'analytics':
                $data['monthly_revenue'] = Order::selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
                    ->where('status', 'Livrée')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
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