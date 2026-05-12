<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});
Route::get(
    '/login',
    [AuthController::class, 'loginForm']
);
Route::post(
    '/login',
    [AuthController::class, 'login']
);
Route::get(
    '/home',
    [AuthController::class, 'index']
);
Route::get(
    '/settings',
    [AuthController::class, 'settings']
);
Route::get(
    '/inventory',
    [AuthController::class, 'inventory']
);
Route::get(
    '/products',
    [AuthController::class, 'products']
);
Route::get(
    '/reports',
    [AuthController::class, 'report']
);
Route::get(
    '/sales',
    [AuthController::class, 'sales']
);
Route::get(
    '/customers',
    [AuthController::class, 'customers']
);

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
