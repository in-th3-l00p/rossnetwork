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
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Actions') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Here you can see all the actions that you can do with your profile.") }}
                        </p>
                    </header>

                    <div class="flex gap-3 flex-wrap items-center mt-6">
                        <a href="{{ route('profiles.show', $profile->id) }}">
                            <x-primary-button title="{{ __('View') }}">
                                <x-fas-eye class="size-4 shrink-0 text-white" />
                            </x-primary-button>
                        </a>
                        <livewire:profiles.delete-button :profile="$profile" />
                    </div>
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-profile-information-form :profile="$profile" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profiles.update-profile-picture-form :profile="$profile" />
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
