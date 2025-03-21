<div class="pt-24 sm:pt-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Upcoming events</h2>
            <p class="mt-2 text-lg/8 text-gray-600">Checkout the latest events submitted by our users.</p>
        </div>
        <div class="mx-auto mt-8 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <article class="flex flex-col items-start justify-between">
                <div class="relative w-full">
                    <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                        alt=""
                        class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
                <div class="max-w-xl">
                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Some hackathon
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">Illo sint voluptas. Error voluptates culpa
                            eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed
                            exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
                    </div>
                </div>
            </article>

            <!-- More posts... -->
        </div>
        <div class="mt-8 flex justify-center">
            <a href="{{ route('events.index') }}" class="block mx-auto">
                <x-primary-button>
                    View all events
                </x-primary-button>
            </a>
        </div>
    </div>
</div>