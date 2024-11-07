@php
    $defaults = 'text-xl font-bold text-tint_1 dark:text-tint_6';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;
@endphp

<h3 {{ $attributes->merge(['class' => $classes])}}>
    {{ $slot }}
</h3>