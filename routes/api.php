<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->get('me', [AuthController::class, 'me']);
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
});
