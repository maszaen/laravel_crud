<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber-300 border border-amber-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
