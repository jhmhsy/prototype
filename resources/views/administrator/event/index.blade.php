<x-dash-layout>
    <section x-data="{ isOpen: false }">
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 border-shade_6/50 dark:border-white/5"
            data-v0-t="card">

            <div class="flex flex-row">
                <h1 class="text-xl font-bold mb-6 dark:text-white">Manage your Events</h1>
                <div class="ml-auto flex items-center gap-2">
                    <button @click="isOpen = true"
                        class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-3.5 w-3.5 dark:text-white">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        <span class="sr-only sm:not-sr-only dark:text-white">New Reservation</span>
                    </button>
                </div>
            </div>

            <div>
                <div class="relative w-full overflow-auto pr-20">
                    <table class="w-full caption-bottom text-sm mb-3">
                        <thead class="dark:text-white">
                            <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                    Event
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                    Location
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                    Details
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                    Date
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                    Time
                                </th>
                                <th
                                    class="h-12 px-4 text-center align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[120px]">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 dark:text-gray-400">
                            @foreach ($events as $event)
                                <tr
                                    class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">

                                    <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        {{ $event->name }}
                                    </td>
                                    <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        {{ $event->location }}
                                    </td>

                                    <td class="px-4 align-middle ">
                                        {{ \Illuminate\Support\Str::limit($event->details, 15) }}
                                    </td>

                                    <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $event->date }}
                                    </td>
                                    <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $event->time }}
                                    </td>

                                    <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="flex items-center justify-center gap-2">
                                            <x-custom.anchor-link class="bg-main hover:bg-shade_2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </x-custom.anchor-link>
                                            <x-custom.anchor-link class="bg-green-500 hover:bg-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg>
                                            </x-custom.anchor-link>
                                            <x-custom.anchor-link class="bg-red-500 hover:bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="  text-red-500h-4 w-4">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                </svg>
                                            </x-custom.anchor-link>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-1">
                        {{ $events->links('pagination::simple-tailwind') }}
                    </div>
                </div>


                <!-- Modal -->
                @include ('administrator.event.add-event')
            </div>
        </div>
    </section>
</x-dash-layout>