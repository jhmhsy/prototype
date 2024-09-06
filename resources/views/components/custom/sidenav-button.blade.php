<a {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'flex items-center p-2 
    
    text-gray-900 
    rounded-lg 
    
    hover:bg-thirdy
    hover:text-accent-foreground

    dark:text-white 
    dark:hover:bg-darkmode_lighter 
    group'
]) }}>
    {{ $slot }}
</a>