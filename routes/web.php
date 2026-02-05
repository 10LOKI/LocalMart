<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CategoryList;
use App\Livewire\CategoryForm;
use App\Livewire\ProductList;
use App\Livewire\ProductForm;
use App\Livewire\OrderList;
use App\Livewire\OrderDetail;
use App\Livewire\ReviewList;
use App\Livewire\CartPage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () { return view('back-office.index');})->name('dashboard');
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/categories/create', CategoryForm::class)->name('categories.create');
    Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/products/create', ProductForm::class)->name('products.create');
    Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');
    Route::get('/orders', OrderList::class)->name('orders');
    Route::get('/orders/{id}', OrderDetail::class)->name('orders.detail');
    Route::get('/reviews', ReviewList::class)->name('reviews');
});

// Routes Seller
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', function () { return view('seller.dashboard'); })->name('dashboard');
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/products/create', ProductForm::class)->name('products.create');
    Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');
});

// Routes Customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/orders', OrderList::class)->name('orders');
    Route::get('/orders/{id}', OrderDetail::class)->name('orders.detail');
    Route::get('/reviews', ReviewList::class)->name('reviews');
    Route::get('/cart', CartPage::class)->name('cart');
});

require __DIR__.'/auth.php';
