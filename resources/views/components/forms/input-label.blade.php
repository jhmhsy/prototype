@props(['value'])
@php
    $defaults = 'block font-medium dark:bg-transparent text-sm text-shade_5 dark:text-shade_9 items-center flex text-shade_8 font-semibold';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<label
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>