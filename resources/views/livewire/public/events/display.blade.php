<?php

use Livewire\Volt\Component;
use App\Models\Event;

new class extends Component {
    public Event $event;
}; ?>

<a 
    href="{{ route("public.events.show", [ "event" => $event ]) }}"
    class="rounded-lg bg-light2 p-8 shadow"
>
    <article class="flex flex-col items-start justify-between">
        <div class="relative w-full">
            <img src="{{ $event->getPicture() }}"
                alt=""
                class="aspect-video w-full rounded-lg bg-zinc-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
            <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-zinc-900/10"></div>
        </div>
        <div class="max-w-xl">
            <div class="mt-8 flex items-center gap-x-4 text-xs">
                <time datetime="{{ $event->start_date }}" class="text-zinc-500">{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</time>
            </div>
            <div class="group relative">
                <h3 class="mt-3 text-lg/6 font-semibold text-zinc-900">
                    {{ $event->name }}
                </h3>
                <p class="mt-5 line-clamp-3 text-sm/6 text-zinc-600">{{ $event->description_short }}</p>
            </div>
        </div>
    </article>
</a>
