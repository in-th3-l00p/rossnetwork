<?php

use Livewire\Volt\Component;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

new class extends Component {
    public Profile $profile;
    public string $password = '';

    public function deleteProfile(): void
    {
        $this->validate([
            'password' => ['required'],
        ]);

        if (!Hash::check(
            $this->password, 
            auth()->user()->password
        )) {
            $this->addError(
                'password', 
                __('The password is incorrect.')
            );
            return;
        }

        foreach ($this->profile->contacts as $contact) {
            if ($contact->profiles()->count() === 1) {
                $contact->delete();
            }
        }

        if ($this->profile->user->profile_id === $this->profile->id) {
            $this->profile->user->profile_id = null;
            $this->profile->user->save();
        }
        $this->profile->delete();
        $this
            ->redirect(route('profiles.index'));
    }
}; ?>

<div>
    <x-danger-button 
        title="{{ __('Delete') }}" 
        x-on:click="$dispatch('open-modal', 'confirm-profile-deletion')"
    >
        <x-fas-trash class="size-4 shrink-0 text-white" />
    </x-danger-button>
    <x-modal 
        name="confirm-profile-deletion" 
        :show="$errors->isNotEmpty()" 
        focusable
    >
        <form wire:submit="deleteProfile" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this profile?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your profile is deleted, all of its resources and data will be deleted. Please enter your password to confirm you would like to permanently delete your profile.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password"
                    class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" type="submit">
                    {{ __('Delete Profile') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>