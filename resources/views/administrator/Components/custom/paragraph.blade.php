@props(['value', 'dark' => false])
@php
$defaults = 'text-shade_9 dark:text-tint_1';
$classes = $dark ? $defaults : 'text-tint_1 dark:text-shade_9';
@endphp
<p {{ $attributes->merge(['class' => $classes])}}>
    {{ $value ?? $slot }}
</p>