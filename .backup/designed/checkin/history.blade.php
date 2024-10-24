<x-dash-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Check-in History</h1>

        <form action="{{ route('checkin.history') }}" method="GET" class="mb-6">
            <div class="flex">
                <input type="text" name="search" class="form-input flex-grow rounded-l-md"
                    placeholder="Search by Name or ID Number" value="{{ request('search') }}">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-md transition duration-300">Search</button>
            </div>
        </form>

        <div class="mb-6 flex items-center">
            <span class="mr-3 text-gray-700">Sort by date:</span>
            <a href="{{ route('checkin.history', ['sort' => 'asc', 'search' => request('search')]) }}"
                class="mr-2 px-3 py-1 rounded {{ $sort == 'asc' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-300">Ascending</a>
            <a href="{{ route('checkin.history', ['sort' => 'desc', 'search' => request('search')]) }}"
                class="px-3 py-1 rounded {{ $sort == 'desc' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-300">Descending</a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CHECKED-IN Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CHECKED-IN Time
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($checkins as $checkin)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $checkin->member->id_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $checkin->member->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($checkin->checkin_date)->format('M j') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($checkin->checkin_time)->format('g:ia') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                                            {{ $checkin->type === 'Check-in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $checkin->type }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $checkins->appends(['search' => request('search'), 'sort' => $sort])->links() }}
        </div>
    </div>
</x-dash-layout>