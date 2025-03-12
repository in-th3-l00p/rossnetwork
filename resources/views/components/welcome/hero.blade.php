<div class="relative isolate overflow-hidden">
    <div @class([
        "mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8",
        "grid grid-cols-1 lg:grid-cols-2 lg:gap-x-16 lg:items-center"
    ])>
        <img 
            src="logo.svg"
            alt="logo"
            class="mb-10 mx-auto w-full max-w-72 object-cover lg:mb-0 lg:mx-0"
        >

        <div class="space-y-8">
            <h1
                class="max-w-2xl text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl lg:col-span-2 xl:col-auto"
            >
                {{ __("welcome.hero.title")  }}
            </h1>
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
                <p class="text-pretty text-lg font-medium text-gray-700 sm:text-xl/8">
                    {{ __("welcome.hero.description")  }}
                </p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a 
                        href="{{ route("login")  }}"
                        class="rounded-md bg-dark px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-darker focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600"
                    >
                        {{ __("welcome.hero.button")  }}
                    </a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">{{ __("welcome.hero.learn_more")  }}</a>
                </div>
            </div>
        </div>
    </div>
</div>