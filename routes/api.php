<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PaymentController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class,'logout']);
});

Route::get('/products', [ProductController::class,'index'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/orders', [OrderController::class,'store']);
    Route::get('/orders/{id}', [OrderController::class,'show']);
});

Route::post('/payments/{order}', [PaymentController::class, 'pay'])->middleware('auth:sanctum');
Route::post('/webhook/payment', [PaymentController::class, 'webhook']);
