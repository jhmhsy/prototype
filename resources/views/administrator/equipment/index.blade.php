<x-dash-layout>
    <x-custom.loader2 />
    <section x-data="{ isOpen: false }">
        <div class="rounded-lg border shadow-sm p-6  text-shade_9  
    border-shade_6/50 dark:border-white/5" data-v0-t="card">
            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold dark:text-white">Manage your Events</h1>
                    <div class="ml-auto flex items-center gap-2 ">
                        <button @click="isOpen = true"
                            class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center text-sm font-medium  border rounded-md px-3 h-8 gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-3.5 w-3.5 dark:text-white">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <span class="sr-only sm:not-sr-only dark:text-white">New Equipment</span>
                        </button>
                    </div>
                </div>


                <span class="text-sm text-gray-600 dark:text-gray-400" @if ($equipments->isEmpty()) style="display:
                none;" @endif>
                    Page {{ $equipments->currentPage() }} of {{ $equipments->lastPage() }}
                </span>


                <!-- Pagination / search bar controls -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Pagination -->
                    <div>
                        {{ $equipments->links('vendor.pagination.custom-pagination') }}
                    </div>


                    <!-- Search bar -->
                    <form method="GET" action="{{ route('administrator.equipments') }}" class="mb-4">
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
                                placeholder="Search equipment..."
                                class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <div class="relative w-full overflow-auto pr-20">
                    <table class="w-full caption-bottom text-sm ">
                        <thead class="text-black dark:text-white">
                            <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'no', 'sortDirection' => $sortBy === 'no' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'no' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        No
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'equipment', 'sortDirection' => $sortBy === 'equipment' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'equipment' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Equipment
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'type', 'sortDirection' => $sortBy === 'type' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'type' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Type
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'details', 'sortDirection' => $sortBy === 'details' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'details' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Details
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'extra_details', 'sortDirection' => $sortBy === 'extra_details' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'extra_details' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Extra Details
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium">
                                    <a href="{{ route('administrator.equipments', ['sortBy' => 'images', 'sortDirection' => $sortBy === 'images' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'images' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Images
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-center align-middle font-medium w-[120px]">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 dark:text-gray-400">
                            @if ($equipments->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <span class="text-gray-600 dark:text-gray-400">No equipments yet.</span>
                                    </td>
                                </tr>
                            @else
                                    @foreach ($equipments as $equipment)
                                        <tr
                                            class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">

                                            <td class="px-4 align-middle  ">
                                                {{ $equipment->id }}
                                            </td>
                                            <td class="px-4 align-middle  ">
                                                {{ $equipment->name }}
                                            </td>
                                            <td class="px-4 align-middle ">{{ $equipment->type }}
                                            </td>

                                            <td class="px-4 align-middle ">
                                                {{ \Illuminate\Support\Str::limit($equipment->details, 15) }}
                                            </td>

                                            <td class="px-4 align-middle ">
                                                {{ \Illuminate\Support\Str::limit($equipment->extra_details, 20) }}
                                            </td>

                                            <td class="px-4 flex flex-row gap-1 align-middle">
                                                @foreach (($equipment->images) as $image)
                                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $equipment->name }}"
                                                        class="max-w-10 max-h-10">
                                                @endforeach
                                            </td>
                                            <td class="px-4 align-middle">
                                                <div class="flex items-center justify-center gap-2">
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
                            @endif
                    </table>
                </div>




                <!-- Modal  -->
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

                                <p class="text-sm text-muted-foreground">Enter the details of the new equipment.</p>
                            </div>

                            <div class="p-6">


                                <form action="{{ route('equipment.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label
                                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                for="name">
                                                Equipment Name
                                            </label>
                                            <input
                                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                                type="text" name="name" id="name" required
                                                placeholder="Enter equipment name" />
                                        </div>
                                        <div class="space-y-2">
                                            <label
                                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                for="type">
                                                Equipment Type
                                            </label>
                                            <div class="relative">
                                                <select id="type" name="type" required
                                                    class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                                    <option value="" disabled>Select equipment Type</option>

                                                    <option value="fullbody">Full Body</option>
                                                    <option value="chest">Chest</option>
                                                    <option value="back">Back</option>
                                                    <option value="shoulders">Shoulders</option>
                                                    <option value="arms">Arms</option>
                                                    <option value="legs">Legs</option>
                                                    <option value="core">Core</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="details" name="details">
                                            Details
                                        </label>
                                        <textarea
                                            class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            name="details" id="details" required placeholder="Enter equipment details"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="extra-details" name="extra_details">
                                            Extra Details
                                        </label>
                                        <textarea
                                            class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            name="extra_details" id="extra_details"
                                            placeholder="Enter any additional details" rows="4"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="images" class="block text-sm font-medium">Upload Images</label>
                                        <input type="file" name="images[]" id="images" multiple
                                            class="mt-1 block w-full" accept="image/*">
                                        <small class="text-gray-500">You can upload up to 3 images.</small>
                                    </div>

                                    <button
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full"
                                        type="submit">
                                        Add Equipment
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</x-dash-layout>