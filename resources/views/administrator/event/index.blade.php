@canany(['event-list', 'event-view', 'event-create', 'event-edit', 'event-delete'])
<x-dash-layout title="Events">
    <section x-data="{ createmodal: false ,viewmodal:false, Editmodal:false}">
        <div class="mx-1 md:mx-3 lg:mx-5 rounded-lg shadow-sm p-6 bg-white dark:bg-peak-3 border dark:border-white/10">

            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold dark:text-white">Manage your Events</h1>
                    <div class="ml-auto flex items-center gap-2 ">
                        @can('event-create')
                            <button @click="createmodal = true"
                                class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center text-sm font-medium border dark:text-white dark:border-white/50 rounded-md px-3 h-8 gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-3.5 w-3.5 dark:text-white">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                                <span class="sr-only sm:not-sr-only ">New Event</span>
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
            <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm ">
                    <thead>
                        <tr class="transition-colors rounded-md hover:bg-muted/50 text-gray-500 dark:bg-peak_2">
                            <th class="h-12 px-4 text-left align-middle font-medium">
                                <a href="{{ route('administrator.events', ['sortBy' => 'name', 'sortDirection' => $sortBy === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="{{ $sortBy === 'name' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                    Event
                                </a>
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium ">
                                <a href="{{ route('administrator.events', ['sortBy' => 'location', 'sortDirection' => $sortBy === 'location' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="{{ $sortBy === 'location' ? 'text-black dark:text-white ' : 'text-gray-500' }}">
                                    Location
                                </a>
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium">
                                <a href="{{ route('administrator.events', ['sortBy' => 'details', 'sortDirection' => $sortBy === 'details' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="{{ $sortBy === 'details' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                    Details
                                </a>
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium">
                                <a href="{{ route('administrator.events', ['sortBy' => 'date', 'sortDirection' => $sortBy === 'date' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="{{ $sortBy === 'date' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                    Date
                                </a>
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium">
                                <a href="{{ route('administrator.events', ['sortBy' => 'time', 'sortDirection' => $sortBy === 'time' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="{{ $sortBy === 'time' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                    Time
                                </a>
                            </th>
                            @canany(['event-view', 'event-edit', 'event-delete'])
                                <th class="h-12 text-center align-middle font-medium">Actions</th>
                            @endcanany
                        </tr>

                    </thead>

                    <tbody class="text-gray-600 dark:text-gray-400">
                        @if ($events->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <span class="text-gray-600 dark:text-gray-400">No events yet.</span>
                                </td>
                            </tr>
                        @else
                                        @foreach ($events as $event)
                                            <tr
                                                class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">

                                                <td class=" px-4 align-middle font-medium">
                                                    {{ $event->name }}
                                                </td>
                                                <td class="px-4 align-middle ">
                                                    {{ $event->location }}
                                                </td>

                                                <td class="px-4 align-middle ">
                                                    {{ \Illuminate\Support\Str::limit($event->details, 15) }}
                                                </td>

                                                <td class="px-4 align-middle ">{{ $event->date }}
                                                </td>
                                                <td class="px-4 align-middle ">{{ $event->time }}
                                                </td>
                                                @canany(['event-view', 'event-edit', 'event-delete'])
                                                    <td class="px-4 align-middle">

                                                        <div class="action-dropdown flex items-center justify-center">
                                                            <button
                                                                class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                                <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                                </svg>
                                                            </button>

                                                            <div
                                                                class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                                <div class="py-1">
                                                                    @can('event-view')
                                                                        <button @click="viewmodal = {{$event->id}}"
                                                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                                class="w-4 h-4 mr-3">
                                                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                                <circle cx="12" cy="12" r="3" />
                                                                            </svg>
                                                                            View
                                                                        </button>
                                                                    @endcan

                                                                    @can('event-edit')
                                                                        <button @click="Editmodal = {{$event->id}}"
                                                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                                            </svg>
                                                                            Edit
                                                                        </button>
                                                                    @endcan



                                                                    @can('event-delete')
                                                                        <form method="POST" action="{{ route('events.destroy', $event->id) }}"
                                                                            style=" display:inline" class="hidden">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                                    class="w-4 h-4 mr-3">
                                                                                    <path d="M3 6h18"></path>
                                                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                                </svg>
                                                                                Delete
                                                                            </button>
                                                                        </form>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                @endcanany
                                            </tr>


                                            <!-- Actions Modal -->
                                            @include ('administrator.event.show')
                                            @include ('administrator.event.edit')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

            <!-- Create Modal -->
            @include ('administrator.event.add-event')


        </div>

    </section>

</x-dash-layout>
@endcan