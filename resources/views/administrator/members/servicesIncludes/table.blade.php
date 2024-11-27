<table class="table-fixed md:w-full border-collapse text-xs lg:text-sm ">
    <thead>
        <tr class="text-gray-500 text-left">
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
            x-show="(serviceFilter === 'all' || serviceFilter === 'service') && ((statusFilter === 'current' && ['Active', 'Pre-paid', 'Impending', 'Due', 'Overdue'].includes('{{ $service->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $service->status }}')))">

            <td class="whitespace-nowrap border-b dark:border-gray-500 border-r px-4 py-2">
                {{ $service->service_type }}

                @if($member->membership_type == 'Manual')
                &nbsp;Months
                @endif
            </td>


            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                ₱{{ $service->amount }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ $service->month }}
            </td>
            <td class=" whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
            </td>
            @php
            $statusClass = match ($service->status) {
            'Active' => 'text-green-600',
            'Pre-paid' => 'text-blue-700',
            'Impending' => 'text-yellow-500',
            'Due' => 'text-orange-500',
            'Overdue' => 'text-red-700',
            'Expired' => 'text-gray-500', default => '',
            };
            @endphp
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2 font-bold {{ $statusClass }}">

                {{ $service->status }}


            </td>
            @can('subscription-end')
            <td class="border-b dark:border-gray-500 px-4 py-2">
                @if($service->status !== 'Ended')
                @if($service->action_status !== 'Pending')
                <button @click="serviceendWarning = true">
                    <svg fill="#ff0000" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"
                        stroke="#ff0000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: none;
                                }
                                </style>
                            </defs>
                            <path
                                d="M20.5857,29H11.4143A1.9865,1.9865,0,0,1,10,28.4141L3.5859,22A1.9865,1.9865,0,0,1,3,20.5857V11.4143A1.9865,1.9865,0,0,1,3.5859,10L10,3.5859A1.9865,1.9865,0,0,1,11.4143,3h9.1714A1.9865,1.9865,0,0,1,22,3.5859L28.4141,10A1.9865,1.9865,0,0,1,29,11.4143v9.1714A1.9865,1.9865,0,0,1,28.4141,22L22,28.4141A1.9865,1.9865,0,0,1,20.5857,29Z">
                            </path>
                            <rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1"
                                width="32" height="32"></rect>
                        </g>
                    </svg>
                </button>
                @include('administrator.members.servicesIncludes.service-end-warning', ['service' => $service])
                @else
                <span class="text-amber-500 whitespace-nowrap"> Pending Approval</span>
                @endif
                @endif
            </td>
            @endcan
        </tr>
        @endforeach
        @foreach($member->lockers as $locker)
        <tr class="dark:text-white"
            x-show="(serviceFilter === 'all' || serviceFilter === 'locker') && ((statusFilter === 'current' && ['Active', 'Pre-paid','Impending', 'Due', 'Overdue'].includes('{{ $locker->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $locker->status }}')))">
            <td class="whitespace-nowrap border-b dark:border-gray-500 border-r px-4 py-2">Locker
                #{{ $locker->locker_no }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                ₱{{ $locker->amount }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">{{ $locker->month }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2 font-bold {{ match ($locker->status) {
                'Active' => 'text-green-600',
                'Pre-paid' => 'text-blue-700',
                'Impending' => 'text-yellow-500',
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
                @if($locker->action_status !== 'Pending')
                <button @click="lockerendWarning = true">
                    <svg fill="#ff0000" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"
                        stroke="#ff0000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: none;
                                }
                                </style>
                            </defs>
                            <path
                                d="M20.5857,29H11.4143A1.9865,1.9865,0,0,1,10,28.4141L3.5859,22A1.9865,1.9865,0,0,1,3,20.5857V11.4143A1.9865,1.9865,0,0,1,3.5859,10L10,3.5859A1.9865,1.9865,0,0,1,11.4143,3h9.1714A1.9865,1.9865,0,0,1,22,3.5859L28.4141,10A1.9865,1.9865,0,0,1,29,11.4143v9.1714A1.9865,1.9865,0,0,1,28.4141,22L22,28.4141A1.9865,1.9865,0,0,1,20.5857,29Z">
                            </path>
                            <rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1"
                                width="32" height="32"></rect>
                        </g>
                    </svg>
                </button>
                @include ('administrator.members.servicesIncludes.locker-end-warning')
                @else
                <span class="text-amber-500 whitespace-nowrap"> Pending Approval</span>
                @endif
                @endif
            </td>
            @endcan
        </tr>
        @endforeach
        @foreach($member->treadmills as $treadmill)
        <tr class="dark:text-white"
            x-show="(serviceFilter === 'all' || serviceFilter === 'treadmill') && ((statusFilter === 'current' && ['Active', 'Pre-paid', 'Impending', 'Due', 'Overdue'].includes('{{ $treadmill->status }}')) || (statusFilter === 'expired' && ['Expired', 'Ended'].includes('{{ $treadmill->status }}')))">
            <td class="whitespace-nowrap border-b dark:border-gray-500 border-r px-4 py-2">Treadmill
            </td>

            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                ₱{{ $treadmill->amount }}</td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ $treadmill->month }}
            </td>
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($treadmill->start_date)->format('M j, Y') }}
            </td>

            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2">
                {{ \Carbon\Carbon::parse($treadmill->due_date)->format('M j, Y') }}
            </td>
            @php
            $statusClass = match ($treadmill->status) {
            'Active' => 'text-green-600',
            'Pre-paid' => 'text-blue-700',
            'Impending' => 'text-yellow-500',
            'Due' => 'text-orange-500',
            'Overdue' => 'text-red-700',
            'Expired' => 'text-gray-500',
            default => '',
            };
            @endphp
            <td class="whitespace-nowrap border-b dark:border-gray-500 px-4 py-2 font-bold {{ $statusClass }}">
                {{ $treadmill->status }}
            </td>


            @can('treadmill-end')
            <td class="border-b dark:border-gray-500 px-4 py-2">
                @if($treadmill->status !== 'Ended')
                @if($treadmill->action_status !== 'Pending')
                <button @click="treadmillendWaring = true">
                    <svg fill="#ff0000" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"
                        stroke="#ff0000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: none;
                                }
                                </style>
                            </defs>
                            <path
                                d="M20.5857,29H11.4143A1.9865,1.9865,0,0,1,10,28.4141L3.5859,22A1.9865,1.9865,0,0,1,3,20.5857V11.4143A1.9865,1.9865,0,0,1,3.5859,10L10,3.5859A1.9865,1.9865,0,0,1,11.4143,3h9.1714A1.9865,1.9865,0,0,1,22,3.5859L28.4141,10A1.9865,1.9865,0,0,1,29,11.4143v9.1714A1.9865,1.9865,0,0,1,28.4141,22L22,28.4141A1.9865,1.9865,0,0,1,20.5857,29Z">
                            </path>
                            <rect id="_Transparent_Rectangle_" data-name=" Transparent Rectangle " class="cls-1"
                                width="32" height="32"></rect>
                        </g>
                    </svg>
                </button>
                @include ('administrator.members.servicesIncludes.treadmill-end-warning')
                @else
                <span class="text-amber-500 whitespace-nowrap"> Pending Approval</span>
                @endif
                @endif
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>