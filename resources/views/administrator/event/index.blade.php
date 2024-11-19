@canany(['event-list', 'event-view', 'event-create', 'event-edit', 'event-delete'])
<x-dash-layout title="Events">
    <section x-data="{ createmodal: false ,viewmodal:false, Editmodal:false}">
        <div class="rounded-lg shadow-sm p-6  bg-white dark:bg-peak_1">

            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold dark:text-white">Manage your Events</h1>
                    <div class="ml-auto flex items-center gap-2 ">
                        @can('event-create')
                        <button @click="createmodal = true"
                            class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center text-sm font-medium  border rounded-md px-3 h-8 gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-3.5 w-3.5 dark:text-white">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <span class="sr-only sm:not-sr-only dark:text-white">New Event</span>
                        </button>
                        @endcan
                    </div>
                </div>


                <span class="text-sm text-gray-600 dark:text-gray-400" @if ($events->isEmpty()) style="display:
                    none;" @endif>
                    Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
                </span>


                <!-- Pagination / search bar controls -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Pagination -->
                    <div>
                        {{ $events->links('vendor.pagination.custom-pagination') }}
                    </div>


                    <!-- Search bar -->
                    <form method="GET" action="{{ route('administrator.events') }}" class="mb-4">
                        <div class="relative">
                            <button type="submit"
                                class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span> <!-- For accessibility -->
                            </button>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search events..."
                                class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                        </div>
                    </form>


                </div>
            </div>


            <!-- Create Modal -->
            @include ('administrator.event.add-event')


        </div>

    </section>

</x-dash-layout>
@endcan