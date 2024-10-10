<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/users', UserController::class)
->middleware('auth:sanctum');

Route::resource('/categories', CategoryController::class)
->middleware('auth:sanctum');

Route::resource('/products', ProductController::class)
->middleware('auth:sanctum');

Route::resource('/comments', CommentController::class)
->middleware('auth:sanctum');

Route::resource('/images', ImageController::class)
->middleware('auth:sanctum');

Route::resource('/orders', OrderController::class)
->middleware('auth:sanctum');

Route::resource('/carts', CartController::class)
->middleware('auth:sanctum');
