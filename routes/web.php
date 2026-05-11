<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\HomeController;

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
