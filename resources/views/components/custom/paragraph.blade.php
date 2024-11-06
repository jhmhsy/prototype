@props(['value', 'dark' => false])
@php
    $defaults = 'text-secondary'
@endphp
<p {{ $attributes->merge(['class' => $defaults]) }}>
    {{ $value ?? $slot }}
</p>
