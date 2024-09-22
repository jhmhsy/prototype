@props(['value'])
<label
    {{ $attributes->merge(['class' => 'absolute text-sm text-shade_9 dark:text-shade_9 duration-300 transform -translate-y-4 scale-75 top-2 origin-[0] bg-tint_3 dark:bg-tint_7 px-2 peer-focus:px-2 peer-focus:text-shade_9 peer-focus:dark:tint_1 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 rounded-md']) }}>
    {{ $value ?? $slot }}
</label>