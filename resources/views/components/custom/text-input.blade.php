@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => '
border-gray-300
dark:border-gray-700

dark:bg-darkmode_dark
dark:text-gray-300

focus:border-white-500
focus:ring-white-500
dark:focus:border-white
dark:focus:ring-white-600

rounded-md shadow-sm
'
]) !!}>