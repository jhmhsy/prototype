<x-dash-layout>
    <h1>Canceled</h1>
    <div class="relative w-full overflow-auto">
        <table class="w-full text-sm">
            <thead>
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

            <tbody class="border-0">
                @foreach ($rejectedBookings as $booking)
                <tr class="border-t dark:border-white/30 transition-colors hover:bg-muted/50 py-20">
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
                                <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                            </form>
                            <form action="{{ route('reservations.delete', $booking->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>


        </table>
    </div>
</x-dash-layout>