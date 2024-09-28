@props(['value'])
@php
    $defaults = 'block font-medium text-sm text-gray-700 dark:text-gray-300';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>