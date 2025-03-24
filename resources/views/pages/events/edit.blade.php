<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-container>
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Actions') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Here you can see all the actions that you can do with your event.") }}
                        </p>
                    </header>

                    <div class="flex gap-3 flex-wrap items-center mt-6">
                        <a href="{{ route('events.show', $event->id) }}">
                            <x-primary-button title="{{ __('View') }}">
                                <x-fas-eye class="size-4 shrink-0 text-white" />
                            </x-primary-button>
                        </a>
                        <livewire:events.delete-button :event="$event" />
                    </div>
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-basic-information-form :event="$event" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-event-image-form :event="$event" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-description-form :event="$event" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-date-information-form :event="$event" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-location-information-form :event="$event" />
                </div>
            </x-container>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <x-container>
                <div class="max-w-xl">
                    <livewire:events.update-additional-information-form :event="$event" />
                </div>
            </x-container>
        </div>
    </div>
</x-app-layout> 