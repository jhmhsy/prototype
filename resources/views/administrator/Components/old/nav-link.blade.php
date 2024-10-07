@props(['active' => false, 'href' => '#'])

@php
$classes = ($active)
    ? 'focus:outline-none border-main text-main dark:text-tint_4 dark:border-main'
    : 'border-tint_1 leading-5 hover:text-shade_4 dark:hover:text-tint_4 text-shade_9';
$defaults = 'transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1 dark:text-tint_1'
@endphp

<button onclick="window.location.href='{{ $href }}'" {{ $attributes->merge(['class' => $classes.' '.$defaults]) }}>
    {{ $slot }}
</button>