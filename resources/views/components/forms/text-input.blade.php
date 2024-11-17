@props(['disabled' => false])
@php
$defaults =
'border-gray-300 dark:border-gray-700 dark:bg-tint_2 dark:text-white focus:border-shade_5 dark:focus:border-main
focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block px-2.5 pb-2.5 w-full text-sm text-shade_9
placeholder-tint_1 dark:placeholder-shade_9 bg-transparent border-1 appearance-none focus:outline-none focus:ring-0
peer';
$classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;

@endphp
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>