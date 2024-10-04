@props(['active' => false])
@php
    $classes = $active
        ? 'mt-2 border-indigo-400 dark:border-indigo-600 text-gray-900 dark:text-shade_9 focus:outline-none focus:border-indigo-700'
        : 'border-transparent text-shade_9 dark:text-gray-400 hover:text-gray dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700'; 
    $defaults = 'inline-flex items-center border-b-2 font-medium leading-5 text-sm transition duration-150 ease-in-out';

@endphp
<a {{ $attributes->merge(['class' => $classes.' '.$defaults]) }}>
    {{ $slot }}
</a>

{{-- <a {{ $attributes-
    >merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5
    text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800
    focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition
    duration-150 ease-in-out']) }}>{{ $slot }} </a
> --}}
