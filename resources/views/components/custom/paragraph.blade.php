@props(['value', 'isdark' => false])
@php
    $defaults = 'text-shade_9 dark:text-shade_9';
    $classes = $isdark ? $defaults : 'text-tint_1 dark:text-tint_1';
@endphp
<p {{ $attributes->merge(['class' => $classes])}}>
    {{ $value ?? $slot }}
</p>