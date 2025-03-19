<?php

use App\Models\Profile;
use Livewire\Volt\Component;

new class extends Component {
    public ?string $profile = null;

    public function mount() {
        $this->profile = auth()->user()->currentProfile->id ?? null;
    }

    public function update()
    {
        $this->validate([
            'profile' => 'nullable|exists:profiles,id',
        ]);

        auth()->user()->update([
            'profile_id' => $this->profile,
        ]);
    }
}; ?>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-container class="overflow-hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Selected profile') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("The selected profile is showed on your public profile page.") }}
                </p>
            </header>
            <div class="flex justify-end items-center">
                <x-select
                    wire:change="update"
                    wire:model="profile"
                    class="w-full max-w-64"
                >
                    <option :value="null">Private</option>
                    @foreach (auth()->user()->profiles as $profile)
                        <option
                            value="{{ $profile->id }}"
                            {{
                                auth()->user()->currentProfile &&
                                auth()->user()->currentProfile->id === $profile->id ?
                                    'selected' :
                                    ''
                            }}
                        >
                            {{ $profile->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
        </div>
    </x-container>
</div>
