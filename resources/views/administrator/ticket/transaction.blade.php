<x-dash-layout>
    <section>
        <div class=" rounded-lg border shadow-sm p-6 text-shade_9 border-shade_6/50 dark:border-white/5">

            <div class="flex flex-row">
                <h1 class="text-lg font-bold mb-6 dark:text-white">Transaction History</h1>

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
                                    Item
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Quantity
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Currency
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground ">
                                    Ammount
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
                            @foreach ($transactions as $transaction)
                            <tr
                                class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                <td class="px-4 align-middle  font-medium">
                                    {{ $transaction->name }}</td>
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
                   section                  </svg>
                                        </x-custom.anchor-link>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>



            </div>
        </div>
    </section>
</x-dash-layout>