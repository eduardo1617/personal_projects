<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('todos',TodoController::class);

Route::get('users', [UserController::class, 'index']);
//Route::resource('users', UserController::class)
//    ->only(['index']);

//Route::get('/todos', function () {
//    return TodoResource::collection(Todo::all());
//});
