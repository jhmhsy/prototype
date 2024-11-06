<div style="display:none;" style="display: none;" x-show="open"
    class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="open" @click.away="open = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[55%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2">

    <div class="mt-3 text-center">

        <div class="mt-2 px-7 py-3">
            <div class="flex gap-5 w-full">
                @if($member->qrcode)
                    <div class="qr-code-container relative group w-24 h-24">
                        @if($member->qrcode)
                            <img src="{{ Storage::url('qrcodes/' . $member->qrcode->qr_image_path) }}"
                                alt=" QR Code for {{ $member->name }}" class="w-24 h-24">
                            <!-- Download Icon Overlay -->
                            <div
                                class="absolute inset-0 flex items-center justify-center blur-0  bg-black bg-opacity-20 opacity-0 group-hover:opacity-100">

                                <button
                                    onclick="downloadQrCode('{{ Storage::url('qrcodes/' . $member->qrcode->qr_image_path) }}', '{{ $member->id_number }}')"
                                    class=" text-white font-bold">
                                    <!-- SVG for Download Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-download" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                    </svg>
                                </button>
                            </div>
                        @else
                            <p>No QR Code Available</p>
                        @endif
                    </div>
                @else
                    <div class="flex flex-col gap-2">
                        <div class="text-red-500">No QR code generated</div>

                        <form action="{{ route('members.generate-qrcode', $member) }}" method="POST" class=" inline">
                            @csrf
                            <button type="submit"
                                class="border border-1 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded mt-2">
                                Generate Again?
                            </button>
                        </form>
                    </div>
                @endif
                <div class="text-sm text-left text-gray-500 flex flex-col">
                    <h3 class="text-lg leading-6 font-medium text-black dark:text-white">{{ $member->name }}'s
                        Details</h3>
                    <p> <strong>ID Number: {{ $member->id_number }}</strong></p>
                    <p>Phone: <span class="text-black dark:text-white">{{ $member->phone ?? 'N/A' }}</span><br></p>
                    <p>Facebook: <span class="text-black dark:text-white">{{ $member->fb ?? 'N/A' }}</span><br></p>
                    <p>Email: <span class="text-black dark:text-white">{{ $member->email }}</span><br></p>
                    <p>User ID: <span class="text-black dark:text-white">{{ $member->user_identifier }}</span></p>

                </div>

            </div>

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-black dark:text-white">Services List</h2>
                <div class="space-x-2">
                    <select x-model="serviceFilter" class="border p-2 rounded dark:bg-peak_2 dark:text-white">
                        <option value="all">All</option>
                        <option value="service">Service</option>
                        <option value="locker">Lockers</option>
                        <option value="treadmill">Treadmill</option>
                    </select>
                    <select x-model="statusFilter" class="border p-2 rounded dark:bg-peak_2 dark:text-white">
                        <option value="current">Current</option>
                        <option value="expired">Expired</option>
                    </select>
                </div>
            </div>

            <div class="overflow-auto h-64">
                <table class="table-fixed w-full border-collapse">
                    <thead>
                        <tr class="text-gray-500">
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
                            <tr
                                x-show="(serviceFilter === 'all' || serviceFilter === 'service') && 
                                                                                                                                                                                                                                                                            ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $service->status }}')) || 
                                                                                                                                                                                                                                                                            (statusFilter === 'expired' && '{{ $service->status }}' === 'Expired'))">
                                <!-- ... service row content remains the same ... -->
                            </tr>
                        @endforeach
                        @foreach($member->services as $service)
                                                <tr class="dark:text-white"
                                                    x-show="(serviceFilter === 'all' || serviceFilter === 'service') && 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $service->status }}')) || 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                (statusFilter === 'expired' && '{{ $service->status }}' === 'Expired'))">
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

                        @endforeach
                        @foreach($member->lockers as $locker)
                                                <tr class="dark:text-white"
                                                    x-show="(serviceFilter === 'all' || serviceFilter === 'locker') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $locker->status }}')) || (statusFilter === 'expired' && '{{ $locker->status }}' === 'Expired'))">
                                                    <td class="border px-4 py-2">Locker #{{ $locker->locker_no }}</td>
                                                    <td class="border px-4 py-2">₱{{ $locker->amount }}</td>
                                                    <td class="border px-4 py-2">{{ $locker->month }}</td>
                                                    <td class="border px-4 py-2">
                                                        {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                                    </td>
                                                    <td class="border px-4 py-2">
                                                        {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                                    </td>
                                                    <td class="border px-4 py-2 font-bold {{ match ($locker->status) {
                                'Active' => 'text-green-600',
                                'Inactive' => 'text-blue-700',
                                'Due' => 'text-orange-500',
                                'Overdue' => 'text-red-700',
                                'Expired' => 'text-gray-500',
                                default => '',
                            } }}">
                                                        {{ $locker->status }}
                                                    </td>
                                                </tr>
                        @endforeach
                        @foreach($member->treadmills as $treadmill)
                                                <tr class="dark:text-white"
                                                    x-show="(serviceFilter === 'all' || serviceFilter === 'treadmill') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $treadmill->status }}')) || (statusFilter === 'expired' && '{{ $treadmill->status }}' === 'Expired'))">
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
                                                            'Active' => 'text-green-600', 'Inactive' => 'text-blue-700',
                                                            'Due'
                                                            =>
                                                            'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                            'text-gray-500',
                                                            default => '',
                                                    };@endphp
                                                    <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                        {{ $treadmill->status }}
                                                    </td>
                                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <button @click="extendOpen = true; open = false;"
            onclick="refreshDate({{ $member->id }}, 'services', 'service')"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Extend Subscription
        </button>
        <button @click="lockerOption = true; open = false" onclick="refreshDate({{ $member->id }}, 'lockers', 'locker')"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Extend Locker
        </button>
        <button @click="extendTreadmill = true; open = false"
            onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill')"
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