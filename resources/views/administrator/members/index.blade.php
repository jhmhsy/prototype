<x-dash-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Member List</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($members as $member)
                <div class="bg-white p-4 rounded shadow"
                    x-data="{ open: false, extendOpen: false, rentLockerOpen: false }">
                    <h2 class="text-xl font-semibold">{{ $member->name }}</h2>
                    <p>{{ $member->email }}</p>
                    <button @click="open = true"
                        class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        View Details
                    </button>


                    <div style="display: none;" x-show="open"
                        class="fixed select-none inset-0 bg-black opacity-50 z-40">
                    </div>
                    <!-- Member Details Modal -->
                    <div x-show="open" @click.away="open = false"
                        class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $member->name }}'s Details
                            </h3>
                            <div class="mt-2 px-7 py-3">
                                <p class="text-sm text-gray-500">
                                    <strong>ID Number: {{ $member->id_number }}</strong><br>
                                    Email: {{ $member->email }}<br>
                                    Phone: {{ $member->phone }}<br>
                                    Facebook: {{ $member->fb ?? 'N/A' }}<br>
                                    User ID: {{ $member->user_identifier }}
                                </p>
                                <h4 class="font-semibold mt-4">Services</h4>
                                <table class="min-w-full mt-2">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Start Date</th>
                                            <th class="px-4 py-2">Due Date</th>
                                            <th class="px-4 py-2">Amount</th>
                                            <th class="px-4 py-2">Service</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($member->services as $service)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                                            </td>
                                            <td class="border px-4 py-2">${{ $service->amount }}</td>
                                            <td class="border px-4 py-2">{{ $service->service_type }}</td>
                                            <td class="border px-4 py-2">{{ $service->status }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach($member->lockers as $locker)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                            </td>
                                            <td class="border px-4 py-2">${{ $locker->amount }}</td>
                                            <td class="border px-4 py-2">Locker #{{ $locker->locker_no }}</td>
                                            <td class="border px-4 py-2">{{ $locker->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                            <button @click="extendOpen = true; open = false"
                                class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Extend Subscription
                            </button>
                            <button @click="rentLockerOpen = true; open = false"
                                class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                Rent More Locker
                            </button>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button @click="open = false"
                                class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Close
                            </button>
                        </div>

                    </div>

                    <div style="display: none;" x-show="extendOpen"
                        class="fixed select-none inset-0 bg-black opacity-50 z-40">
                    </div>
                    <!-- Member Details Modal -->
                    <div x-show="extendOpen" @click.away="extendOpen = false"
                        class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Extend Subscription</h3>
                        <form action="{{ route('members.extend', $member->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="service_type" class="block text-sm font-medium text-gray-700">Service
                                    Type</label>
                                <select id="service_type" name="service_type"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start
                                    Date</label>
                                <input type="date" id="start_date" name="start_date" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                <input type="number" id="amount" name="amount" step="0.01" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Extend
                            </button>
                        </form>
                        <button @click="extendOpen = false"
                            class="mt-4 w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                            Cancel
                        </button>

                    </div>


                    <!-- Rent More Locker Modal -->
                    <div style="display: none;" x-show="rentLockerOpen"
                        class="fixed select-none inset-0 bg-black opacity-50 z-40">
                    </div>
                    <!-- Member Details Modal -->
                    <div x-show="rentLockerOpen" @click.away="rentLockerOpen = false"
                        class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Rent More Locker</h3>
                        <form action="{{ route('members.rent-locker', $member->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="locker_no" class="block text-sm font-medium text-gray-700">Locker
                                    Number</label>
                                <select id="locker_no" name="locker_no" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Select a locker</option>
                                    @for ($i = 1; $i <= 27; $i++) <option value="{{ $i }}" {{ in_array(
                                                        $i,
                                                        $occupiedLockers
                                                    ) ? 'disabled' : '' }}>
                                        Locker No. {{ $i }}
                                        {{ in_array($i, $occupiedLockers) ? '(Unavailable)' : '' }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start
                                    Date</label>
                                <input type="date" id="start_date" name="start_date" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                <input type="number" id="amount" name="amount" step="0.01" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Rent Locker
                            </button>
                        </form>
                        <button @click="rentLockerOpen = false"
                            class="mt-4 w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                            Cancel
                        </button>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-dash-layout>