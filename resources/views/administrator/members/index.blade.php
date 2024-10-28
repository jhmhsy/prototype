<x-dash-layout>
    <div class="bg-gray-100" x-data="{ serviceFilter: 'all', statusFilter: 'current' }">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Member List</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if($members->isEmpty())
                    <p>No members yet.</p>
                @else
                        @foreach($members as $member)
                                <div class="bg-white p-4 rounded shadow"
                                    x-data="{ open: false, extendOpen: false, rentLockerOpen: false, extendTreadmill: false }">
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
                                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[55%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

                                        <div class="mt-3 text-center">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $member->name }}'s Details</h3>
                                            <div class="mt-2 px-7 py-3">
                                                <p class="text-sm text-gray-500">
                                                    <strong>ID Number: {{ $member->id_number }}</strong><br>
                                                    Email: {{ $member->email }}<br>
                                                    Phone: {{ $member->phone }}<br>
                                                    Facebook: {{ $member->fb ?? 'N/A' }}<br>
                                                    User ID: {{ $member->user_identifier }}
                                                </p>
                                                <div class="flex justify-between items-center mb-4">
                                                    <h2 class="text-2xl font-bold">Services List</h2>
                                                    <div class="space-x-2">
                                                        <select x-model="serviceFilter" class="border p-2 rounded">
                                                            <option value="all">All</option>
                                                            <option value="service">Service</option>
                                                            <option value="locker">Lockers</option>
                                                            <option value="treadmill">Treadmill</option>
                                                        </select>
                                                        <select x-model="statusFilter" class="border p-2 rounded">
                                                            <option value="current">Current</option>
                                                            <option value="expired">Expired</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="overflow-auto h-64">
                                                    <table class="table-fixed w-full border-collapse">
                                                        <thead>
                                                            <tr>
                                                                <th class="px-4 py-2">Service</th>
                                                                <th class="px-4 py-2">Amount</th>
                                                                <th class="px-4 py-2">Months</th>
                                                                <th class="px-4 py-2">Start Date</th>
                                                                <th class="px-4 py-2">Due Date</th>
                                                                <th class="px-4 py-2">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($member->services as $service)
                                                                                                <template
                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'service') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $service->status }}')) || (statusFilter === 'expired' && '{{ $service->status }}' === 'Expired'))">
                                                                                                    <tr>
                                                                                                        <td class="border px-4 py-2">{{ $service->service_type }}</td>
                                                                                                        <td class="border px-4 py-2">${{ $service->amount }}</td>
                                                                                                        <td class="border px-4 py-2">{{ $service->month }}</td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        @php
                                                                                                            $statusClass = match ($service->status) {
                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700', 'Due'
                                                                                                                =>
                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                'text-gray-500',
                                                                                                                default => '',
                                                                                                        };@endphp
                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                            {{ $service->status }}
                                                                                                        </td>

                                                                                                    </tr>
                                                                                                </template>
                                                            @endforeach
                                                            @foreach($member->lockers as $locker)
                                                                                                <template
                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'locker') && 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $locker->status }}')) || 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            (statusFilter === 'expired' && '{{ $locker->status }}' === 'Expired'))">
                                                                                                    <tr>
                                                                                                        <td class="border px-4 py-2">Locker #{{ $locker->locker_no }}</td>
                                                                                                        <td class="border px-4 py-2">₱{{ $locker->amount }}</td>
                                                                                                        <td class="border px-4 py-2">{{ $locker->month }}</td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        @php
                                                                                                            $statusClass = match ($locker->status) {
                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700', 'Due'
                                                                                                                =>
                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                'text-gray-500',
                                                                                                                default => '',
                                                                                                        };@endphp
                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                            {{ $locker->status }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </template>
                                                            @endforeach
                                                            @foreach($member->treadmills as $treadmill)
                                                                                                <template
                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'treadmill') && 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $treadmill->status }}')) || 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            (statusFilter === 'expired' && '{{ $treadmill->status }}' === 'Expired'))">
                                                                                                    <tr>
                                                                                                        <td class="border px-4 py-2">Treadmill</td>
                                                                                                        <td class="border px-4 py-2">₱{{ $treadmill->amount }}</td>
                                                                                                        <td class="border px-4 py-2">{{ $treadmill->month }}</td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($treadmill->start_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        <td class="border px-4 py-2">
                                                                                                            {{ \Carbon\Carbon::parse($treadmill->due_date)->format('M j, Y') }}
                                                                                                        </td>
                                                                                                        @php
                                                                                                            $statusClass = match ($treadmill->status) {
                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700', 'Due'
                                                                                                                =>
                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                'text-gray-500',
                                                                                                                default => '',
                                                                                                        };@endphp
                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                            {{ $treadmill->status }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </template>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <button @click="extendOpen = true; open = false; $dispatch('refresh-date')"
                                                class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                                Extend Subscription
                                            </button>
                                            <button @click="rentLockerOpen = true; open = false"
                                                class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                                Extend Locker
                                            </button>
                                            <button @click="extendTreadmill = true; open = false"
                                                class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                                Extend Treadmill
                                            </button>
                                        </div>
                                        <div class="items-center px-4 py-3">
                                            <button @click="open = false"
                                                class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                Close
                                            </button>
                                        </div>
                                    </div>

                                    @include ('administrator.members.extend-service')
                                    @include ('administrator.members.extend-locker')
                                    @include ('administrator.members.extend-treadmill')
                                </div>
                        @endforeach
                @endif
            </div>
        </div>
    </div>
</x-dash-layout>