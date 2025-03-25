<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicEventController extends Controller
{
    public function index() {
        $events = Event::query()
            ->where('status', 'published')
            ->orderBy('start_date', 'asc')
            ->get();

        return view('pages.public.events.index', [
            'events' => $events
        ]);
    }

    public function show(Event $event) {
        return view('pages.public.events.show', [
            'event' => $event
        ]);
    }
}
