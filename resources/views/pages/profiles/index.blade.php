<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light2 overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile List') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Here you can see all the profiles, including the one that's active, and the ones that are not.") }}
                        </p>
                    </header>
                    <div class="flex justify-end items-center">
                        <form action="{{ route('profiles.store') }}" method="POST">
                            @csrf
                            <x-primary-button title="{{ __('Create') }}">
                                {{ __('Create') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach (auth()->user()->profiles as $profile)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                <div class="bg-light2 overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
                    <div class="flex justify-end items-center gap-2 mb-6">
                        <a href="{{ route('profiles.edit', $profile->id) }}">
                            <x-primary-button>
                                <x-fas-pencil class="size-4 shrink-0 text-white" />
                            </x-primary-button>
                        </a>
                    </div>

                    <p>{{ __("First name")  }}: {{ $profile->first_name }}</p>
                    <p>{{ __("Last name")  }}: {{ $profile->last_name }}</p>
                    <p>{{ __("Birth date")  }}: {{ $profile->birth_date }}</p>`
                    <p>{{ __("Gender")  }}: {{ $profile->gender }}</p>
                    <p>{{ __("Nickname")  }}: {{ $profile->nickname }}</p>
                    <p>{{ __("Address")  }}: {{ $profile->address }}</p>
                    <p>{{ __("City")  }}: {{ $profile->city }}</p>
                    <p>{{ __("State")  }}: {{ $profile->state }}</p>
                    <p>{{ __("Zip code")  }}: {{ $profile->zip_code }}</p>
                    <p>{{ __("Avatar")  }}: {{ $profile->avatar }}</p>
                    <p>{{ __("Bio")  }}: {{ $profile->bio }}</p>

                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>