<?php

use App\Models\Profile;
use Livewire\Volt\Component;

new class extends Component
{
    public Profile $profile;
    public string $name = '';
    public string $description = '';

    public function mount(): void
    {
        $this->name = $this->profile->name ?? '';
        $this->description = $this->profile->description ?? '';
    }

    public function updateProfileInformation(): void
    {
        $this->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string|max:255",
        ]);

        $this->profile->update($this->all());
        $this->dispatch('profile-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's information, that are used for showing them on your dashboard.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                wire:model="name" 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="name" 
                value="{{ $name }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea
                wire:model="description" 
                id="description" 
                name="description" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="description" 
                value="{{ $description }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
