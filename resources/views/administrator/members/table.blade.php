<table class="table-fixed md:w-full border-collapse text-sm">
    <thead>
        <tr class="text-gray-500">
            <th class="px-4 py-2">Service</th>
            <th class="px-4 py-2">Amount</th>
            <th class="px-4 py-2">Months</th>
            <th class="px-4 py-2">Start Date</th>
            <th class="px-4 py-2">Due Date</th>
            <th class="px-4 py-2">Status</th>

            @canany(['subscription-end', 'locker-end', 'treadmill-end'])
                <th class="px-4 py-2">Action</th>
            @endcanany
        </tr>
    </thead>
    <tbody>
        @foreach($member->services as $service)
                <tr class="dark:text-white"
                    x-show="(serviceFilter === 'all' || serviceFilter === 'service') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $service->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $service->status }}')))">

                    <td class="border-b dark:border-gray-500 border-r px-4 py-2">
                        {{ $service->service_type }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        ${{ $service->amount }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ $service->month }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                    </td>
                    @php
                        $statusClass = match ($service->status) {
                            'Active' => 'text-green-600', 'Inactive' => 'text-blue-700', 'Due'
                            => 'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                            'text-gray-500', default => '',
                        };
                    @endphp
                    <td class="border-b dark:border-gray-500 px-4 py-2 font-bold {{ $statusClass }}">
                        {{ $service->status }}
                    </td>
                    @can('subscription-end')
                        <td class="border-b dark:border-gray-500 px-4 py-2">
                            @if($service->status !== 'Ended')
                                <form action="{{ route('services.end', $service->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 bg-gray-800 text-white rounded">End</button>
                                </form>
                            @endif
                        </td>
                    @endcan
                </tr>
        @endforeach
        @foreach($member->lockers as $locker)
                <tr class="dark:text-white"
                    x-show="(serviceFilter === 'all' || serviceFilter === 'locker') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $locker->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $locker->status }}')))">
                    <td class="border-b dark:border-gray-500 border-r px-4 py-2">Locker
                        #{{ $locker->locker_no }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        ₱{{ $locker->amount }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">{{ $locker->month }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2 font-bold {{ match ($locker->status) {
                'Active' => 'text-green-600',
                'Inactive' => 'text-blue-700',
                'Due' => 'text-orange-500',
                'Overdue' => 'text-red-700',
                'Expired' => 'text-gray-500',
                default => '',
            } }}">
                        {{ $locker->status }}
                    </td>

                    @can('locker-end')
                        <td class="border-b dark:border-gray-500 px-4 py-2">
                            @if($locker->status !== 'Ended')
                                <form action="{{ route('locker.end', $locker->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 bg-gray-800 text-white rounded">End</button>
                                </form>
                            @endif
                        </td>
                    @endcan
                </tr>
        @endforeach
        @foreach($member->treadmills as $treadmill)
                <tr class="dark:text-white"
                    x-show="(serviceFilter === 'all' || serviceFilter === 'treadmill') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $treadmill->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $treadmill->status }}')))">
                    <td class="border-b dark:border-gray-500 border-r px-4 py-2">Treadmill
                    </td>

                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        ₱{{ $treadmill->amount }}</td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ $treadmill->month }}
                    </td>
                    <td class="border-b dark:border-gray-500 px-4 py-2">
                        {{ \Carbon\Carbon::parse($treadmill->start_date)->format('M j, Y') }}
                    </td>

                    <td class="border-b dark:border-gray-500 px-4 py-2">
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
                        };
                    @endphp
                    <td class="border-b dark:border-gray-500 px-4 py-2 font-bold {{ $statusClass }}">
                        {{ $treadmill->status }}
                    </td>


                    @can('treadmill-end')
                        <td class="border-b dark:border-gray-500 px-4 py-2">
                            @if($treadmill->status !== 'Ended')
                                <form action="{{ route('treadmill.end', $treadmill->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 bg-gray-800 text-white rounded">End</button>
                                </form>
                            @endif
                        </td>

                    @endcan
                </tr>
        @endforeach
    </tbody>
</table>