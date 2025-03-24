<?php

use function Livewire\Volt\{state};
use App\Models\Event;
use Illuminate\Support\Facades\Hash;

state([
    'event',
    'password' => '',
]);

$confirmDeletion = function() {
    $this->dispatch('open-modal', 'confirm-event-deletion');
};

$deleteEvent = function() {
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

    $this->event->delete();
    return $this->redirect(route('events.index'), navigate: true);
};

?>

<div>
    <x-danger-button 
        wire:click="confirmDeletion"
        title="{{ __('Delete') }}"
    >
        <x-fas-trash class="size-4 shrink-0 text-white" />
    </x-danger-button>

    <x-modal name="confirm-event-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteEvent" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Delete Event') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Are you sure you want to delete this event? Once the event is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
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

                <x-danger-button class="ml-3">
                    {{ __('Delete Event') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div> 