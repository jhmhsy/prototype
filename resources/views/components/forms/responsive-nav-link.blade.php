@props(['active' => false])

@php
    $classes = ($active ?? false)
        ? 'border-indigo-400 text-indigo-700 bg-indigo-50 dark:bg-indigo-900/50 focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300'
        : 'border-transparent text-base text-secondary dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-gray-600 focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600';

    $defaults =
        'block w-full ps-3 pe-4 py-2 border-l-4 text-start font-medium focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' ' . $defaults]) }}>
    {{ $slot }}
</a>
