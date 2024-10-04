<!--a dark button when hover turns bg-coolblue -->
@php
    $defaults = 'inline-flex items-center 
                justify-center whitespace-nowrap 
                ext-sm font-medium 
                h-10 
                px-10 
                py-3 
                rounded-md 
                transition-colors 
                bg-darkmode_dark
                text-textwhite 
                hover:bg-coolblue 
                dark:bg-primary 
                dark:text-textblack 
                dark:hover:bg-coolblue 
                dark:hover:text-textwhite 
                ring-offset-background 
                focus-visible:outline-none 
                focus-visible:ring-2 
                focus-visible:ring-ring 
                focus-visible:ring-offset-2 
                disabled:pointer-events-none 
                disabled:opacity-50';
    $classes = $attributes->get('class') ? $attributes->get('class') . ' ' . $defaults : $defaults;

@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
    {{ $slot }}
</button>
