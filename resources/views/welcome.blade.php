<x-layout>
    <x-slot:head>
        @vite(["resources/js/alpine.js"])
    </x-slot:head>

    <x-layout.header />
    <x-welcome.hero />
    <x-welcome.events />
    <x-welcome.people />
    <x-welcome.projects />
    <x-layout.footer />
</x-layout>
