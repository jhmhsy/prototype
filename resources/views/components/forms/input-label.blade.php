@props(['value'])
@php
    $defaults = 'block font-medium bg-transparent text-sm text-primary items-center flex font-semibold';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;
@endphp
<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>