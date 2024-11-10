@canany(['checkin-log-list'])
    <x-dash-layout>
        <div class="container">
            <h1 class="text-2xl font-bold mb-4 dark:text-white">Check-in History</h1>

            <form action="{{ route('checkin.history') }}" method="GET">
                <div class="relative">
                    <button type="submit"
                        class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span> <!-- For accessibility -->
                    </button>
                    <input type="text" name="search" maxlength="255" placeholder="Search by Name or ID Number"
                        value="{{ request('search') }}"
                        class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                </div>


            </form>




            <div class="mb-3 flex items-center pt-4">
                <span class="text-sm font-medium text-gray-500">Sort by date: </span>
                <a href="{{ route('checkin.history', ['sort' => 'asc', 'search' => request('search')]) }}"
                    class="ml-2 inline-flex items-center px-3 py-2 border dark:border-none border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white dark:bg-peak_2 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $sort == 'asc' ? 'bg-indigo-600 text-white' : '' }}">


                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v13m0-13 4 4m-4-4-4 4" />
                    </svg>


                </a>
                <a href="{{ route('checkin.history', ['sort' => 'desc', 'search' => request('search')]) }}"
                    class="ml-2 inline-flex items-center px-3 py-2 border dark:border-none border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white dark:bg-peak_2 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $sort == 'desc' ? 'bg-indigo-600 text-white' : '' }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19V5m0 14-4-4m4 4 4-4" />
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-peak_2">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID Number
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Time
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($checkins as $checkin)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $checkin->member->id_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $checkin->member->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($checkin->checkin_date)->format('M j') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($checkin->checkin_time)->format('g:ia') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $checkin->type }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $checkins->appends(['search' => request('search'), 'sort' => $sort])->links() }}
        </div>
    </x-dash-layout>
@endcanany