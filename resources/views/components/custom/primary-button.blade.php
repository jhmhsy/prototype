@php
    $defaults = 'inline-flex items-center px-4 py-2 bg-main dark:bg-shade_4 dark:text-tint_1 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-shade_3 dark:hover:bg-shade_3 dark:hover:text-secondary focus:outline-none transition ease-in-out duration-150';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
