@props(['name' => 'default', 'formId' => 'default', 'normal' => true])
<div x-data="{ open: false }" x-cloak>
    <!-- Modal trigger button -->
    <button @click="open = true"
        class="bg-red-600 text-white uppercase inline-flex items-center justify-center text-xs font-medium h-9 rounded-md px-2">
        @if ($normal)
            Delete
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                <path d="M3 6h18"></path>
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
            </svg>
        @endif
    </button>

    <!-- Modal backdrop -->
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        style="z-index: 999;">
        <!-- Modal content -->
        <div @click.away="open = false" class="bg-tint_1 dark:bg-shade_9 rounded-lg shadow-xl p-6 max-w-md w-full">
            <button @click="open = false" type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="mb-4">
                    {{ $slot }}
                </div>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this
                    {{ $name }}?</h3>
                <button @click="document.getElementById('{{ $formId }}').submit();" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 ms-3 text-center">
                    Delete
                </button>
                <button @click="open = false" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-400">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
