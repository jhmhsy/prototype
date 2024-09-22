@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 dark:text-tint_1 bg-transparent rounded-lg border-1 border-gray-shade_9 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-shade_4 focus:outline-none focus:ring-0 focus:border-main peer']) }} />
