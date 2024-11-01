@php
    $defaults = 'inline-flex items-center px-4 py-2 bg-main border border-main rounded-md font-semibold text-xs text-tint_1 uppercase hover:bg-shade_9 hover:text-main focus:outline-none focus:ring-2 focus:ring-main focus:ring-offset-2 transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:scale-105';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
