<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WriteupController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/writeups')->name('home');

Route::resource('writeups', WriteupController::class)->only(['index', 'show']);

// Only for visitors who are NOT logged in
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Only for logged-in users
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
