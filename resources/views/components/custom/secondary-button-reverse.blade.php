<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 
bg-darkmode_dark dark:bg-white 
border border-gray-500 dark:border-gray-300
rounded-md font-semibold text-xs 
text-white dark:text-gray-700
uppercase tracking-widest shadow-sm 
hover:bg-primary hover:text-textblack
dark:hover:bg-darkmode_light dark:hover:text-white 
hover:border-darkmode_dark 
focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800
dark:focus:ring-offset-2  disabled:opacity-25 transition ease-in-out duration-150
    ']) }}>
    {{ $slot }}
</button>