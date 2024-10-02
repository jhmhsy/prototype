@extends('layouts.dash')
@section('content')
<section x-data="{ isOpen: false }">
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 border-shade_6/50 dark:border-white/5"
        data-v0-t="card">

        <div class="flex flex-row">
            <h1 class="text-2xl font-bold mb-6">Manage Tickets </h1>

        </div>

        <div>
            <div class="relative w-full overflow-auto pr-20">
                <table class="w-full caption-bottom text-sm ">
                    <thead class="[&amp;_tr]:border-b">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Name
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Email
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Quantity
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                Status
                            </th>
                            <th
                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[120px]">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="[&amp;_tr:last-child]:border-0">
                        @foreach ($tickets as $ticket)
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                {{ $ticket->name }}</td>
                            <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $ticket->email }}</td>
                            <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $ticket->quantity }}</td>
                            <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $ticket->status }}</td>


                            <td class="px-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
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
                            <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">New Event</h3>
                            <p class="text-sm text-muted-foreground">Whats this new event? </p>
                        </div>

                        <div class="p-6">



                            <form action="{{ route('ticket.store') }}" method="POST">
                                @csrf
                                <!-- This is important for CSRF protection -->

                                <div class="grid gap-2">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" placeholder="Enter your name" required />
                                </div>

                                <div class="grid gap-2">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" placeholder="Enter your email" type="email"
                                        required />
                                </div>

                                <div class="grid gap-2">
                                    <label for="quantity">Quantity</label>
                                    <select id="numberSelect" name="quantity" required>
                                        <option value="" disabled selected>ticket quantity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>

                                <div class="grid gap-2">
                                    <label for="status">Status</label>
                                    <input id="status" name="status" placeholder="Enter status" required />
                                </div>

                                <button type="submit">Submit</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection