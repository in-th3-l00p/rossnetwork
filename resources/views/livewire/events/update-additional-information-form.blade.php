<?php

use App\Models\Event;
use Livewire\Volt\Component;

new class extends Component
{
    public Event $event;
    public string $url = '';

    public function mount(): void
    {
        $this->url = $this->event->url ?? '';
    }

    public function updateAdditionalInformation(): void
    {
        $this->validate([
            "url" => "nullable|url|max:255",
        ]);

        $this->event->update($this->all());
        $this->dispatch('event-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Additional information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update additional details about your event.") }}
        </p>
    </header>

    <form wire:submit="updateAdditionalInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="url" :value="__('Event URL')" />
            <x-text-input
                wire:model="url"
                id="url"
                name="url"
                type="url"
                class="mt-1 block w-full"
                placeholder="https://example.com"
            />
            <x-input-error class="mt-2" :messages="$errors->get('url')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="event-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> 