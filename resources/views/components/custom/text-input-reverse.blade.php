@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => '

border-gray-300
dark:border-gray-700

focus:border-white-500
dark:focus:border-white
focus:ring-white-500
dark:focus:ring-white-600

rounded-md shadow-sm

text-white
dark:text-textblack

bg-darkmode_dark
dark:bg-white
'
]) !!}>