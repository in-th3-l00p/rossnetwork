<x-layout>
    <x-layout.header />

    <div class="bg-light2 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <p class="text-base/7 font-semibold text-darker">{{ __("public.events.header.top") }}</p>
                <h2 class="mt-2 text-5xl font-semibold tracking-tight text-zinc-900 sm:text-7xl">
                    {{ __("public.events.header.title") }}</h2>
                <p class="mt-8 text-pretty text-lg font-medium text-zinc-500 sm:text-xl/8">
                    {{ __("public.events.header.subtitle") }}</p>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 gap-x-8 gap-y-20 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($events as $event)
                <livewire:public.events.display :event="$event" />
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
    </div>

    <x-layout.footer />
</x-layout> 