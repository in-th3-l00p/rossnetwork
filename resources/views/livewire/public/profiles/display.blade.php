<?php

use Livewire\Volt\Component;
use \App\Models\Profile;

new class extends Component {
    public Profile $profile;
}; ?>

<li class="col-span-1 flex flex-col divide-y divide-zinc-300 rounded-lg bg-light2 text-center shadow">
    <div class="flex flex-1 flex-col p-8">
        <img
            class="mx-auto size-32 shrink-0 rounded-full"
            src="{{ $this->profile->profilePicture() }}"
            alt="{{ $this->profile->getDisplayName() }}"
        >
        <h3 class="mt-6 text-sm font-medium text-zinc-900">{{ $this->profile->getDisplayName() }}</h3>
        <dl class="mt-1 flex grow flex-col justify-between">
            <dt class="sr-only">Description</dt>
            <dd class="text-sm text-zinc-500">{{ $this->profile->title ?? "User" }}</dd>
        </dl>
    </div>
    <div>
        <div class="-mt-px flex divide-x divide-zinc-300">
            <div class="-ml-px flex w-0 flex-1">
                <a
                    href="{{ route('public.profiles.show', $profile) }}"
                    @class([
                        "relative inline-flex w-0 flex-1 items-center justify-center",
                        "gap-x-3 rounded-br-lg border border-transparent py-4",
                        "text-sm font-semibold text-zinc-900"
                    ])
                >
                    <x-bx-show class="size-5 text-dark" />
                    View
                </a>
            </div>
        </div>
    </div>
</li>