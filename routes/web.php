<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
//des routes qui redirigent selon les roles
Route::middleware('auth')->group(function () {
    Route::get('/categories', CategoryList::class)->name('categories.index');

    Route::middleware('role:admin')->group(function () {
        Route::get('/categories/create', CategoryForm::class)->name('categories.create');
        Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
    });

    Route::get('/products', ProductList::class)->name('products.index');

    Route::middleware('role:seller')->group(function () {    
        Route::get('/products/create', ProductForm::class)->name('products.create');
        Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');
    });

    Route::get('/orders', OrderList::class)->name('orders.index');
    Route::get('/orders/{id}', OrderDetail::class)->name('orders.show');

    Route::get('/reviews', ReviewList::class)->name('reviews.index');

    Route::get('/cart', CartPage::class)->name('cart');
});

require __DIR__.'/auth.php';    
