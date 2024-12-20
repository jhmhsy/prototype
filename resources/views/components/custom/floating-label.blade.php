@props(['value'])
@php
    $defaults = 'absolute text-sm text-primary duration-300 transform -translate-y-4 scale-75 top-2 origin-[0] bg-peak-3 px-2 peer-focus:px-2 peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 rounded-md';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<label
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>