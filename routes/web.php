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
Route::view('about', 'public.about')->name('about');
Route::view('contact', 'public.contact')->name('contact');
Route::view('terms-of-service', 'public.terms-of-service')->name('terms-of-service');
Route::view('privacy', 'public.privacy')->name('privacy');
Route::view('license', 'public.license')->name('license');

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
