<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-container class="overflow-hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Event List') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Here you can see all your events, both upcoming and past ones.") }}
                        </p>
                    </header>
                    <div class="flex justify-end items-center">
                        <a href="{{ route('events.create') }}">
                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </a>
                    </div>
                </div>
            </x-container>
        </div>

        @forelse (auth()->user()->events as $event)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <x-container>
                    <div class="flex flex-col md:flex-row gap-4">
                        @if($event->image)
                            <div class="w-full md:w-1/4">
                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->name }}" class="w-full h-auto rounded-lg object-cover">
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">{{ $event->name }}</h3>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}
                                        @if($event->end_date && $event->end_date != $event->start_date)
                                            - {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}
                                        @endif
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('events.show', $event) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('events.edit', $event) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-600">{{ $event->description_short }}</p>
                            <div class="mt-4 text-sm text-gray-500">
                                @if($event->location)
                                    <p>
                                        <span class="font-medium">Location:</span> {{ $event->location }}
                                        @if($event->city || $event->state || $event->zip_code)
                                            ({{ $event->city }}{{ $event->city && $event->state ? ', ' : '' }}{{ $event->state }}{{ ($event->city || $event->state) && $event->zip_code ? ' ' : '' }}{{ $event->zip_code }})
                                        @endif
                                    </p>
                                @endif
                                <p><span class="font-medium">Status:</span> <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $event->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($event->status) }}
                                </span></p>
                            </div>
                        </div>
                    </div>
                </x-container>
            </div>
        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <x-container>
                    <div class="text-center">
                        <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No events</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new event.</p>
                    </div>
                </x-container>
            </div>
        @endforelse
    </div>
</x-app-layout> 