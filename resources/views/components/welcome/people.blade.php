<div class="bg-light pt-24 sm:pt-32">
    <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
      <div class="mx-auto max-w-2xl">
        <h2 class="text-3xl text-balance font-semibold tracking-tight sm:text-5xl text-gray-900">Latest submitted profiles</h2>
        <p class="mt-6 text-lg/8 text-gray-900">Checkout the latest profiles submitted by our users.</p>
      </div>
      <ul role="list" class="mx-auto mt-8 grid no-scrollbar overflow-x-scroll max-w-2xl gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none sm:grid-cols-2 lg:grid-cols-3">
          @php
              $profiles = \App\Models\User::query()
                  ->where("profile_id", "!=", null)
                  ->join("profiles", "users.profile_id", "=", "profiles.id")
                  ->orderBy("profiles.created_at", "desc")
                  ->limit(3)
                  ->get()
                  ->map(fn ($user) => $user->currentProfile)
          @endphp
          @forelse ($profiles as $profile)
              <li>
                  <a href="{{ route("public.profiles.show", [ "profile" => $profile ]) }}">
                      <img
                          class="mx-auto size-56 rounded-full"
                          src="{{ $profile->profilePicture() }}"
                          alt=""
                      >
                      <h3 class="mt-6 text-base/7 font-semibold tracking-tight text-gray-900">{{ $profile->getDisplayName() }}</h3>
                      <p class="text-sm/6 text-gray-600">{{ $profile->title ?? "User" }}</p>
                  </a>
              </li>
          @empty
              <div class="col-span-full text-center py-12">
                  <div class="text-center">
                      <svg class="mx-auto size-12 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                      <h3 class="mt-2 text-sm font-semibold text-zinc-600">No profiles</h3>
                      <p class="mt-1 text-sm text-zinc-500">There are no profiles available to display at this time.</p>
                  </div>
              </div>
          @endforelse

      </ul>

      <a href="{{ route('public.profiles.index') }}" class="inline-block mt-8">
        <x-primary-button>
          View all profiles
        </x-primary-button>
      </a>
    </div>
  </div>
