<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/users', UserController::class)->middleware('auth:sanctum');

// Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
