<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light2 overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
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
            </div>
        </div>

        @foreach (auth()->user()->profiles as $profile)
            <livewire:profiles.display :profile="$profile" />
        @endforeach
    </div>
</x-app-layout>