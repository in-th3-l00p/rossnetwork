<?php

use App\Models\Event;
use Illuminate\Support\Str;
use Livewire\Volt\Component;

new class extends Component
{
    public Event $event;
    public string $name = '';
    public string $slug = '';
    public string $status = '';

    public function mount(): void
    {
        $this->name = $this->event->name ?? '';
        $this->slug = $this->event->slug ?? '';
        $this->status = $this->event->status ?? 'draft';
    }

    public function updateSlugFromName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateBasicInformation(): void
    {
        $this->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255|unique:events,slug," . $this->event->id,
            "status" => "required|in:draft,published,cancelled",
        ]);

        $this->event->update($this->all());
        $this->dispatch('event-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Basic information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event's basic information.") }}
        </p>
    </header>

    <form wire:submit="updateBasicInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                wire:model="name" 
                wire:change="updateSlugFromName"
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full" 
                autofocus 
                required
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="slug" :value="__('Slug')" />
            <x-text-input
                wire:model="slug"
                id="slug"
                name="slug"
                type="text"
                class="mt-1 block w-full"
                required
            />
            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select
                wire:model="status"
                id="status"
                name="status"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="draft">{{ __('Draft') }}</option>
                <option value="published">{{ __('Published') }}</option>
                <option value="cancelled">{{ __('Cancelled') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="event-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section> 