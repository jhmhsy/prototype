@can('productsales-list')
    <x-dash-layout title="products">
        <x-custom.loader2 />
        <section x-data="{ createmodal: false ,viewmodal:false, Editmodal:false}">
            <div class="rounded-lg  shadow-sm p-6  text-shade_9  
                                             bg-white dark:bg-peak_1">
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-bold dark:text-white">Manage your products</h1>
                        <div class="ml-auto flex items-center gap-2 ">
                            <button @click="createmodal = true"
                                class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center text-sm font-medium  border rounded-md px-3 h-8 gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-3.5 w-3.5 dark:text-white">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                                <span class="sr-only sm:not-sr-only dark:text-white">New product</span>
                            </button>
                        </div>
                    </div>

                </div>

                <div>
                    <div class="relative w-full overflow-auto pr-20">
                        <table class="w-full caption-bottom text-sm ">
                            <thead class="text-black dark:text-white">
                                <tr
                                    class="dark:bg-peak_2 transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle font-medium">
                                        No
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium">
                                        Name
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium">
                                        Details
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium">
                                        Price
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium">
                                        Quantity
                                    </th>
                                    <th class="h-12 px-4 text-center align-middle font-medium w-[120px]">
                                        Actions
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="text-gray-600 dark:text-gray-400">

                                @foreach ($products as $product)
                                    <tr
                                        class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">

                                        <td class="px-4 align-middle  ">
                                            {{ $product->id }}
                                        </td>
                                        <td class="px-4 align-middle  ">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $product->details }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $product->price }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $product->quantity }}
                                        </td>
                                        <td class="px-4 align-middle">
                                            <div class="action-dropdown flex items-center justify-center">
                                                <button
                                                    class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                            d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div
                                                    class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                    <div class="py-1">
                                                        <button @click="Editmodal = {{$product->id}}"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 16 16">
                                                                <path
                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                            </svg>
                                                            Edit
                                                        </button>

                                                        <form action="{{ route('productsales.destroy', $product->id) }}"
                                                            method="POST" style="display:inline" class="hidden">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" class="w-4 h-4 mr-3">
                                                                    <path d="M3 6h18"></path>
                                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Action Modals -->
                                    @include ('administrator.productsales.edit')
                                @endforeach
                            </tbody>

                    </div>




                    <!-- Add new Modal  -->
                    @include ('administrator.productsales.create')
                </div>
        </section>
    </x-dash-layout>
@endcan