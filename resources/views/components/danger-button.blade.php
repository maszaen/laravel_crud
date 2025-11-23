<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-100 border border-red-300 rounded-md font-semibold text-xs text-red-800 uppercase tracking-widest hover:bg-red-200 active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
