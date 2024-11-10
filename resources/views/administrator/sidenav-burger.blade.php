<!-- Burger Design for Admin Page sidenavbar-->
@if ($showburgerAdmin ?? false)
    <div x-data="{ sidebarOpen: false }">
        <!-- Sidebar toggle button -->
        <x-forms.nav-link @click="sidebarOpen = true" class=" rounded-md sm:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </x-forms.nav-link>

        <!-- Sidebar -->
        <div style="display: none;" x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300 sm:hidden"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-primary dark:bg-darkmode_dark shadow-lg transform">

            <div class="flex flex-col h-full">
                <!-- Close button -->
                <button @click="sidebarOpen = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Sidebar content -->
                <nav class="flex-1 px-4 py-6 overflow-y-auto">
                    <a href="{{ route('welcome') }}">
                        <h2 class="text-xl font-semibold mb-4">Menu</h2>
                    </a>

                    <ul class="space-y-2">
                        <div>

                            @include('administrator.includes.sidenav')
                        </div>
                    </ul>
                </nav>

                <!-- Footer -->
                <div class=" p-4 border-t">
                    <p class="text-sm text-gray-500">&copy; 2023 All Fitness Reserved</p>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div style="display: none;" x-show="sidebarOpen" x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 z-20"
            @click="sidebarOpen = false"></div>
    </div>
@endif