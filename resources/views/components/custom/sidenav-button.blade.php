@props(['active' => false])
@php
    $classes = $active
        ? 'nav-link flex items-center p-2 text-gray-900 rounded bg-tertiary hover:text-accent-foreground dark:text-white dark:hover:bg-darkmode_lighter'
        : 'nav-link flex items-center p-2 text-gray-900 rounded hover:bg-tertiary hover:text-accent-foreground dark:text-white dark:hover:bg-darkmode_lighter'
@endphp
<a type="submit" {{ $attributes->merge(['class' => $classes])}}>
    {{ $slot }}
</a>
