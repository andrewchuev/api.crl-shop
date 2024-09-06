<?php
use App\Modules\Orders\Http\Controllers\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('checkout', [OrderController::class, 'checkout']); // Оформление заказа
    Route::get('orders', [OrderController::class, 'getUserOrders']); // Получение заказов пользователя
});
