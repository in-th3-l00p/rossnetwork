<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-light2 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profiles.update-general-information-form :profile="$profile" />
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <div class="p-4 sm:p-8 bg-light2 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profiles.update-address-information-form :profile="$profile" />
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <div class="p-4 sm:p-8 bg-light2 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profiles.update-bio-form :profile="$profile" />
                </div>
            </div>
        </div>

        {{-- <div class="p-4 sm:p-8 bg-light2 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.contact-information-form :profile="$profile" />
            </div>
        </div>
         --}}
    </div>
</x-app-layout>
