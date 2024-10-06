<x-dash-layout>
    <div class="rounded-lg border shadow-sm p-6  text-shade_9  
border-shade_6/50 dark:border-white/5">
        <h1 class="text-lg font-bold mb-6 dark:text-red-500">Canceled / Suspended</h1>
        <div class="relative w-full overflow-auto">
            <table class="w-full text-sm">
                <thead class="text-black dark:text-white ">
                    <tr>
                        <th class="h-12 px-4 text-left align-middle">
                            Name
                        <th class="h-12 px-4 text-left align-middle">
                            Email
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            Room
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            Date
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            Time
                        </th>
                        <th class="h-12 px-4 text-left align-middle">
                            Actions
                        </th>
                </thead>

                <tbody class="text-gray-600 dark:text-gray-400">
                    @foreach ($rejectedBookings as $booking)
                    <tr
                        class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            {{ $booking->name }}
                        </td>
                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                            {{ $booking->email }}
                        </td>
                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            {{ $booking->room }}
                        </td>

                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            {{ $booking->date }}
                        </td>
                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            {{ $booking->time }}
                        </td>

                        <td class="px-4  py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            <div class="flex items-center gap-2">

                                <form action="{{ route('reservations.restore', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                                </form>
                                <form action="{{ route('reservations.delete', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</x-dash-layout>