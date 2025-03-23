<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function index() {
        $profiles = User::query()
            ->where("profile_id", "!=", null)
            ->get()
            ->map(fn ($user) => $user->currentProfile);

        return view("pages.public.profiles.index", [
            "profiles" => $profiles
        ]);
    }

    public function show(Profile $profile) {
        return view("pages.public.profiles.show", [
            "profile" => $profile
        ]);
    }
}
