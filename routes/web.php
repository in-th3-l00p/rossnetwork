<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;

Route::view('/', 'welcome')->name("home");

Route::middleware("auth")->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::resource("profiles", ProfileController::class)
        ->only(['index', 'store', 'show', 'edit']);
    Route::resource("projects", ProjectController::class)
        ->only(['index', 'create', 'show', 'edit']);
    Route::resource("events", EventController::class)
        ->only(['index', 'create', 'show', 'edit']);
});

require __DIR__ . '/auth.php';
