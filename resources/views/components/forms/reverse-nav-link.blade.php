@php
    $defaults = 'inline-flex items-center 
                justify-center whitespace-nowrap 
                text-sm font-medium 
                h-10
                px-10 
                py-3 
                rounded-md 
                transition-colors 
                bg-main
                text-tint_1
                hover:bg-shade_1 
                dark:hover:bg-tint_7 
                disabled:pointer-events-none 
                disabled:opacity-50';
@endphp
{{-- inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-300 disabled:pointer-events-none disabled:opacity-50 dark:text-shade_9 bg-blue-500 text-white hover:bg-blue-600 h-10 px-4 py-2 --}}
<a {{ $attributes->merge(['class' => $defaults]) }}>
    {{ $slot }}
</a>