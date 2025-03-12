<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;

Route::view('/', 'welcome')->name("home");

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource("profiles", ProfileController::class);
Route::resource("projects", ProjectController::class);
Route::resource("events", EventController::class);

require __DIR__.'/auth.php';
