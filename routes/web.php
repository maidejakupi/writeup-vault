<?php

use App\Http\Controllers\WriteupController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/writeups')->name('home');

Route::resource('writeups', WriteupController::class)->only(['index', 'show']);
