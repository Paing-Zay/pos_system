<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;

// login routes
Route::get('/', function () {
    return view('login');
});
Route::get(
    '/login',
    [AuthController::class, 'loginForm']
);
Route::post(
    '/login',
    [AuthController::class, 'login']
);

// dashboard routes
Route::get(
    '/dashboard',
    [AuthController::class, 'index']
)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// products routes
Route::get(
    '/products',
    [AuthController::class, 'products']
)->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

// sales routes
Route::get(
    '/sales',
    [SalesController::class, 'index']
)->middleware('auth');

Route::post(
    '/sales/complete',
    [SalesController::class, 'store']
)->middleware('auth')->name('sales.complete');

// inventory routes
Route::get('/inventory', [InventoryController::class, 'index'])->middleware('auth');

// customers routes
Route::get('/customers', [CustomerController::class, 'index'])->middleware('auth');
Route::get('/customers/create', [CustomerController::class, 'create'])->middleware('auth')->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->middleware('auth')->name('customers.store');

// reports routes
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth');
Route::get('/reports/create', [ReportController::class, 'create'])->middleware('auth')->name('reports.create');
Route::post('/reports', [ReportController::class, 'store'])->middleware('auth')->name('reports.store');
Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->middleware('auth');
Route::put('/reports/{id}', [ReportController::class, 'update'])->middleware('auth')->name('reports.update');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->middleware('auth')->name('reports.destroy');

// settings routes
Route::get(
    '/settings',
    [AuthController::class, 'settings']
)->middleware('auth');

// cart routes
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/store', [CartController::class, 'store'])
    ->name('cart.store');

// logout route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
