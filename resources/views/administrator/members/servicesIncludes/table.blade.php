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


                        @if($service->service_type == "1monthstudent")
                            1month-s
                        @else
                            {{ $service->service_type }}
                            @if($member->membership_type == 'Manual')
                                &nbsp;Months
                            @endif
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
                                    <div x-data="{ isOpen: false }" class="relative">
                                        <button @click="isOpen = !isOpen" class="z-10">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                            </svg>
                                        </button>

                                        <div style="display:hidden;" x-show="isOpen" @click.outside="isOpen = false"
                                            class="absolute   z-50 top-full right-0 w-48 bg-white dark:bg-peak_3 rounded-md shadow-lg">
                                            <div class="py-1">
                                                <button @click="serviceendWarning = true"
                                                    class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_2">
                                                    <svg width="11px" height="11px" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M4.75 16L0 11.25V4.75L4.75 0H11.25L16 4.75V11.25L11.25 16H4.75Z"
                                                                fill="#c00707"></path>

                                                        </g>
                                                    </svg>
                                                    &nbsp

                                                    Stop
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    </div>
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


                                    <div x-data="{ isOpen: false }" class="relative">
                                        <button @click="isOpen = !isOpen" class="z-10">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                            </svg>
                                        </button>

                                        <div style="display:hidden;" x-show="isOpen" @click.outside="isOpen = false"
                                            class="absolute   z-50 top-full right-0 w-48 bg-white dark:bg-peak_3 rounded-md shadow-lg">
                                            <div class="py-1">
                                                <button @click="lockerendWarning = true"
                                                    class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_2">
                                                    <svg width="11px" height="11px" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M4.75 16L0 11.25V4.75L4.75 0H11.25L16 4.75V11.25L11.25 16H4.75Z"
                                                                fill="#c00707"></path>
                                                        </g>
                                                    </svg>
                                                    &nbsp

                                                    Stop
                                                </button>

                                            </div>
                                        </div>
                                    </div>


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

                                    <div x-data="{ isOpen: false }" class="relative">
                                        <button @click="isOpen = !isOpen" class="z-10">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                            </svg>
                                        </button>

                                        <div style="display:hidden;" x-show="isOpen" @click.outside="isOpen = false"
                                            class="absolute   z-50 top-full right-0 w-48 bg-white dark:bg-peak_3 rounded-md shadow-lg">
                                            <div class="py-1">
                                                <button @click="treadmillendWaring = true"
                                                    class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_2">
                                                    <svg width="11px" height="11px" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M4.75 16L0 11.25V4.75L4.75 0H11.25L16 4.75V11.25L11.25 16H4.75Z"
                                                                fill="#c00707"></path>

                                                        </g>
                                                    </svg>
                                                    &nbsp

                                                    Stop
                                                </button>

                                            </div>
                                        </div>
                                    </div>
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