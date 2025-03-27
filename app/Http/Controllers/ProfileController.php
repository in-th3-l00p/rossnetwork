<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profiles.index');
    }

    public function edit(Profile $profile)
    {
        return view('pages.profiles.edit', compact('profile'));
    }
}
