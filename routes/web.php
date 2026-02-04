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


Route::middleware('auth')->group(function () {

    Route::get('/categories', CategoryList::class);

Route::middleware('role:admin')->group(function () {
    Route::get('/categories/create', CategoryForm::class);
    Route::get('/categories/edit/{id}', CategoryForm::class);
});

    Route::get('/products', ProductList::class);
    Route::get('/products/create', ProductForm::class);
    Route::get('/products/edit/{id}', ProductForm::class);


    Route::get('/orders', OrderList::class);
    Route::get('/orders/{id}', OrderDetail::class);


    Route::get('/reviews', ReviewList::class);


    Route::get('/cart', CartPage::class);
});

require __DIR__.'/auth.php';
