<?php

use function Livewire\Volt\{state};

state("profile");

?>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-light2 flex justify-between overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ $profile->name }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ $profile->description }}
            </p>
        </div>
        <div class="flex flex-wrap justify-end items-center gap-2">
            <a href="{{ route('profiles.show', $profile->id) }}">
                <x-primary-button title="{{ __('View') }}">
                    <x-fas-eye class="size-4 shrink-0 text-white" />
                </x-primary-button>
            </a>
            <a href="{{ route('profiles.edit', $profile->id) }}">
                <x-primary-button title="{{ __('Edit') }}">
                    <x-fas-pencil class="size-4 shrink-0 text-white" />
                </x-primary-button>
            </a>
            <x-danger-button title="{{ __('Delete') }}">
                <x-fas-trash class="size-4 shrink-0 text-white" />
            </x-danger-button>
        </div>
    </div>
</div>
</div>