<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-main dark:bg-shade_4 dark:text-tint_1 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest dark:hover:bg-shade_3 dark:hover:text-secondary focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
