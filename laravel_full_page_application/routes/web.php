<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CollectionLikeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\NftsGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NftController;
use App\Http\Controllers\NftLikeController;
use App\Http\Controllers\NftViewController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/auth/facebook', [SocialController::class, 'redirectFacebook']);
Route::get('/auth/facebook/callback', [SocialController::class, 'callbackFacebook']);

Route::get('/auth/google', [SocialController::class, 'redirectGoogle']);
Route::get('/auth/google/callback', [SocialController::class, 'callbackGoogle']);


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/email/verify', [RegisteredUserController::class, 'store'])
//    ->middleware('auth')->name('verification.notice');

Route::resource('collections', CollectionController::class)->middleware(['auth']);

//Route::resource('nfts', NftController::class)->middleware(['auth']);

Route::controller(NftController::class)->middleware(['auth'])->group(function (){
    Route::get('/nfts','index')->name('nfts.index');
    Route::get('/nfts/create','create')->name('nfts.create');
    Route::post('/nfts','store')->name('nfts.store');
    Route::get('/nfts/{nft}/edit','edit')->name('nfts.edit');
    Route::patch('/nfts/{nft}','update')->name('nfts.update');
});
Route::get('/nfts/{nft}',[NftController::class, 'show'])->name('nfts.show');


//Route::resource('likes', LikeController::class)
//    ->only(['store', 'destroy'])->middleware(['auth']);

Route::resource('nfts.views', NftViewController::class)
    ->only(['store','update'])->middleware(['auth']);

Route::resource('nfts.likes', NftLikeController::class)
    ->only(['store', 'destroy'])->middleware(['auth']);

Route::resource('collections.likes', CollectionLikeController::class)
    ->only(['store', 'destroy'])->middleware(['auth']);

Route::resource('nftsGallery', NftsGalleryController::class)
    ->only('index')->middleware(['auth']);
