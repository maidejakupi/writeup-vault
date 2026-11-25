<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WriteupController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/writeups')->name('home');

// Create / edit / delete: only for logged-in users.
// This must come BEFORE the public routes, otherwise /writeups/create
// would be treated as /writeups/{writeup}.
Route::resource('writeups', WriteupController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('writeups', WriteupController::class)
    ->only(['index', 'show']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
