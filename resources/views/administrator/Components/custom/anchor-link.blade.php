@props(['href' => '#', 'icon' => false])

@php
    $defaults = 'text-tint_1 uppercase inline-flex items-center justify-center text-xs font-medium h-9 rounded-md px-2';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
