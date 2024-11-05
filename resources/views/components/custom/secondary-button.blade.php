@php
    $defaults = 'inline-flex items-center text-center bg-lemon-base text-black font-semibold text-xs uppercase shadow-sm hover:bg-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 rounded-full tracking-widest items-center w-auto h-10 px-4 py-2 space-x-1 transition-all duration-300 border hover:scale-105';

@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $defaults]) }}>
    {{ $slot }}
</button>
