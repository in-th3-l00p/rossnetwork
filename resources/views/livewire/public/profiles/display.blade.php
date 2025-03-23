<?php

use Livewire\Volt\Component;
use \App\Models\Profile;

new class extends Component {
    public Profile $profile;
    
    public function getDisplayName()
    {
        if ($this->profile->first_name && $this->profile->last_name) {
            return $this->profile->first_name . ' ' . $this->profile->last_name;
        } elseif ($this->profile->nickname) {
            return $this->profile->nickname;
        } elseif ($this->profile->name) {
            return $this->profile->name;
        }
        
        return 'Anonymous User';
    }
    
    public function getDescription()
    {
        return $this->profile->description ?? $this->profile->bio ?? 'No description available';
    }
    
    public function getAvatarUrl()
    {
        return $this->profile->avatar 
            ? asset('storage/' . $this->profile->avatar)
            : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60';
    }
}; ?>

<div>
    <li class="col-span-1 flex flex-col divide-y divide-zinc-300 rounded-lg bg-light2 text-center shadow">
        <div class="flex flex-1 flex-col p-8">
            <img
                class="mx-auto size-32 shrink-0 rounded-full"
                src="{{ $this->getAvatarUrl() }}"
                alt="{{ $this->getDisplayName() }}"
            >
            <h3 class="mt-6 text-sm font-medium text-zinc-900">{{ $this->getDisplayName() }}</h3>
            <dl class="mt-1 flex grow flex-col justify-between">
                <dt class="sr-only">Description</dt>
                <dd class="text-sm text-zinc-500">{{ $this->getDescription() }}</dd>
                @if($profile->user)
                    <dt class="sr-only">Role</dt>
                    <dd class="mt-3">
                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                            {{ $profile->user->role ?? 'User' }}
                        </span>
                    </dd>
                @endif
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
</div>
