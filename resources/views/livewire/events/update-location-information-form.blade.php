<?php

use App\Models\Event;
use Livewire\Volt\Component;

new class extends Component
{
    public Event $event;
    public string $location = '';
    public string $city = '';
    public string $state = '';
    public string $zip_code = '';

    public function mount(): void
    {
        $this->location = $this->event->location ?? '';
        $this->city = $this->event->city ?? '';
        $this->state = $this->event->state ?? '';
        $this->zip_code = $this->event->zip_code ?? '';
    }

    public function updateLocationInformation(): void
    {
        $this->validate([
            "location" => "nullable|string|max:255",
            "city" => "nullable|string|max:255",
            "state" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:255",
        ]);

        $this->event->update($this->all());
        $this->dispatch('event-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Location information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event's location details.") }}
        </p>
    </header>

    <form wire:submit="updateLocationInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="location" :value="__('Location/Venue')" />
            <x-text-input
                wire:model="location"
                id="location"
                name="location"
                type="text"
                class="mt-1 block w-full"
                autofocus
            />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input
                wire:model="city"
                id="city"
                name="city"
                type="text"
                class="mt-1 block w-full"
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
                class="mt-1 block w-full"
            />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>

        <div>
            <x-input-label for="zip_code" :value="__('ZIP Code')" />
            <x-text-input
                wire:model="zip_code"
                id="zip_code"
                name="zip_code"
                type="text"
                class="mt-1 block w-full"
            />
            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="event-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> 