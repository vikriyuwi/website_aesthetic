<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [App\Http\Controllers\WebController::class, 'login']);

Route::get('/register', [App\Http\Controllers\WebController::class, 'register']);

Route::get('/artists', [App\Http\Controllers\WebController::class, 'listArtists'])->name('artist.list');

Route::get('/artists/{id}', [App\Http\Controllers\WebController::class, 'showArtist'])->name('artist.show');

Route::get('/explore', [App\Http\Controllers\WebController::class, 'explore']);

Route::get('/landing', [App\Http\Controllers\WebController::class, 'landing']);

