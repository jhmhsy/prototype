@props(['route', 'text', 'active'])

<a href="{{ $route }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group 
{{ $active ? 'bg-gray-300 font-bold text-gray-700' : 'text-gray-500 hover:bg-gray-200' }}">

    <span class="flex-1 ms-3 whitespace-nowrap text-md">{{ $text }}</span>
</a>