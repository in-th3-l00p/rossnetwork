<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-profile-information :profile="$profile" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-general-information-form :profile="$profile" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-address-information-form :profile="$profile" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-bio-form :profile="$profile" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <livewire:profiles.update-contact-information-form :profile="$profile" />
            </x-container>
        </div>
    </div>
</x-app-layout>
