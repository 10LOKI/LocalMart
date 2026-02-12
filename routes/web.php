<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CategoryList;
use App\Livewire\CategoryForm;
use App\Livewire\ProductList;
use App\Livewire\ProductForm;
use App\Livewire\OrderList;
use App\Livewire\OrderDetail;
use App\Livewire\ReviewList;
use App\Livewire\CartPage;
use App\Livewire\Frontoffice\CheckoutPage;
use App\Livewire\Frontoffice\OrderConfirmation;
use App\Livewire\Frontoffice\OrderDetail as FrontofficeOrderDetail;
use App\Livewire\Frontoffice\OrderList as FrontofficeOrderList;
use App\Livewire\UserModeration;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user && $user->hasAnyRole(['admin', 'seller', 'moderator'])) {
        return redirect()->route('backoffice.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {

    Route::get('/categories', CategoryList::class)->name('categories.index');

    Route::middleware('role:admin|seller')->group(function () {
        Route::get('/categories/create', CategoryForm::class)->name('categories.create');
        Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
    });

    Route::get('/products', ProductList::class)->name('products.index');

    Route::middleware('role:admin|seller')->group(function () {
        Route::get('/products/create', ProductForm::class)->name('products.create');
        Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');
    });

    Route::get('/orders/{order}/pay', [PaymentController::class, 'checkout'])->name('payments.checkout');
    Route::get('/payments/stripe/success', [PaymentController::class, 'stripeSuccess'])->name('payments.stripe.success');
    Route::get('/payments/stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('payments.stripe.cancel');

    Route::get('/reviews', ReviewList::class)->name('reviews.index');
    Route::get('/cart', CartPage::class)->name('cart');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/my-orders', FrontofficeOrderList::class)->name('my-orders.index');
    Route::get('/my-orders/{id}', FrontofficeOrderDetail::class)->name('my-orders.show');
    Route::get('/order-confirmation/{order}', OrderConfirmation::class)->name('order.confirmation');
});

Route::middleware(['auth', 'role:admin|seller|moderator'])->group(function () {
    Route::get('/orders', OrderList::class)->name('orders.index');
    Route::get('/orders/{id}', OrderDetail::class)->name('orders.show');
});

Route::middleware(['auth', 'role:admin|seller|moderator'])
    ->prefix('backoffice')
    ->name('backoffice.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('/orders', OrderList::class)->name('orders.index');
        Route::get('/orders/{id}', OrderDetail::class)->name('orders.show');
        Route::get('/products', ProductList::class)->name('products.index');
        Route::get('/reviews', ReviewList::class)->name('reviews.index');

        Route::middleware('role:admin|seller')->group(function () {
            Route::get('/products/create', ProductForm::class)->name('products.create');
            Route::get('/products/edit/{id}', ProductForm::class)->name('products.edit');

            Route::get('/categories', CategoryList::class)->name('categories.index');
            Route::get('/categories/create', CategoryForm::class)->name('categories.create');
            Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
        });

        Route::middleware('role:admin|moderator')->group(function () {
            Route::get('/users', UserModeration::class)->name('users.index');
        });

        Route::middleware('role:admin')->group(function () {
            Route::view('/roles', 'back-office.roles')->name('roles.index');
            Route::view('/notifications', 'back-office.notifications')->name('notifications.index');
            Route::view('/payements', 'back-office.paiements')->name('payements.index');
        });
    });

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return redirect()->route('backoffice.dashboard');
})->name('admin.dashboard');

require __DIR__.'/auth.php';
