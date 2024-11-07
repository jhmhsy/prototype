@php
    $defaults = 'uppercase bg-main dark:bg-shade_4 text-tint_1 dark:text-tint_2 rounded py-2 px-6 font-bold hover:bg-shade_4
    dark:hover:bg-shade_7 transition-color duration-300';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>