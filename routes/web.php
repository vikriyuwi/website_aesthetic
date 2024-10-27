<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ArtGalleryController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing'])->name('landing');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('home');

Route::get('/resetpassword', [WebController::class, 'resetpassword']);

// Route::get('/artists', [App\Http\Controllers\WebController::class, 'listArtists'])->name('artist.list');
Route::get('/artists',[App\Http\Controllers\ListArtistController::class, 'viewListArtist']);


Route::get('/artists/{id}/{section?}', [WebController::class, 'showArtist'])->name('artist.show');

Route::get('/collection/{category}', [WebController::class, 'showCollection'])->name('collection.show');

Route::get('/category/{category}', [WebController::class, 'showCategory'])->name('category.show');

Route::get('/artwork/{id}', [WebController::class, 'showArtwork'])->name('artwork.show');

Route::get('/explore', [App\Http\Controllers\WebController::class, 'explore']);

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing']);

Route::get('/art-gallery', function () {
    return view('art-gallery');
});

Route::get('/art-gallery/{id}', [ArtGalleryController::class, 'show'])->name('art-gallery.show');

Route::get('/favorites/follows', [WebController::class, 'follows'])->name('favorites.follows');

Route::get('/favorites/likes', [WebController::class, 'likes'])->name('favorites.likes');

Route::get('/favorites/cart', [WebController::class, 'cart'])->name('favorites.cart');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/order-summary', [WebController::class, 'show'])->name('order-summary');

Route::get('/order-history', [WebController::class, 'orderHistory'])->name('order.history');

Route::get('/landing2', [App\Http\Controllers\WebController::class, 'landing2']);

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('Home.home');

