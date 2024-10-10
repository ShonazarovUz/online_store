<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/users', UserController::class)
     ->middleware('auth:sanctum');

Route::resource('/category', CategoryController::class)
     ->middleware('auth:sanctum');

Route::resource('/products', ProductController::class)
     ->middleware('auth:sanctum');