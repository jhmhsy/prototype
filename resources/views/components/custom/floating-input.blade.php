@props(['disabled' => false])
@php
    $defaults = 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-white bg-transparent rounded-lg border-1
    appearance-none text-black border-shade_4 focus:outline-none
    focus:ring-0 focus:border-main peer';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;
@endphp
<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }} />