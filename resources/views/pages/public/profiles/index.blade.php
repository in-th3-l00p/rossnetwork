<x-layout>
    <x-layout.header />

    <div class="bg-light2 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <p class="text-base/7 font-semibold text-darker">{{ __("public.profiles.header.top") }}</p>
                <h2 class="mt-2 text-5xl font-semibold tracking-tight text-zinc-900 sm:text-7xl">
                    {{ __("public.profiles.header.title") }}</h2>
                <p class="mt-8 text-pretty text-lg font-medium text-zinc-500 sm:text-xl/8">
                    {{ __("public.profiles.header.subtitle") }}</p>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-16">
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($profiles as $profile)
                <livewire:public.profiles.display :profile="$profile" :key="$profile->id" />
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-center">
                        <svg class="mx-auto size-12 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-zinc-600">No profiles</h3>
                        <p class="mt-1 text-sm text-zinc-500">There are no profiles available to display at this time.</p>
                    </div>
                </div>
            @endforelse
        </ul>
    </div>

    <x-layout.footer />
</x-layout>