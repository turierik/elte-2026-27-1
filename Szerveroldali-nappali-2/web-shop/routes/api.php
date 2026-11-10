<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductApiController::class, "index"]);
Route::get('/products/{product}', [ProductApiController::class, "show"]);
Route::post('/products', [ProductApiController::class, "store"]);
Route::patch('/products/{product}', [ProductApiController::class, "update"]);
Route::delete('/products/{product}', [ProductApiController::class, "destroy"]);
Route::post('/login', [ProductApiController::class, "login"]);
Route::get('/orders', [ProductApiController::class, "orderIndex"])->middleware('auth:sanctum');
