<x-dash-layout>
    <section>
        <div class=" rounded-lg border shadow-sm p-6 text-shade_9 border-shade_6/50 dark:border-white/5">

            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold dark:text-white">Payment Transactions</h1>

                </div>


                <span class="text-sm text-gray-600 dark:text-gray-400" @if ($transactions->isEmpty()) style="display:
                none;" @endif>
                    Page {{ $transactions->currentPage() }} of {{ $transactions->lastPage() }}
                </span>


                <!-- Pagination / search bar controls -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Pagination -->
                    <div>
                        {{ $transactions->links('vendor.pagination.custom-pagination') }}
                    </div>


                    <!-- Search bar -->
                    <form method="GET" action="{{ route('ticket.transaction') }}" class="mb-4">
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
                                placeholder="Search transaction..."
                                class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                        </div>
                    </form>


                </div>
            </div>

            <div>
                <div class="relative w-full overflow-auto pr-20">
                    <table class="w-full caption-bottom text-sm ">
                        <thead class="text-black dark:text-white">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'name', 'sortDirection' => $sortBy === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'name' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Name
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'email', 'sortDirection' => $sortBy === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'email' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Email
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'item', 'sortDirection' => $sortBy === 'item' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'item' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Item
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'quantity', 'sortDirection' => $sortBy === 'quantity' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'quantity' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Quantity
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'currency', 'sortDirection' => $sortBy === 'currency' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'currency' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Currency
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'amount', 'sortDirection' => $sortBy === 'amount' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'amount' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Amount
                                    </a>
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                                    <a href="{{ route('ticket.transaction', ['sortBy' => 'status', 'sortDirection' => $sortBy === 'status' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="{{ $sortBy === 'status' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                        Status
                                    </a>
                                </th>
                                <th
                                    class="h-12 px-4 text-left align-middle font-medium text-muted-foreground w-[120px]">
                                    Actions
                                </th>
                            </tr>
                        </thead>


                        <tbody class="text-gray-600 dark:text-gray-400">
                            @if ($transactions->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <span class="text-gray-600 dark:text-gray-400">No Ticket Transactions yet.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($transactions as $transaction)
                                    <tr
                                        class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                        <td class="px-4 align-middle  font-medium">
                                            {{ $transaction->name }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $transaction->email }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $transaction->item_name }}
                                        </td>
                                        <td class="px-4 align-middle ">{{ $transaction->quantity }}
                                        </td>
                                        <td class="px-4 align-middle text-blue-500">{{ $transaction->currency }}
                                        </td>
                                        <td class="px-4 align-middle"> ₱ {{ number_format($transaction->amount / 100, 2) }}
                                        </td>


                                        <td
                                            class="px-4 align-middle  {{ $transaction->status === 'claimed' ? 'text-green-500' : 'text-red-500' }}">
                                            {{ $transaction->status }}
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
                                                        section
                                                    </svg>
                                                </x-custom.anchor-link>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>



            </div>
        </div>
    </section>
</x-dash-layout>