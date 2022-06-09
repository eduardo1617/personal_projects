<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('users', [UserController::class, 'index']);

Route::post('messages', [MessageController::class, 'store']);

Route::middleware('auth:sanctum')
    ->get('messages/contact/{user}', [MessageController::class, 'contactMessage']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
