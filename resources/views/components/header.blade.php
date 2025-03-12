@php
    $navigationLinks = [
        ['name' => 'Profiles', 'route' => route('profiles.index', [], false)],
        ['name' => 'Projects', 'route' => route('projects.index', [], false)],
        ['name' => 'Events', 'route' => route('events.index', [], false)],
    ];
@endphp
<header class="bg-white" x-data="{ isOpen: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex flex-1">
        <div class="hidden lg:flex lg:gap-x-12">
          @foreach ($navigationLinks as $link)
            <a href="{{ $link['route'] }}" class="text-sm/6 font-semibold text-gray-900">{{ $link['name'] }}</a>
          @endforeach
        </div>
        <div class="flex lg:hidden">
          <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="isOpen = true">
            <span class="sr-only">Open main menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
      </div>
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">RossNetwork</span>
        <img class="h-8 w-auto" src="/logo.svg" alt="logo">
      </a>
      <div class="flex flex-1 justify-end">
        @auth
            <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-gray-900">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
        @endauth
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true" x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-10 bg-gray-500 bg-opacity-75" x-show="isOpen" @click="isOpen = false"></div>
      <div class="fixed inset-y-0 left-0 z-10 w-full overflow-y-auto bg-white px-6 py-6" x-show="isOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
        <div class="flex items-center justify-between">
          <div class="flex flex-1">
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="isOpen = false">
              <span class="sr-only">Close menu</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">RossNetwork</span>
            <img class="h-8 w-auto" src="/logo.svg" alt="logo">
          </a>
          <div class="flex flex-1 justify-end">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-gray-900">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            @endauth
          </div>
        </div>
        <div class="mt-6 space-y-2">
          @foreach ($navigationLinks as $link)
            <a 
                href="{{ $link['route'] }}" 
                class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50"
            >{{ $link['name'] }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </header>
  