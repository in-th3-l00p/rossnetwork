<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RossNetwork</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="antialiased font-sans">
        <main class="w-screen h-screen flex flex-col">
            <div class="flex-1 flex flex-col items-center justify-center">
                <img src="/logo.svg" alt="logo" class="aspect-square w-32 mb-16">
                <h1 class="text-dark text-xl sm:text-3xl md:text-6xl font-bold mb-4">
                    RossNetwork
                </h1>
                <div class="grid grid-cols-[1fr_auto_1fr] gap-8 items-center justify-center">
                    <h2 class="text-dark text-base sm:text-xl md:text-3xl font-bold self-end">
                        Coming soon
                    </h2>
                    <div class="w-2 h-2 bg-dark rounded-full justify-self-center"></div>
                    <a href="https://tiscacatalin.com/articles/announcing-ross-network">
                        <h2 class="text-dark hover:text-darker transition-all text-base sm:text-xl md:text-3xl font-bold self-start">
                            Learn more
                        </h2>
                    </a>
                </div>
            </div>

            <footer class="w-full text-center py-8">
                <a 
                    href="https://tiscacatalin.com" 
                    class="text-dark hover:text-darker transition-all"
                >
                    All rights reserved © Tisca Catalin {{ date('Y') }}
                </a>
            </footer>
        </main>
    </body>
</html>
