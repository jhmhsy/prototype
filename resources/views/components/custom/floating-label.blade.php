@props(['value'])
<label {{ $attributes->merge(['class' => '
absolute text-sm text-gray-400 dark:text-gray-300 duration-300 
transform -translate-y-4 scale-75 top-2 origin-[0] bg-white 
dark:bg-darkmode_dark px-2 peer-focus:px-2 peer-focus:text-blue-500 
peer-focus:dark:text-blue-400 peer-placeholder-shown:scale-100 
peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 
peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 
rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>