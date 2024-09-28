@php
    $defaults = "font-bold text-tint_1 dark:text-tint_4";
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp

<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
