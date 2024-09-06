<?php
use App\Http\Controllers\CartController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('cart', [CartController::class, 'index']);
    Route::post('cart/add', [CartController::class, 'add']);
    Route::put('cart/update/{id}', [CartController::class, 'update']);
    Route::delete('cart/delete/{id}', [CartController::class, 'delete']);
});
