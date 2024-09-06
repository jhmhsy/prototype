<header
    class="flex items-center justify-between px-6 py-4 border-b border-border dark:bg-darkmode_light dark:text-white">
    <!-- Back button -->
    <div class="flex items-center gap-3 text-foreground" href="#">
        <x-custom.nav-link href="{{ route('welcome') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                <polyline points="10 17 15 12 10 7"></polyline>
                <line x1="15" x2="3" y1="12" y2="12"></line>
            </svg>
        </x-custom.nav-link>
        <span class="text-xl font-bold">Administrator Panel</span>
    </div>

    <div class="flex items-center gap-4">
        <div role="group" dir="ltr" class="flex items-center justify-center gap-1" tabindex="0" style="outline: none;">

            <x-custom.input-darkmode>
            </x-custom.input-darkmode>
        </div>

        @include('layouts.navigation')
    </div>
</header>