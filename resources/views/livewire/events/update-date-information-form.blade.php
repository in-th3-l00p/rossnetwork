<?php

use App\Models\Event;
use Livewire\Volt\Component;

new class extends Component
{
    public Event $event;
    public string $start_date = '';
    public string $end_date = '';

    public function mount(): void
    {
        $this->start_date = $this->event->start_date ? date('Y-m-d\TH:i', strtotime($this->event->start_date)) : '';
        $this->end_date = $this->event->end_date ? date('Y-m-d\TH:i', strtotime($this->event->end_date)) : '';
    }

    public function updateDateInformation(): void
    {
        $this->validate([
            "start_date" => "required|date",
            "end_date" => "nullable|date|after_or_equal:start_date",
        ]);

        $this->event->update($this->all());
        $this->dispatch('event-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Date information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event's date information.") }}
        </p>
    </header>

    <form wire:submit="updateDateInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="start_date" :value="__('Start date and time')" />
            <x-text-input
                wire:model="start_date"
                id="start_date"
                name="start_date"
                type="datetime-local"
                class="mt-1 block w-full"
                required
            />
            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
        </div>

        <div>
            <x-input-label for="end_date" :value="__('End date and time')" />
            <x-text-input
                wire:model="end_date"
                id="end_date"
                name="end_date"
                type="datetime-local"
                class="mt-1 block w-full"
            />
            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="event-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> 