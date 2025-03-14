<?php

use function Livewire\Volt\{state};
use App\Models\Profile;

state([
    "name" => "",
    "description" => "",
]);

$createProfile = function () {
    $this->validate([
        "name" => "required|string|max:255",
        "description" => "nullable|string",
    ]);

    $profile = Profile::create([
        "name" => $this->name,
        "description" => $this->description,
        "user_id" => auth()->user()->id,
    ]);

    $this->redirect(route(
        'profiles.edit',
        $profile
    ));
}
?>

<div>
    <x-primary-button title="{{ __('Create') }}" x-on:click="$dispatch('open-modal', 'create-profile-modal')">
        {{ __('Create') }}
    </x-primary-button>

    <x-modal name="create-profile-modal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Profile') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Create a new profile to start using the platform.') }}
            </p>

            <form wire:submit="createProfile" class="w-full mt-6 space-y-3">
                <div>
                    <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />
                    <x-text-input 
                        wire:model="name" 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="mt-1 w-full"
                        placeholder="{{ __('Name') }}" 
                    />
                </div>

                <div>
                    <x-input-label 
                        for="description" 
                        value="{{ __('Description') }}" 
                        class="sr-only" 
                    />
                    <x-textarea 
                        wire:model="description" 
                        id="description" 
                        name="description" 
                        type="text" 
                        class="mt-1 w-full"
                        placeholder="{{ __('Description') }}" 
                    />
                </div>

                <div class="mt-6 flex gap-2">
                    <x-primary-button type="submit">
                        {{ __('Create') }}
                    </x-primary-button>

                    <x-secondary-button x-on:click="$dispatch('close-modal', 'create-profile-modal')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </x-modal>
</div>