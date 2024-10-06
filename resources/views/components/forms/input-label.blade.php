@props(['value'])
@php
    $defaults = 'block font-medium dark:bg-transparent text-sm text-shade_9 dark:text-tint_1 items-center flex text-shade_8 font-semibold';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<label
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>