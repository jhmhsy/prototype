@props(['status'])

@php
    $defaults = 'font-medium text-sm text-green-600 dark:text-green-400';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
@if ($status)
<div {{ $attributes->merge(['class' => $defaults])->merge(['class' => $attributes->get('class')]) }}>
    {{ $status }}
</div>
@endif