@php
    $defaults = 'inline-flex items-center px-3 py-3 bg-main border border-main rounded-md font-bold text-sm text-shade_9 uppercase hover:bg-main hover:text-tint_1 focus:outline-none transition ease-in-out duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp
<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
