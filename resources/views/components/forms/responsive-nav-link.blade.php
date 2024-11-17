@props(['active' => false])

@php
    $defaults =
        'text-white block w-full ps-3 pe-4 py-2 border-l-4 text-start font-medium focus:outline-none transition
    duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $defaults]) }}>
    {{ $slot }}
</a>