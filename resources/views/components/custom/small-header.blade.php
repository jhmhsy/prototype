@php
    $defaults = "font-bold text-shade_9 dark:text-tint_1";
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp

<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
