@props(['active' => false, 'custom' => false])

@php
    $defaults = $active
        ? 'border-lemon-base text-lemon-base border-b-2 transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1' // Active link styles
        : 'border-transparent hover:text-lemon-base hover:border-lemon-base hover:transform hover:-translate-y-0.5 border-b-2 transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1'; // Inactive link styles
    
    $classes = ' transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1';
    $final = $custom ? $classes . ' ' : $defaults;
@endphp

<a {{ $attributes->merge(['class' => $final]) }}>
    {{ $slot }}
</a>
