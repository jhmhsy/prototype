@props(['dark' => false])
@php
    $defaults = "font-bold text-tint_1 dark:text-shade_9";
    $classes = $dark ? $attributes->get('class').' text-shade_9 dark:text-tint_1': $defaults;
@endphp

<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
