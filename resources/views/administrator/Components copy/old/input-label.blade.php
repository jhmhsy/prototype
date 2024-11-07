@props(['value'])
@php
    $defaults = 'block font-medium dark:bg-transparent text-sm text-shade_5 dark:text-gray-300';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<label
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>