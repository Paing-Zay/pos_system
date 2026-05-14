<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
    '/home',
    [AuthController::class, 'index']
)->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

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
    [AuthController::class, 'sales']
)->middleware('auth');

// inventory routes
Route::get(
    '/inventory',
    [AuthController::class, 'inventory']
)->middleware('auth');

// customers routes
Route::get(
    '/customers',
    [AuthController::class, 'customers']
)->middleware('auth');

// reports routes
Route::get(
    '/reports',
    [AuthController::class, 'report']
)->middleware('auth');

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
