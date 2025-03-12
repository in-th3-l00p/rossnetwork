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

    public function store()
    {
        $profile = Profile::create([
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route('profiles.edit', $profile);
    }

    public function show(Profile $profile)
    {
        return view('pages.profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('pages.profiles.edit', compact('profile'));
    }
}
