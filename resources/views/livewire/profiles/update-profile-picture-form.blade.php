<?php

use App\Models\Profile;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;

    public Profile $profile;
    public $picture;

    public function update() {
        $this->validate([
            'picture' => [
                'required',
                'image',
                'max:2048',
                'mimes:jpeg,png,jpg,gif',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
            ],
        ], [
            'picture.required' => 'Please select an image file.',
            'picture.image' => 'The file must be an image.',
            'picture.max' => 'The image size must not exceed 2MB.',
            'picture.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'picture.dimensions' => 'The image dimensions must be between 100x100 and 2000x2000 pixels.'
        ]);

        if (
            $this->profile->profile_picture &&
            Storage::disk("public")->exists($this->profile->profile_picture)
        ) {
            Storage::disk("public")->delete($this->profile->profile_picture);
        }

        $path = $this->picture->store('profile-pictures', 'public');

        $this->profile->update([
            'profile_picture' => $path,
        ]);

        $this->reset('picture');

        session()->flash('status', 'Profile picture updated successfully.');
        $this->dispatch('profile-updated');
    }

    public function delete() {
        if (
            $this->profile->profile_picture &&
            Storage::disk("public")->exists($this->profile->profile_picture)
        ) {
            Storage::disk("public")->delete($this->profile->profile_picture);
        }

        $this->profile->update([
            'profile_picture' => null,
        ]);

        $this->dispatch('profile-updated');
        $this->dispatch("close-modal", "confirm-profile-picture-deletion");
    }
}; ?>


<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's information, that are used for showing them on your dashboard.") }}
        </p>
    </header>

    <div class="mt-6 flex flex-wrap gap-6">
        <img
            src="{{ $profile->profilePicture() }}"
            alt="profile"
            class="w-64 aspect-square rounded-full shadow-md object-cover bg-light border border-zinc-400"
        />

        <form wire:submit="update" class="flex flex-col justify-between">
            <div class="flex-grow">
                <label for="profile-picture" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Select new image') }}
                </label>
                <input
                    type="file"
                    name="picture"
                    id="profile-picture"
                    wire:model="picture"
                    accept="image/jpeg,image/png,image/jpg,image/gif"
                    class="block w-full text-sm text-gray-900 rounded-md cursor-pointer bg-light3 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-dark file:text-white
                    hover:file:bg-darker"
                >
                <div class="mt-1 text-sm text-gray-500">
                    JPG, PNG or GIF (max. 2MB). Recommended size 400x400px.
                </div>
                @error("picture")
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <div wire:loading wire:target="picture" class="mt-2">
                    <span class="text-sm text-dark">Uploading...</span>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-primary-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-primary-button>

                @if ($profile->profile_picture)
                    <x-danger-button
                        type="button"
                        x-on:click="$dispatch('open-modal', 'confirm-profile-picture-deletion')"
                        wire:loading.attr="disabled"
                    >
                        {{ __('Remove') }}
                    </x-danger-button>
                @endif

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        <x-modal
            name="confirm-profile-picture-deletion"
            :show="$errors->isNotEmpty()"
            focusable
        >
            <form
                wire:submit="delete"
                class="p-6"
            >
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to remove your profile picture?') }}
                </h2>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3" type="submit">
                        {{ __('Confirm') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
</section>
