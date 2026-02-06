<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CategoryList;
use App\Livewire\CategoryForm;
use App\Livewire\ProductForm;
use App\Livewire\OrderList;
use App\Livewire\OrderDetail;
use App\Livewire\Frontoffice\ProductList as FrontofficeProductList;
use App\Livewire\Frontoffice\ReviewList as FrontofficeReviewList;
use App\Livewire\Frontoffice\CartPage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user && $user->hasRole(['admin', 'seller', 'moderator', 'manager'])) {
        return redirect() -> route('backoffice.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//des routes qui redirigent selon les roles
Route::middleware('auth')->group(function () {
    Route::get('/categories', CategoryList::class)->name('categories.index');

    Route::middleware('role:admin')->group(function () {
        Route::get('/categories/create', CategoryForm::class)->name('categories.create');
        Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
    });

    Route::get('/products', \App\Livewire\ProductList::class)->name('products.index');

    Route::middleware('role:seller')->group(function () {
        Route::get('/products/create', ProductForm::class)->name('products.create');
        Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');
    });

    Route::get('/orders', OrderList::class)->name('orders.index');
    Route::get('/orders/{id}', OrderDetail::class)->name('orders.show');

    Route::get('/reviews', \App\Livewire\ReviewList::class)->name('reviews.index');
});

// Front office routes
Route::middleware('auth')->prefix('shop')->name('shop.')->group(function () {
    Route::get('/products', FrontofficeProductList::class)->name('products.index');
    Route::get('/reviews', FrontofficeReviewList::class)->name('reviews.index');
    Route::get('/cart', CartPage::class)->name('cart');
});

// backoffice avec middleware dial auth et roles
Route::middleware(['auth','role:admin|seller|moderator']) -> prefix('backoffice') -> name('backoffice.') -> group(function ()
{
    // main dashboard
    Route::get('/',function ()
    {
        return view('back-office.index');
    }) -> name('dashboard');

    //orders - utiliser les composants existants
    Route::get('/orders', OrderList::class) -> name('orders.index');
    Route::get('/orders/{id}', OrderDetail::class) ->name('orders.show');

    //Products(seller) - utiliser les composants existants
    Route::middleware('role:seller|admin') -> group(function()
    {
        Route::get('/products', \App\Livewire\ProductList::class) -> name('products.index');
        Route::get('/products/create', ProductForm::class) -> name('products.create');
        Route::get('/products/edit/{id}', ProductForm::class) -> name('products.edit');
    });

    //categories ghir 3end Admin - utiliser les composants existants
    Route::middleware('role:admin') -> group(function ()
    {
        Route::get('/categories', CategoryList::class) -> name('categories.index');
        Route::get('/categories/create', CategoryForm::class) -> name('categories.create');
        Route::get('/categories/edit/{id}', CategoryForm::class) -> name('categories.edit');
    });

    // Reviews - utiliser le composant existant
    Route::get('/reviews', \App\Livewire\ReviewList::class) -> name('reviews.index');

    // users w roles (dial admin)
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', function () {
            return view('back-office.users');
        })->name('users.index');

        Route::get('/roles', function () {
            return view('back-office.roles');
        })->name('roles.index');

        Route::get('/notifications', function ()
        {
            return view('back-office.notifications');
        }) -> name('notifications.index');

        //payements
        Route::get('/payements' , function ()
        {
            return view('back-office.paiements');
        }) -> name('payements.index');
    });
});
require __DIR__.'/auth.php';
