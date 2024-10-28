<x-dash-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Check-in History</h1>

        <form action="{{ route('checkin.history') }}" method="GET" class="mb-4 flex items-center">
            <input type="text" name="search"
                class="form-control border-2 border-gray-300 bg-white h-10 px-5 pr-16 text-sm focus:outline-none"
                placeholder="Search by Name or ID Number" value="{{ request('search') }}">
            <button type="submit"
                class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Search
            </button>
        </form>

        <div class="mb-3 flex items-center">
            <span class="text-sm font-medium text-gray-500">Sort by date: </span>
            <a href="{{ route('checkin.history', ['sort' => 'asc', 'search' => request('search')]) }}"
                class="ml-2 inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $sort == 'asc' ? 'bg-indigo-600 text-white' : '' }}">
                Ascending
            </a>
            <a href="{{ route('checkin.history', ['sort' => 'desc', 'search' => request('search')]) }}"
                class="ml-2 inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $sort == 'desc' ? 'bg-indigo-600 text-white' : '' }}">
                Descending
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
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