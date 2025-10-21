<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;

/* ---------- PUBLIC ---------- */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
Route::apiResource('products', ProductController::class)->only(['index', 'show']);

/* ---------- AUTH USER ---------- */
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::post('checkout', [OrderController::class, 'store']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{order}', [OrderController::class, 'show']);
});

/* ---------- MIDTRANS ---------- */
Route::post('midtrans/create', [MidtransController::class, 'createTransaction']);
Route::post('midtrans/notification', [MidtransController::class, 'notificationHandler']);

/* ---------- ADMIN ---------- */
Route::middleware(['auth:sanctum', 'can:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::apiResource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
        Route::apiResource('products', AdminProductController::class);
    });
