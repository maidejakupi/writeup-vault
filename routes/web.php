<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WriteupController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/writeups')->name('home');

// Logged-in users only.
// This must come BEFORE the public writeup routes, otherwise /writeups/create
// would be treated as /writeups/{writeup}.
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('writeups', WriteupController::class)->except(['index', 'show']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Public
Route::resource('writeups', WriteupController::class)->only(['index', 'show']);

// Guests only
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
