@props(['errors'])

@php
    $defaults = 'text-xs text-red-600 dark:text-red-400 space-y-1';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
@if ($errors)
    <ul {{ $attributes->merge(['class' => $classes]) }}>
        @foreach ((array) $errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
