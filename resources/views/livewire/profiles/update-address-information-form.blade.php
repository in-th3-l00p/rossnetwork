<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public Profile $profile;
    public string $address = '';
    public string $city = '';
    public string $state = '';
    public string $zip_code = '';

    public function mount(): void
    {
        $this->address = $this->profile->address ?? '';
        $this->city = $this->profile->city ?? '';
        $this->state = $this->profile->state ?? '';
        $this->zip_code = $this->profile->zip_code ?? '';
    }

    public function updateGeneralInformation(): void
    {
        $this->validate([
            "address" => "nullable|string|max:255",
            "city" => "nullable|string|max:255",
            "state" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:255",
        ]);

        $this->profile->update($this->all());
        $this->dispatch('profile-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Address information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's address information.") }}
        </p>
    </header>

    <form wire:submit="updateGeneralInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input 
                wire:model="address" 
                id="address" 
                name="address" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="address" 
                value="{{ $address }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input 
                wire:model="city" 
                id="city" 
                name="city" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="city" 
                value="{{ $city }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="state" :value="__('State')" />
            <x-text-input 
                wire:model="state" 
                id="state" 
                name="state" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="state" 
                value="{{ $state }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>

        <div>
            <x-input-label for="zip_code" :value="__('Zip code')" />
            <x-text-input 
                wire:model="zip_code" 
                id="zip_code" 
                name="zip_code" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="zip_code" 
                value="{{ $zip_code }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
