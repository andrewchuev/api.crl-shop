<?php
// routes/api.php

use App\Modules\Products\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/filter', [ProductController::class, 'filter']);
    Route::get('/search', [ProductController::class, 'search']);
});
