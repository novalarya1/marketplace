<?php

use Illuminate\Support\Facades\Route;

// ===========================
// HOMEPAGE
// ===========================
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;

        return match ($role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'vendor'  => redirect()->route('vendor.dashboard'),
            'customer'=> redirect()->route('customer.dashboard'),
            default   => redirect()->route('login'),
        };
    }

    return redirect()->route('login');
});

// Include auth routes
require __DIR__.'/auth.php';

// ===========================
// ADMIN ROUTES
// ===========================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    });

// ===========================
// VENDOR ROUTES
// ===========================
Route::middleware(['auth', 'role:vendor'])
    ->prefix('vendor')
    ->as('vendor.')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Vendor\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', \App\Http\Controllers\Vendor\ProductController::class);
    });

// ===========================
// CUSTOMER ROUTES
// ===========================
Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->as('customer.')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Customer\DashboardController::class, 'index'])
            ->name('dashboard');

        // Products
        Route::get('/products', [\App\Http\Controllers\Customer\ProductController::class, 'index'])
            ->name('products.index');
        Route::get('/products/{id}', [\App\Http\Controllers\Customer\ProductController::class, 'show'])
            ->name('products.show');

        // Orders
        Route::get('/orders', [\App\Http\Controllers\Customer\OrderController::class, 'index'])
            ->name('orders.index');
        Route::post('/orders', [\App\Http\Controllers\Customer\OrderController::class, 'store'])
            ->name('orders.store');

        // Cart
        Route::get('/cart', [\App\Http\Controllers\Customer\CartController::class, 'index'])
            ->name('cart.index');
        Route::get('/cart/add/{id}', [\App\Http\Controllers\Customer\CartController::class, 'add'])
            ->name('cart.add');
        Route::post('/cart', [\App\Http\Controllers\Customer\CartController::class, 'store'])
            ->name('cart.store');
        Route::patch('/cart/{id}', [\App\Http\Controllers\Customer\CartController::class, 'update'])
            ->name('cart.update');
        Route::delete('/cart/{id}', [\App\Http\Controllers\Customer\CartController::class, 'remove'])
            ->name('cart.remove');

        // Wishlist
        Route::get('/wishlist', [\App\Http\Controllers\Customer\WishlistController::class, 'index'])
            ->name('wishlist.index');
        Route::post('/wishlist/add', [\App\Http\Controllers\Customer\WishlistController::class, 'store'])
            ->name('wishlist.add');
        Route::delete('/wishlist/{productId}', [\App\Http\Controllers\Customer\WishlistController::class, 'destroy'])
            ->name('wishlist.destroy');


    });
