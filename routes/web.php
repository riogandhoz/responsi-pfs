<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\LooginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Category Routes
Route::get('/category/brownies-kukus', function () {
    return view('categories.brownies-kukus');
})->name('category.kukus');

Route::get('/category/brownies-panggang', function () {
    return view('categories.brownies-panggang');
})->name('category.panggang');

Route::get('/category/brownies-oven', function () {
    return view('categories.brownies-oven');
})->name('category.oven');

// Authentication Required Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Orders
    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::controller(CartController::class)->group(function () {
        Route::get('/beli', 'index')->name('beli.index');
        Route::post('/beli', 'store')->name('beli.store');
        Route::patch('/beli/{cart}', 'update')->name('beli.update');
        Route::delete('/beli/{cart}', 'destroy')->name('beli.destroy');
        Route::post('/beli/apply-coupon', 'applyCoupon')->name('beli.applyCoupon');
        Route::post('/beli/checkout', 'checkout')->name('beli.checkout');
    });
});

// Checkout Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.succes');
});

// // Admin Routes
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// });
// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers');
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');
});
// Auth Routes
Route::post('/logout', [LooginController::class, 'logout'])->name('logout');
Route::get('/login2', [LooginController::class, 'showLoginForm'])->name('login2');
Route::get('/register2', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register2', [App\Http\Controllers\Auth\RegisterController::class, 'register2']);

// Debug Route
Route::get('/debug-users', function () {
    $users = \App\Models\User::all();
    return response()->json($users);
});

require __DIR__.'/auth.php';

