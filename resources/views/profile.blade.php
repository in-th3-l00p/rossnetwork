<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:profile.update-account-information-form />
                </div>
            </x-container>

            <x-container>
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </x-container>

            <x-container>
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </x-container>
        </div>
    </div>
</x-app-layout>
