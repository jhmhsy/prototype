@php
    $defaults = 'inline-flex items-center px-4 py-2 
                bg-darkmode_dark 
                text-white 
                border 
                border-gray-500 
                rounded-md font-semibold text-xs 
                uppercase tracking-widest shadow-sm 
                hover:bg-primary 
                hover:text-textblack 
                hover:border-darkmode_dark 
                focus:outline-none 
                focus:ring-2 
                focus:ring-indigo-500 
                focus:ring-offset-gray-800
                disabled:opacity-25 
                transition 
                ease-in-out 
                duration-150
                dark:bg-white 
                dark:border-gray-300 
                dark:text-gray-700 
                dark:hover:bg-darkmode_light 
                dark:hover:text-white 
                dark:focus:ring-offset-2';
    $classes = $attributes->get('class') ? $attributes->get('class').' '. $defaults : $defaults;
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
