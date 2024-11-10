@canany(['reservation-list'])
<x-dash-layout>
    <div class="flex flex-col gap-4 border-shade_6/50 dark:border-white/5"
        x-data="{ currentTab: 'Pending', titles: { pending: 'Pending Reservations', accepted: 'Accepted Reservations', rejected: 'Rejected Reservations' } }">

        <div>
            <h1 class="text-xl font-bold mb-2 text-black dark:text-white" x-text="titles[currentTab.toLowerCase()]">
            </h1>
        </div>

        @if (session('success'))
        <div class="bg-green-500 text-white p-2 -mt-2 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div dir="ltr" data-orientation="horizontal">
            <div class="flex items-center space-x-3">
                <div role="tablist" aria-orientation="horizontal"
                    class="inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground"
                    tabindex="0" data-orientation="horizontal" style="outline: none;">

                    <button @click="currentTab = 'Pending'" type="button" role="tab"
                        aria-selected="currentTab === 'Pending'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="currentTab === 'Pending' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black'">
                        Pending
                    </button>

                    <button @click="currentTab = 'Accepted'" type="button" role="tab"
                        aria-selected="currentTab === 'Accepted'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="currentTab === 'Accepted' ? 'bg-green-500 text-white' : 'bg-gray-200 text-black'">
                        Accepted
                    </button>

                    <button @click="currentTab = 'Rejected'" type="button" role="tab"
                        aria-selected="currentTab === 'Rejected'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="currentTab === 'Rejected' ? 'bg-red-500 text-white' : 'bg-gray-200 text-black'">
                        Rejected
                    </button>
                </div>

            </div>

            <main class="rounded-lg border dark:border-white/30 shadow-sm text-black dark:text-white" data-v0-t="card">
                <div style="display: none;" x-show="currentTab === 'Pending'" class="p-2 ">
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
                                    <th class="h-12 px-4 text-center align-middle">
                                        Actions
                                    </th>
                            </thead>

                            <tbody class="border-0">
                                @foreach ($pendingBookings as $booking)
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

                                    <td class="px-4 py-3 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('reservations.accept', $booking->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                                            </form>
                                            <form action="{{ route('reservations.reject', $booking->id) }}"
                                                method="POST" style="display:inline;">
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

                <div style="display: none;" x-show="currentTab === 'Accepted'" class="p-2 ">
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
                                    <th class="h-12 px-4 text-center align-middle">
                                        Actions
                                    </th>
                            </thead>

                            <tbody class="border-0">
                                @foreach ($acceptedBookings as $booking)
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
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('reservations.accept', $booking->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-2 py-1 rounded">Details</button>
                                            </form>

                                            <form action="{{ route('reservations.cancel', $booking->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-2 py-1 rounded">Cancel</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>

                <div style="display: none;" x-show="currentTab === 'Rejected'" class="p-2 ">
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
                                    <th class="h-12 px-4 text-center align-middle">
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
                                        <div class="flex items-center justify-center gap-2">

                                            <form action="{{ route('reservations.restore', $booking->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                                            </form>
                                            <form action="{{ route('reservations.delete', $booking->id) }}"
                                                method="POST" style="display:inline;">
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

        </div>
    </div>
</x-dash-layout>
@endcanany