<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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

Route::get('/landing2', [App\Http\Controllers\WebController::class, 'landing2']);

Route::get('/home', [App\Http\Controllers\WebController::class, 'home'])->name('Home.home');