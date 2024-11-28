@if ($paginator->hasPages())
    <div x-show="{{ $paginator->total() }} > 1" class="flex items-center gap-3">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <button disabled
                class="cursor-not-allowed inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2
                                                                                        text-gray-500 bg-gray-200 dark:bg-gray-900 dark:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2
                                                                                        text-gray-500 hover:bg-gray-50 active:bg-gray-300 hover:text-black dark:hover:text-white dark:hover:bg-peak_2 dark:active:bg-peak_3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        @endif

        <!-- Pagination Links -->
        <!-- Pagination Links -->
        @php
            $start = max($paginator->currentPage() - 2, 1);
            $end = min($start + 2, $paginator->lastPage());
            $start = max(min($start, $paginator->lastPage() - 4), 1);
        @endphp

        @if ($start > 1)
            <a href="{{ $paginator->url(1) }}"
                class="cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2 text-gray-500 hover:bg-gray-50 active:bg-gray-300 hover:text-black dark:hover:text-white dark:hover:bg-peak_2 dark:active:bg-peak_3">1</a>
            @if ($start > 2)
                <span class="text-gray-400">...</span>
            @endif
        @endif

        @foreach (range($start, $end) as $page)
            @if ($page == $paginator->currentPage())
                <span class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}"
                    class="cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2 text-gray-500 hover:bg-gray-50 active:bg-gray-300 hover:text-black dark:hover:text-white dark:hover:bg-peak_2 dark:active:bg-peak_3">{{ $page }}</a>
            @endif
        @endforeach

        @if ($end < $paginator->lastPage())
            @if ($end < $paginator->lastPage() - 1)
                <span class="text-gray-400">...</span>
            @endif
            <a href="{{ $paginator->url($paginator->lastPage()) }}"
                class="cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2 text-gray-500 hover:bg-gray-50 active:bg-gray-300 hover:text-black dark:hover:text-white dark:hover:bg-peak_2 dark:active:bg-peak_3">{{ $paginator->lastPage() }}</a>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2
                                                                                        text-gray-500 hover:bg-gray-50 active:bg-gray-300 hover:text-black dark:hover:text-white dark:hover:bg-peak_2 dark:active:bg-peak_3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <button disabled
                class="cursor-not-allowed inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2
                                                                                        text-gray-500 bg-gray-200 dark:bg-gray-700 dark:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        @endif
    </div>
@endif