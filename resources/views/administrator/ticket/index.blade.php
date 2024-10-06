<x-dash-layout>
    <section x-data="{ isOpen: false }">
        <div class="rounded-lg border shadow-sm p-6  text-shade_9  
    border-shade_6/50 dark:border-white/5">

            <div class="flex flex-row">
                <h1 class="text-lg font-bold mb-6 dark:text-white">Equipment Management</h1>
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
                    <table class="w-full caption-bottom text-sm ">
                        <thead class="text-black dark:text-white ">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Name
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Email
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Quantity
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Status
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground  w-[120px]">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 dark:text-gray-400">
                            @foreach ($tickets as $ticket)
                            <tr
                                class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                <td class="px-4 align-middle  font-medium">
                                    {{ $ticket->name }}</td>
                                <td class="px-4 align-middle ">{{ $ticket->email }}
                                </td>
                                <td class="px-4 align-middle ">{{ $ticket->quantity }}
                                </td>
                                <td
                                    class="px-4 align-middle  {{ $ticket->status === 'claimed' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $ticket->status }}
                                </td>



                                <td class="px-4 align-middle ">
                                    <div class="flex items-center justify-end gap-2">
                                        <x-custom.anchor-link class="bg-main hover:bg-shade_2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </x-custom.anchor-link>
                                        <x-custom.anchor-link class="bg-main hover:bg-shade_2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
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

                </div>



                <!-- Modal -->

                <div style="display: none;" x-show="isOpen" class="fixed select-none inset-0 bg-black opacity-50 z-40">
                </div>

                <div style="display: none;"
                    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
                    x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90" @click.away="isOpen = false">
                    <div class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                        <div class=" mt-50 p-4">
                            <div class="flex flex-col space-y-1.5 px-6">
                                <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">Scan QRCode</h3>

                            </div>

                            <div class="p-6">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>