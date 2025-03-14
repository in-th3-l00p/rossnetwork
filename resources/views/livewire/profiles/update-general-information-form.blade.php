<?php

use App\Models\Profile;
use Livewire\Volt\Component;

new class extends Component
{
    public Profile $profile;
    public string $first_name = '';
    public string $last_name = '';
    public string $nickname = '';
    public string $birth_date = '';
    public string $gender = '';

    public function mount(): void
    {
        $this->first_name = $this->profile->first_name ?? '';
        $this->last_name = $this->profile->last_name ?? '';
        $this->nickname = $this->profile->nickname ?? '';
        $this->birth_date = $this->profile->birth_date ?? '';
        $this->gender = $this->profile->gender ?? '';
    }

    public function updateGeneralInformation(): void
    {
        $this->validate([
            "first_name" => "nullable|string|max:255",
            "last_name" => "nullable|string|max:255",
            "nickname" => "nullable|string|max:255",
            "birth_date" => "nullable|date",
            "gender" => "nullable|string|max:255",
        ]);

        $this->profile->update($this->all());
        $this->dispatch('profile-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('General information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's general information.") }}
        </p>
    </header>

    <form wire:submit="updateGeneralInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="first_name" :value="__('First name')" />
            <x-text-input 
                wire:model="first_name" 
                id="first_name" 
                name="first_name" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="first_name" 
                value="{{ $first_name }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last name')" />
            <x-text-input 
                wire:model="last_name" 
                id="last_name" 
                name="last_name" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="last_name" 
                value="{{ $last_name }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="nickname" :value="__('Nickname')" />
            <x-text-input 
                wire:model="nickname" 
                id="nickname" 
                name="nickname" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="nickname" 
                value="{{ $nickname }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('nickname')" />
        </div>

        <div>
            <x-input-label for="birth_date" :value="__('Birth date')" />
            <x-text-input 
                wire:model="birth_date" 
                id="birth_date" 
                name="birth_date" 
                type="date" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="birth_date" 
                value="{{ $birth_date }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input 
                wire:model="gender" 
                id="gender" 
                name="gender" 
                type="text" 
                class="mt-1 
                block 
                w-full" 
                autofocus 
                autocomplete="gender" 
                value="{{ $gender }}" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
