<?php

use function Livewire\Volt\{state};
use App\Models\Event;
use Illuminate\Support\Str;

state([
    "name" => "",
    "description_short" => "",
    "slug" => "",
]);

$generateSlug = function () {
    return Str::slug($this->name);
};

$createEvent = function () {
    $this->validate([
        "name" => "required|string|max:255",
        "description_short" => "nullable|string|max:255",
        "slug" => "required|string|max:255|unique:events,slug",
    ]);

    $event = Event::create([
        "name" => $this->name,
        "slug" => $this->generateSlug(),
        "user_id" => auth()->user()->id,
    ]);

    $this->redirect(route(
        'events.edit',
        $event
    ));
}
?>

<div>
    <x-primary-button 
        title="{{ __('Create Event') }}" 
        x-on:click="$dispatch('open-modal', 'create-event-modal')"
    >
        {{ __('Create') }}
    </x-primary-button>

    <x-modal name="create-event-modal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Event') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Create a new event. Only name and start date are required.') }}
            </p>

            <form wire:submit="createEvent" class="w-full mt-6">
                <div>
                    <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />
                    <x-text-input 
                        wire:model.live="name" 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="mt-1 w-full"
                        placeholder="{{ __('Name') }}" 
                        required
                        x-on:input="$wire.slug = $wire.name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '').replace(/\-\-+/g, '-').replace(/^-+/, '').replace(/-+$/, '')"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="slug" value="{{ __('Slug') }}" class="sr-only" />
                    <x-text-input 
                        wire:model="slug" 
                        id="slug" 
                        name="slug" 
                        type="text" 
                        class="mt-1 w-full"
                        placeholder="{{ __('Slug') }}" 
                        required
                    />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <x-input-label for="description_short" value="{{ __('Short description') }}" class="sr-only" />
                    <x-textarea 
                        wire:model="description_short" 
                        id="description_short" 
                        name="description_short" 
                        type="text" 
                        class="mt-1 w-full"
                        placeholder="{{ __('Short description') }}" 
                    />
                    <x-input-error :messages="$errors->get('description_short')" class="mt-2" />
                </div>

                <div class="mt-6 flex gap-2">
                    <x-primary-button type="submit">
                        {{ __('Create Event') }}
                    </x-primary-button>

                    <x-secondary-button x-on:click="$dispatch('close-modal', 'create-event-modal')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </x-modal>
</div> 