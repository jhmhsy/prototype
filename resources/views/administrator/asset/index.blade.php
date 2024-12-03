@can('asset-list')
    <x-dash-layout>
        <div class="container mx-auto p-4 bg-white dark:bg-peak-3">
            <h1 class="text-2xl font-bold dark:text-white">Filter Member Assets</h1>

            <!-- Filter Dropdown -->
            <form method="GET" action="{{ route('administrator.asset') }}" class="w-full  rounded-lg shadow-sm p-4">
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <!-- Type Filter -->
                    <div class="w-full sm:w-auto ">
                        <label for="filter" class="block text-sm font-medium text-gray-500 mb-1">Filter By Type</label>
                        <select name="filter" id="filter" onchange="this.form.submit()"
                            class="w-full rounded-md dark:bg-peak_2 text-gray-500 border-white/10 shadow-sm focus:ring-1/2 focus:border-blue-500 focus:text-black dark:focus:text-white">
                            <option value="services" {{ $filter === 'services' ? 'selected' : '' }}>Services</option>
                            <option value="lockers" {{ $filter === 'lockers' ? 'selected' : '' }}>Lockers</option>
                            <option value="treadmills" {{ $filter === 'treadmills' ? 'selected' : '' }}>Treadmills</option>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="w-full sm:w-auto">
                        <label for="status" class="block text-sm font-medium text-gray-500 mb-1">Filter By Status</label>
                        <select name="status" id="status" onchange="this.form.submit()"
                            class="w-full rounded-md dark:bg-peak_2 text-gray-500 border-white/10 shadow-sm focus:ring-1/2 focus:border-blue-500 focus:text-black dark:focus:text-white">
                            <option value="">All Statuses</option>
                            @foreach (['Active', 'Pre-paid', 'Due', 'Overdue', 'Ended', 'Impending'] as $availableStatus)
                                <option value="{{ $availableStatus }}" {{ $status === $availableStatus ? 'selected' : '' }}>
                                    {{ $availableStatus }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Export Button - Pushed to the right -->

                    <div class="ml-auto flex flex-col items-center h-full pt-6">
                        @if ($filter === 'services')
                            <label for="filter" class="block text-sm font-medium text-gray-500 mb-1">Export Services
                                Data</label>
                            <a href="{{ route('export.services') }}"
                                class="inline-flex items-center px-4 py-2 border-2 border-white/10 hover:border-gray-700 text-black dark:text-white rounded-md transition-colors duration-300">
                                <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                    </path>
                                </svg>
                                <span class="ml-2">Export</span>
                            </a>
                        @elseif ($filter === 'lockers')
                            <label for="filter" class="block text-sm font-medium text-gray-500 mb-1">Export Lockers
                                Data</label>
                            <a href="{{ route('export.lockers') }}"
                                class="inline-flex items-center px-4 py-2 border-2 border-gray-300 hover:border-gray-700 text-black dark:text-white rounded-md transition-colors duration-300">
                                <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                    </path>
                                </svg>
                                <span class="ml-2">Export</span>
                            </a>
                        @elseif ($filter === 'treadmills')
                            <label for="filter" class="block text-sm font-medium text-gray-500 mb-1">Export Treadmills
                                Data</label>
                            <a href="{{ route('export.treadmills') }}"
                                class="inline-flex items-center px-4 py-2 border-2 border-gray-300 hover:border-gray-700 text-black dark:text-white rounded-md transition-colors duration-300">
                                <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                    </path>
                                </svg>
                                <span class="ml-2">Export</span>
                            </a>
                        @endif
                    </div>

                </div>
            </form>

            <!-- Display Filtered Data -->
            <table class="table-auto w-full ">
                <thead>
                    <tr class="text-black dark:text-white">
                        <th class="px-4 py-2 w-1/6 text-left">Member Name</th>
                        @if ($filter === 'services')
                            <th class="px-4 py-2 w-1/6 text-left">Service Type</th>
                        @elseif ($filter === 'lockers')
                            <th class="px-4 py-2 w-1/6 text-left">Locker Number</th>
                        @elseif ($filter === 'treadmills')
                            <th class="px-4 py-2 w-1/6 text-left">Service Name</th>
                        @endif
                        <th class="px-4 py-2 w-1/6 text-left">Start Date</th>
                        <th class="px-4 py-2 w-1/6 text-left">Due Date</th>
                        <th class="px-4 py-2 w-1/6 text-right">Amount</th>
                        <th class="px-4 py-2 w-1/6 text-left">Month</th>
                        <th class="px-4 py-2 w-1/6 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-2 w-1/6 text-left">{{ $item->member->name }}</td>

                            @if ($filter === 'services')
                                <td class="px-4 py-2 w-1/6 text-left">{{ $item->service_type }}</td>
                            @elseif ($filter === 'lockers')
                                <td class="px-4 py-2 w-1/6 text-left">Locker #{{ $item->locker_no }}</td>
                            @elseif ($filter === 'treadmills')
                                <td class="px-4 py-2 w-1/6 text-left">Treadmill</td>
                            @endif

                            <td class="px-4 py-2 w-1/6 text-left">{{ $item->start_date }}</td>
                            <td class="px-4 py-2 w-1/6 text-left">{{ $item->due_date }}</td>
                            <td class="px-4 py-2 w-1/6 text-right">{{ $item->amount }}</td>
                            <td class="px-4 py-2 w-1/6 text-left">{{ $item->month }}</td>
                            <td class="px-4 py-2 w-1/6 text-left">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-2 text-center text-gray-400">No data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-dash-layout>
@endcan