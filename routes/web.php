<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [App\Http\Controllers\WebController::class, 'login']);

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('home');

Route::get('/register', [App\Http\Controllers\WebController::class, 'register']);

Route::get('/resetpassword', [WebController::class, 'resetpassword']);

Route::get('/artists', [App\Http\Controllers\WebController::class, 'listArtists'])->name('artist.list');

Route::get('/artists/{id}/{section?}', [WebController::class, 'showArtist'])->name('artist.show');

Route::get('/collection/{category}', [WebController::class, 'showCollection'])->name('collection.show');

Route::get('/category/{category}', [WebController::class, 'showCategory'])->name('category.show');

Route::get('/artwork/{id}', [WebController::class, 'showArtwork'])->name('artwork.show');

Route::get('/explore', [App\Http\Controllers\WebController::class, 'explore']);

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing']);

