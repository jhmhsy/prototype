@props(['active' => false])

@php
    $classes = $active
        ? 'border-lemon-base text-lemon-base' // Active link styles
        : 'border-transparent hover:text-lemon-base hover:border-lemon-base hover:transform hover:-translate-y-0.5'; // Inactive link styles

    $defaults =
        'border-b-2 transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' ' . $defaults]) }}>
    {{ $slot }}
</a>
