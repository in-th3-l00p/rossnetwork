<?php

use App\Models\Event;
use Livewire\Volt\Component;

new class extends Component
{
    public Event $event;
    public string $description_short = '';
    public string $description = '';

    public function mount(): void
    {
        $this->description_short = $this->event->description_short ?? '';
        $this->description = $this->event->description ?? '';
    }

    public function updateDescription(): void
    {
        $this->validate([
            "description_short" => "nullable|string|max:255",
            "description" => "nullable|string",
        ]);

        $this->event->update($this->all());
        $this->dispatch('event-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Description') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event's description.") }}
        </p>
    </header>

    <form wire:submit="updateDescription" class="mt-6 space-y-6">
        <div>
            <x-input-label for="description_short" :value="__('Short description')" />
            <x-text-input
                wire:model="description_short"
                id="description_short"
                name="description_short"
                type="text"
                class="mt-1 block w-full"
                autofocus
            />
            <x-input-error class="mt-2" :messages="$errors->get('description_short')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Full description')" />
            <x-textarea
                wire:model="description"
                id="description"
                name="description"
                class="mt-1 block w-full"
                rows="6"
            />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="event-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> 