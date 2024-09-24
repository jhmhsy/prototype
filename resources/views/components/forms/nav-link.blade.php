@props(['active' => false])

@php
$classes = ($active)
    ? 'focus:outline-none border-main text-main dark:text-tint_4'
    : 'border-tint_1 leading-5 hover:text-shade_4 dark:hover:text-tint_4 text-shade_9';
@endphp

<a {{ $attributes->merge(['class' => 'transition duration-150 ease-in-out inline-flex leading-5 font-medium text-sm items-center px-1 pt-1 border-b-2 dark:text-tint_1 ' . $classes]) }}>
    {{ $slot }}
</a>
