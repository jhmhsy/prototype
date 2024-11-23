@canany([
'member-list',
'member-edit',
'member-membership-renew',
'subscription-extend',
'subscription-end',
'locker-extend',
'locker-end',
'treadmill-extend',
'treadmill-end'
])

<script>
const keynumber = "{{ $keynumber }}"; // Safe to use if sanitized by Blade
</script>

<x-dash-layout title="Members">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <div class="container mx-auto" x-data="{ openLink: null, openshowmodal: false}" x-init="barcodeScanner().init()">
        <h2 class="text-sm font-bold px-4 mb-4 dark:text-white">Members List</h2>

        @if (!$members->isEmpty())
        <span class="text-sm text-gray-600 dark:text-gray-400 px-4">
            Page {{ $members->currentPage() }} of {{ $members->lastPage() }}
        </span>
        @endif

        <div class="flex w-full gap-5 mt-4">
            <div class="mt4">
                {{ $members->links('vendor.pagination.custom-pagination') }}
            </div>

            <!-- manual search  -->
            <form id="searchForm" action="{{ route('members.index') }}" method="GET" class="w-full ">
                <div class="relative z-[5]">
                    <button type="submit"
                        class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span> <!-- For accessibility -->
                    </button>
                    <input type="text" name="search" id="searchInput" maxlength="255" placeholder="Search by ID Number"
                        value="{{ request('search') }}"
                        class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />

                </div>
            </form>
        </div>

        <div class="hidden" x-data="qrScanner()">
            <input type="text" id="barcodeInput" name="search" x-model="scannedValue" x-ref="barcodeInput"
                class="scan-input" placeholder="Barcode Input">
        </div>

        <div class="max-w-full overflow-x-auto p-4 border dark:border-none rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-border dark:border-none bg-white dark:bg-peak_1  rounded-lg ">
                <thead>
                    <tr class="border-b dark:border-none text-sm text-gray-500 dark:bg-peak_2">
                        <th class="px-4 py-2 text-left">QRID</th>
                        <th class="px-4 py-2 text-left">Id</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Subscription</th>
                        <th class="px-4 py-2 text-left">Type</th>
                        <th class="px-4 py-2 text-left">Yearly Status</th>
                        <th class="px-4 py-2 text-left">Yearly Duration</th>
                        <th class="px-4 py-2 text-left">Checkin</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody x-data="{ serviceFilter: 'all', statusFilter: 'current' }"
                    class="divide-y divide-border dark:border-none">
                    @if($members->isEmpty())
                    <td colspan="8" class="text-center p-2 text-gray-400">No Members Found</td>
                    @else
                    @foreach($members as $member)

                    <tr class="border-b dark:border-none hover:bg-gray-50 dark:hover:bg-gray-800 text-sm dark:text-white transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}"
                        :id="'member-' + '{{ $member->id_number }}'" x-init="checkAndOpen()"
                        x-data="{ showWarning: false, serviceendWarning: false, lockerendWarning: false, treadmillendWaring: false, opendelete: false, membershipOption:false,renewConfirm: false, changeMembershipConfirm: false, openservices: false, opensmembershipswitch:false, openeditmodal:false, extendOpen: false, lockerOption: false ,extendLockerOpen:false,rentLockerOpen: false,  extendTreadmill: false, checkAndOpen() { if (keynumber === '{{ $member->id_number }}') { this.openservices = true; } }}">


                        @php
                        $statusColors = [
                        'Active' => ['bg-green-500', 'text-green-500'],
                        'Pre-paid' => ['bg-blue-500', 'text-blue-500'],
                        'Impending' => ['bg-yellow-500', 'text-yellow-500'],
                        'Due' => ['bg-orange-500', 'text-orange-500'],
                        'Overdue' => ['bg-red-500', 'text-red-500'],
                        'Expired' => ['bg-gray-500', 'text-gray-500']
                        ];

                        $status = $member->membershipDuration ? $member->membershipDuration->status : 'Pre-paid';
                        [$bgColor, $textColor] = $statusColors[$status] ?? ['bg-gray-500', 'text-white'];

                        $alreadyCheckedIn = \App\Models\CheckinRecord::where('user_id', $member->id)
                        ->whereDate('checkin_date', \Carbon\Carbon::now()->toDateString())
                        ->exists();

                        $buttonClass = '';

                        // Merge services, lockers, and treadmills into one collection
                        $allItems = collect(array_merge($member->services->toArray(), $member->lockers->toArray(),
                        $member->treadmills->toArray()));

                        // Loop through the merged collection
                        foreach ($allItems as $item) {
                        if ($item['status'] === "Overdue") {
                        $buttonClass = "bg-red-500 hover:bg-red-600";
                        break;
                        } elseif ($item['status'] === "Due") {
                        $buttonClass = "bg-orange-500 hover:bg-orange-600";
                        break;
                        }elseif ($item['status'] === "Impending") {
                        $buttonClass = "bg-yellow-500 hover:bg-yellow-600";

                        }


                        }

                        // Default class for active or no overdue status
                        if (!$buttonClass) {
                        $buttonClass = "bg-green-500 hover:bg-green-600"; // Class for active or default
                        }
                        @endphp


                        <td class="whitespace-nowrap px-4 py-2">
                            @if($member->id_number)
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                viewBox="0 0 48 48">
                                <linearGradient id="IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1" x1="9.858" x2="38.142"
                                    y1="9.858" y2="38.142" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#9dffce"></stop>
                                    <stop offset="1" stop-color="#50d18d"></stop>
                                </linearGradient>
                                <path fill="url(#IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1)"
                                    d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z">
                                </path>
                                <linearGradient id="IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2" x1="13" x2="36" y1="24.793"
                                    y2="24.793" gradientUnits="userSpaceOnUse">
                                    <stop offset=".824" stop-color="#135d36"></stop>
                                    <stop offset=".931" stop-color="#125933"></stop>
                                    <stop offset="1" stop-color="#11522f"></stop>
                                </linearGradient>
                                <path fill="url(#IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2)"
                                    d="M21.293,32.707l-8-8c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414	c0.391-0.391,1.024-0.391,1.414,0L22,27.758l10.879-10.879c0.391-0.391,1.024-0.391,1.414,0l1.414,1.414	c0.391-0.391,0.391,1.024,0,1.414l-13,13C22.317,33.098,21.683,33.098,21.293,32.707z">
                                </path>
                            </svg>
                            @else
                            <a href="{{ route('index.link', $member->id) }}"
                                class="text-white bg-red-500 hover:bg-red-700 rounded px-3 py-1">
                                Link
                            </a>
                            @endif
                        </td>

                        <td class="whitespace-nowrap px-4 py-2">{{ $member->id }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $member->name }}</td>

                        <td class="whitespace-nowrap px-4 py-2">
                            @php
                            $activeService = $member->services->whereIn('status', ['Active', 'Due', 'Overdue',
                            'Impending'])->first();
                            $statusColor = match ($activeService->status ?? 'N/A') {
                            'Active' => 'bg-green-500',
                            'Due' => 'bg-orange-500',
                            'Impending' => 'bg-yellow-500',
                            'Overdue' => 'bg-red-500',
                            default => 'bg-gray-300',
                            };
                            @endphp

                            <!-- Status Indicator -->
                            <button @click="openservices = true"
                                class="top-2 right-2 w-3 h-3 rounded-full {{ $statusColor }}"
                                aria-label="{{ $activeService->status ?? 'No status' }} status" type="button">
                            </button>

                            <!-- Service Type -->
                            @if ($activeService)
                            {{ $activeService->service_type }}
                            @if($member->membership_type == 'Manual')
                            Month
                            @endif
                            @else
                            N/A
                            @endif
                        </td>



                        <td class="whitespace-nowrap px-4 py-2">
                            @if ($member->membership_type == 'Regular')
                            {{ $member->membership_type }} - {{ $prices['Regular'] ?? '' }}
                            @elseif ($member->membership_type == 'Walkin')
                            {{ $member->membership_type }} - {{ $prices['Walk-in'] ?? '' }}
                            @else
                            {{ $member->membership_type }}
                            @endif
                        </td>



                        <td class="whitespace-nowrap px-4 py-2">
                            <button @click="membershipOption = true"
                                class=" top-2 right-2 w-3 h-3 {{ $bgColor }} rounded-full"
                                aria-label="{{ $status }} status" title="{{ $status }}" type="button">
                            </button> {{ $member->membershipDuration->status }}
                        </td>

                        <td class="whitespace-nowrap px-4 py-2">
                            @if ($member->membership_type === 'Walkin')
                            Limited Duration
                            @else
                            {{ \Carbon\Carbon::parse($member->membershipDuration->start_date)->format('M j, Y') }}
                            -
                            {{ \Carbon\Carbon::parse($member->membershipDuration->due_date)->format('M j, Y') }}
                            @endif
                        </td>


                        @can(['checkin-edit'])
                        @include ('administrator.members.checkin')
                        @endcan

                        <td class="px-4 align-middle">

                            <div class="action-dropdown flex items-center justify-center">
                                <button
                                    class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                    </svg>
                                </button>

                                <div
                                    class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                    <div class="py-1">
                                        @can('member-view')
                                        <button
                                            @click.prevent="openshowmodal = openshowmodal === {{ $member->id }} ? null : {{ $member->id }}"
                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-3">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            View
                                        </button>
                                        @endcan



                                        <!-- disable if membershiptype = walkin else enable -->

                                        <button @click="openservices = true"
                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3"
                                            :class="{ 'cursor-not-allowed opacity-50': membershipType === 'Walkin' }">

                                            <svg class="w-4 h-4 mr-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                            </svg>

                                            Services
                                        </button>

                                        <button @click="membershipOption = true"
                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3"
                                            :class="{ 'cursor-not-allowed opacity-50': membershipType === 'Walkin' }">

                                            <svg class="w-4 h-4 mr-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="square"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            Membership
                                        </button>


                                        @can('member-edit')
                                        <button @click="openeditmodal = {{$member->id}}"
                                            class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                            Edit
                                        </button>
                                        @endcan


                                        @can('member-delete')
                                        <button @click="opendelete = true"
                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-3">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            </svg>
                                            Delete
                                        </button>
                                        @endcan


                                    </div>
                                </div>
                            </div>
                            @include ('administrator.members.services')
                            @include ('administrator.members.show')
                            @include ('administrator.members.edit')
                            @include ('administrator.members.delete')

                        </td>

                    </tr>



                    <!-- Details modal -->

                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</x-dash-layout>
@endcanany
<!-- scripts for auto calendar set -->
@include ('administrator.members.includes.script')

<script></script>
<!-- scripts for qrscanner to search -->
@include ('administrator.members.includes.scannerscript')