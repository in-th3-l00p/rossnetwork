<div class="pt-24 sm:pt-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-zinc-900 sm:text-5xl">Upcoming events</h2>
            <p class="mt-2 text-lg/8 text-zinc-600">Checkout the latest events submitted by our users.</p>
        </div>
        <div class="mx-auto mt-8 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @php
                $events = \App\Models\Event::query()
                    ->where("status", "published")
                    ->orderBy('start_date', 'asc')
                    ->limit(3)
                    ->get();
            @endphp

            @forelse ($events as $event)
                <a href="{{ route("public.events.show", [ "event" => $event ]) }}">
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
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-center">
                        <svg class="mx-auto size-12 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-zinc-600">No events</h3>
                        <p class="mt-1 text-sm text-zinc-500">There are no events available to display at this time.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="mt-8 flex justify-center">
            <a href="{{ route('public.events.index') }}" class="block mx-auto">
                <x-primary-button>
                    View all events
                </x-primary-button>
            </a>
        </div>
    </div>
</div>
