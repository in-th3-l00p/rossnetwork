<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-dark border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-darker focus:bg-darker active:bg-darker focus:outline-none focus:ring-2 focus:ring-dark focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
