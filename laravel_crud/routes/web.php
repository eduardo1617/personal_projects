<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

Route::resource('sellers', SellerController::class);
Route::resource('branches', BranchController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SalesController::class);

