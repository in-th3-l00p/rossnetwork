<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-container class="overflow-hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile List') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Here you can see all the profiles, including the one that's active, and the ones that are not.") }}
                        </p>
                    </header>
                    <div class="flex justify-end items-center">
                        <livewire:profiles.create-modal />
                    </div>
                </div>
            </x-container>
        </div>

        @forelse (auth()->user()->profiles as $profile)
            <livewire:profiles.display :profile="$profile" />
        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <x-container>
                    <div class="text-center">
                        <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No profiles</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new profile.</p>
                    </div>
                </x-container>
            </div>
        @endforelse
    </div>
</x-app-layout>