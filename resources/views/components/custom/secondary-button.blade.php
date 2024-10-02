@php
    $defaults = 'inline-flex items-center
                text-center
                bg-main 
                text-tint_1 
                rounded-md 
                font-semibold 
                text-xs 
                uppercase 
                tracking-widest 
                shadow-sm 
                hover:bg-white 
                hover:text-gray-700 
                focus:outline-none 
                focus:ring-2 
                focus:ring-indigo-500 
                focus:ring-offset-2 
                disabled:opacity-25 
                transition 
                ease-in-out 
                duration-150
                dark:bg-main 
                dark:text-white 
                dark:hover:bg-shade_4 
                dark:hover:text-white 
                dark:focus:ring-offset-gray-800';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
