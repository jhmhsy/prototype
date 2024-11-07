<x-dash-layout>
    <div class="rounded-lg border shadow-sm p-6  text-shade_9  
border-shade_6/50 dark:border-white/5" data-v0-t="card">
        <div class="flex flex-col gap-2">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold dark:text-white">Active Reservation</h1>

            </div>


            <span class="text-sm text-gray-600 dark:text-gray-400" @if ($acceptedBookings->isEmpty()) style="display:
            none;" @endif>
                Page {{ $acceptedBookings->currentPage() }} of {{ $acceptedBookings->lastPage() }}
            </span>


            <!-- Pagination / search bar controls -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Pagination -->
                <div>
                    {{ $acceptedBookings->links('vendor.pagination.custom-pagination') }}
                </div>


                <!-- Search bar -->
                <form method="GET" action="{{ route('administrator.active') }}" class="mb-4">
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
                        <input type="text" name="search" value="{{ request('search') }}" maxlength="250"
                            placeholder="Search events..."
                            class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                    </div>
                </form>


            </div>
        </div>
        <div class="relative w-full overflow-auto">
            <table class="w-full text-sm">
                <thead class="text-black dark:text-white">
                    <tr class="transition-colors hover:bg-muted/50">
                        <th class="h-12 px-4 text-left align-middle">
                            <a href="{{ route('administrator.active', ['sortBy' => 'name', 'sortDirection' => $sortBy === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                class="{{ $sortBy === 'name' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                Name
                            </a>
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            <a href="{{ route('administrator.active', ['sortBy' => 'email', 'sortDirection' => $sortBy === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                class="{{ $sortBy === 'email' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                Email
                            </a>
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            <a href="{{ route('administrator.active', ['sortBy' => 'date', 'sortDirection' => $sortBy === 'date' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                class="{{ $sortBy === 'date' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                Date
                            </a>
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            <a href="{{ route('administrator.active', ['sortBy' => 'time', 'sortDirection' => $sortBy === 'time' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                class="{{ $sortBy === 'time' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                Time
                            </a>
                        </th>
                        <th class="h-12 px-4 text-center align-middle">
                            Actions
                        </th>
                    </tr>
                </thead>


                <tbody class="text-gray-600 dark:text-gray-400">
                    @if ($acceptedBookings->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <span class="text-gray-600 dark:text-gray-400">No Active Bookings yet.</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($acceptedBookings as $booking)
                            <tr
                                class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    {{ $booking->name }}
                                </td>
                                <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                    {{ $booking->email }}
                                </td>

                                <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    {{ $booking->date }}
                                </td>
                                <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    {{ $booking->time }}
                                </td>

                                <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    <div class="flex items-center justify-center gap-2">
                                        <form action="{{ route('reservations.accept', $booking->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 text-white px-2 py-1 rounded">Details</button>
                                        </form>

                                        <form action="{{ route('reservations.cancel', $booking->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 text-white px-2 py-1 rounded">Cancel</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>


            </table>
        </div>
    </div>
</x-dash-layout>