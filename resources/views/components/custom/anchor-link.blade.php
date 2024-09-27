@props(['href' => '#', 'icon' => false])

@php
    $defaults = 'text-tint_1 uppercase inline-flex items-center justify-center text-xs font-medium h-9 rounded-md px-2';
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => $defaults]) }}>
    {{ $slot }}
</a>
