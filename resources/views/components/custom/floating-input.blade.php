@props(['disabled' => false])
@php
    $defaults = 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 dark:text-tint_1 bg-transparent rounded-lg border-1 border-gray-shade_9 appearance-none dark:text-white dark:border-shade_4 dark:focus:border-tint_1 focus:outline-none focus:ring-0 focus:border-main peer';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }} />
