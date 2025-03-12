<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public Profile $profile;
}; ?>

<section class="w-full">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Contact information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's contact information.") }}
        </p>
    </header>

    <ul role="list" class="w-full grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-6">
        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white border border-gray-300 shadow">
            <a href="mailto:test@example.com">
                <div class="flex w-full items-center justify-between space-x-6 p-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-sm font-medium text-gray-900">{{ __('Email') }}</h3>
                        </div>
                        <p class="mt-1 truncate text-sm text-gray-500">test@example.com</p>
                    </div>
                    <img class="size-10 shrink-0 rounded-full" src="https://www.svgrepo.com/show/521128/email-1.svg"
                        alt="">
                </div>
            </a>
            <div class="flex items-center gap-2 py-2 px-6">
                <x-primary-button>
                    <x-fas-trash class="size-4 shrink-0 text-white" />
                </x-primary-button>
                <x-primary-button>
                    <x-fas-pencil class="size-4 shrink-0 text-white" />
                </x-primary-button>
            </div>
        </li>

        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white border border-gray-300 shadow">
            <button
                class="flex w-full h-full items-center justify-center space-x-6 p-6 hover:bg-gray-50 transition-all">
                <x-fas-plus class="size-10 shrink-0 rounded-full text-dark" />
            </button>
        </li>
    </ul>

    <div class="flex items-center gap-4">
        <x-action-message class="me-3" on="profile-updated">
            {{ __('Saved.') }}
        </x-action-message>
    </div>
</section>