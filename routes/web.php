<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CategoryList;
use App\Livewire\CategoryForm;
use App\Livewire\ProductForm;
use App\Livewire\OrderList;
use App\Livewire\OrderDetail;
<<<<<<< HEAD
use App\Livewire\Frontoffice\ProductList as FrontofficeProductList;
use App\Livewire\Frontoffice\ReviewList as FrontofficeReviewList;
use App\Livewire\Frontoffice\CartPage;
use App\Livewire\Frontoffice\CategoryList as FrontofficeCategoryList;
use App\Livewire\Frontoffice\OrderList as FrontofficeOrderList;
use App\Livewire\Frontoffice\CheckoutPage;
use App\Livewire\Frontoffice\OrderConfirmation;
use App\Livewire\Frontoffice\OrderDetail as FrontofficeOrderDetail;
use App\Livewire\UserModeration;
=======
use App\Livewire\ReviewList;
use App\Livewire\CartPage;
use App\Livewire\AdminDashboard;
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user && $user->hasRole(['admin', 'moderator', 'seller'])) {
        return redirect()->route('backoffice.dashboard');
    }

    return redirect()->route('products.index');
})->middleware(['auth', 'verified'])->name('dashboard');


//des routes qui redirigent selon les roles
Route::middleware('auth')->group(function () {
    // Removed old orders routes - now handled in frontoffice
});

<<<<<<< HEAD
// Front office routes (customers only)
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/products', FrontofficeProductList::class)->name('products.index');
    Route::get('/reviews', FrontofficeReviewList::class)->name('reviews.index');
=======

Route::middleware('auth')->group(function () {

    // Admin Dashboard - Only for admin role
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    });

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

>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
    Route::get('/cart', CartPage::class)->name('cart');
    Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/order-confirmation/{order}', OrderConfirmation::class)->name('order.confirmation');
    Route::get('/categories', FrontofficeCategoryList::class)->name('categories.index');
    Route::get('/my-orders', FrontofficeOrderList::class)->name('my-orders.index');
    Route::get('/my-orders/{id}', FrontofficeOrderDetail::class)->name('my-orders.show');
});

<<<<<<< HEAD
// backoffice avec middleware dial auth et roles
Route::middleware(['auth','role:admin|seller|moderator']) -> prefix('backoffice') -> name('backoffice.') -> group(function ()
{
    // main dashboard
    Route::get('/', DashboardController::class)->name('dashboard');

    //orders - utiliser les composants existants
    Route::get('/orders', OrderList::class) -> name('orders.index');
    Route::get('/orders/{id}', OrderDetail::class) ->name('orders.show');
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    //Products(seller) - utiliser les composants existants
    Route::middleware('role:seller|admin') -> group(function()
    {
        Route::get('/products', \App\Livewire\ProductList::class) -> name('products.index');
        Route::get('/products/create', ProductForm::class) -> name('products.create');
        Route::get('/products/edit/{id}', ProductForm::class) -> name('products.edit');
    });

    //categories - sellers can manage categories too
    Route::middleware('role:admin|seller') -> group(function ()
    {
        Route::get('/categories', CategoryList::class) -> name('categories.index');
        Route::get('/categories/create', CategoryForm::class) -> name('categories.create');
        Route::get('/categories/edit/{id}', CategoryForm::class) -> name('categories.edit');
    });

    // Reviews - utiliser le composant existant
    Route::get('/reviews', \App\Livewire\ReviewList::class) -> name('reviews.index');

    // Users moderation (admin & moderator)
    Route::middleware('role:admin|moderator')->group(function () {
        Route::get('/users', UserModeration::class)->name('users.index');
    });

    // users w roles (dial admin)
    Route::middleware('role:admin')->group(function () {
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
=======
require __DIR__.'/auth.php';
>>>>>>> 88e84881e59668fbfb56a59ae221eb778e98face
