@props(['active' => false])

@php
    $classes = $active
        ? 'border-main text-main dark:text-tint_4 dark:border-main' // Active link styles
        : 'border-transparent text-shade_8 hover:text-main dark:text-tint_2 dark:hover:text-tint_4'; // Inactive link styles

    $defaults =
        'border-b-2 transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' ' . $defaults]) }}>
    {{ $slot }}
</a>
