@props(['active' => false])

@php
    $classes = $active
        ? 'border-main text-main dark:text-tint_4 dark:border-main'  
        : 'border-transparent text-shade_9 hover:text-main dark:text-tint_1 dark:border-transparent dark:hover:text-tint_4';  // Border & text for inactive links
    $defaults =
        'border-b-2 transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1';  // General styles
@endphp

<a {{ $attributes->merge(['class' => $classes . ' ' . $defaults]) }}>
    {{ $slot }}
</a>