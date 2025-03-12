<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public Profile $profile;
    public string $bio = '';

    public function mount(): void
    {
        $this->bio = $this->profile->bio ?? '';
    }

    public function updateBio(): void
    {
        $this->validate([
            "bio" => "nullable|string|max:255",
        ]);

        $this->profile->update($this->all());
        $this->dispatch('profile-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Describe yourself') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's bio.") }}
        </p>
    </header>

    <form wire:submit="updateGeneralInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <x-textarea
                wire:model="bio" 
                id="bio" 
                name="bio" 
                class="mt-1 block w-full"
                autofocus 
                autocomplete="bio" 
                value="{{ $bio }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
