@props(['active' => false])
@php
    $classes = $active
        ? 'bg-main hover:text-accent-foreground text-tint_1 dark:text-tint_1 dark:bg-shade_4'
        : 'hover:bg-tint_5 hover:text-accent-foreground hover:text-tint_1 dark:text-tint_1 dark:hover:bg-shade_7'
@endphp
<a type="submit" {{ $attributes->merge(['class' => 'nav-link flex items-center p-2 text-gray-900 rounded '.$classes])}}>
    {{ $slot }}
</a>
