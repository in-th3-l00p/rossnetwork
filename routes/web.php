<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\PublicProjectController;
use App\Http\Controllers\PublicEventController;

Route::view('/', 'welcome')->name("home");
Route::resource(
    "profiles", 
    PublicProfileController::class, 
    [ "as" => "public" ]
)
    ->only(['index', 'show']);
Route::resource(
    "projects", 
    PublicProjectController::class, 
    [ "as" => "public" ]
)
    ->only(['index', 'show']);
Route::resource(
    "events", 
    PublicEventController::class, 
    [ "as" => "public" ]
)
    ->only(['index', 'show']);

Route::middleware("auth")->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::prefix("dashboard")->group(function () {
        Route::resource("profiles", ProfileController::class)
            ->only(['index', 'show', 'edit']);
        Route::resource("projects", ProjectController::class)
            ->only(['index', 'create', 'show', 'edit']);
        Route::resource("events", EventController::class)
            ->only(['index', 'create', 'show', 'edit']);
    });
});

require __DIR__ . '/auth.php';
