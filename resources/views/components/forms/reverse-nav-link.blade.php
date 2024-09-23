<a {{ $attributes->merge(['class' => '
                inline-flex items-center 
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
                dark:text-tint_1 
                dark:hover:bg-tint_7 
                disabled:pointer-events-none disabled:opacity-50']) }}>
    {{ $slot }}
</a>