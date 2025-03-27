<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.events.index');
    }

    public function edit(Event $event)
    {
        // Ensure the user can only edit their own events
        if ($event->user_id !== auth()->id()) {
            abort(403);
        }

        return view('pages.events.edit', compact('event'));
    }
}
