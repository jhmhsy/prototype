<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 
                bg-white 
                text-gray-700 
                border 
                border-gray-300 
                rounded-md 
                font-semibold 
                text-xs 
                uppercase 
                tracking-widest 
                shadow-sm 

                hover:bg-darkmode_light 
                hover:text-white 

                focus:outline-none 
                focus:ring-2 
                focus:ring-indigo-500 
                focus:ring-offset-2 

                disabled:opacity-25 
                transition 
                ease-in-out 
                duration-150

               
                dark:border-gray-500 
                dark:text-white 
                dark:hover:bg-primary 
                dark:hover:text-textblack 
                dark:hover:border-darkmode_dark 
                dark:focus:ring-offset-gray-800'
]) }}>
    {{ $slot }}
</button>