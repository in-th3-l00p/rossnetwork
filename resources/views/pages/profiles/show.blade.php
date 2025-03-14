<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Profile') }} "{{ $profile->name }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1fr_2fr] xl:grid-cols-[1fr_3fr] gap-6">
            <x-container class="sm:mx-auto self-start space-y-6">
                <img src="https://images.pexels.com/photos/1205033/pexels-photo-1205033.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="profile" class="w-full aspect-square rounded-full object-cover max-w-64 mx-auto">

                @if (auth()->user()->profiles->contains($profile->id))
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('profiles.edit', $profile->id) }}">
                            <x-primary-button title="{{ __('Edit') }}">
                                <x-fas-pencil class="size-4 shrink-0 text-white" />
                            </x-primary-button>
                        </a>
                        <livewire:profiles.delete-button :profile="$profile" />
                    </div>
                @endif
            </x-container>

            <x-container>
                <div class="mb-6">
                    <h3 class="text-base/7 font-semibold text-zinc-900">{{ __('Profile Details') }}</h3>
                    <p class="mt-1 max-w-2xl text-sm/6 text-zinc-500">
                        {{ __('Here you can see the details of the profile.') }}
                    </p>
                </div>
                <div class="border-t border-zinc-300">
                    <dl class="divide-y divide-zinc-300">
                        @if ($profile->first_name)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-zinc-900">{{ __("First name") }}</dt>
                                <dd class="mt-1 text-sm/6 text-zinc-700 sm:col-span-2 sm:mt-0">
                                    {{ $profile->first_name }}
                                </dd>
                            </div>
                        @endif
                        @if ($profile->last_name)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-zinc-900">{{ __("Last name") }}</dt>
                                <dd class="mt-1 text-sm/6 text-zinc-700 sm:col-span-2 sm:mt-0">
                                    {{ $profile->last_name }}
                                </dd>
                            </div>
                        @endif
                        @if ($profile->nickname)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-zinc-900">{{ __("Nickname") }}</dt>
                                <dd class="mt-1 text-sm/6 text-zinc-700 sm:col-span-2 sm:mt-0">
                                    {{ $profile->nickname }}
                                </dd>
                            </div>
                        @endif
                        @if ($profile->birth_date)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-zinc-900">{{ __("Birth date") }}</dt>
                                <dd class="mt-1 text-sm/6 text-zinc-700 sm:col-span-2 sm:mt-0">
                                    {{ $profile->birth_date }}
                                </dd>
                            </div>
                        @endif
                        @if ($profile->gender)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-zinc-900">{{ __("Gender") }}</dt>
                                <dd class="mt-1 text-sm/6 text-zinc-700 sm:col-span-2 sm:mt-0">
                                    {{ $profile->gender }}
                                </dd>
                            </div>
                        @endif
                        @if ($profile->contacts->count() > 0)
                            <div class="py-6 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm/6 font-medium text-zinc-900">Contact</dt>
                                <dd class="mt-2 text-sm text-zinc-900 sm:col-span-2 sm:mt-0">
                                    <ul role="list" class="divide-y divide-zinc-300 rounded-md border border-zinc-300">
                                        @foreach ($profile->contacts as $contact)
                                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                                                <div class="flex w-0 flex-1 items-center">
                                                    <x-fas-envelope class="size-5 shrink-0 text-zinc-400" />
                                                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-6">
                                                        <span class="truncate font-medium">{{ $contact->name }}</span>
                                                        <span class="shrink-0 text-zinc-600">{{ $contact->description }}</span>
                                                    </div>
                                                </div>
                                                @if ($contact->link)
                                                <div class="ml-4 shrink-0">
                                                    <a 
                                                        href="{{ $contact->link }}"
                                                        class="font-medium text-dark hover:text-darker"
                                                        target="_blank"
                                                    >
                                                        {{  __("Access") }}
                                                    </a>
                                                </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </x-container>
        </div>
    </div>
</x-app-layout>