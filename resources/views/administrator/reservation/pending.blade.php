<x-dash-layout>
    <div class="rounded-lg border shadow-sm p-6  text-shade_9  
border-shade_6/50 dark:border-white/5">
        <h1 class="text-lg font-bold mb-6 dark:text-blue-500">Awaiting Confirmations</h1>
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
                        <th class="h-12 px-4 text-center align-middle">
                            Actions
                        </th>
                </thead>

                <tbody class="text-gray-600 dark:text-gray-400">
                    @foreach ($pendingBookings as $booking)
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
                            <div class="flex items-center justify-center gap-2">

                                <form action="{{ route('reservations.accept', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                                </form>
                                <form action="{{ route('reservations.reject', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded">Reject</button>
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