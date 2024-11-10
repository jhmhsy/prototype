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

    <x-dash-layout>
        <div class="bg-gray-100 dark:bg-peak_1" x-data="{ serviceFilter: 'all', statusFilter: 'current' }">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4 dark:text-white">Member List</h1>
                <form action="{{ route('members.index') }}" method="GET" class="mt-4">
                    <div class="flex mb-5 relative">
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
                            value="{{ request('search') }}" value="{{ request('search') }}"
                            class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                    </div>
                </form>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @if($members->isEmpty())
                        <p class="dark:text-white">No members yet.</p>
                    @else
                            @foreach($members as $member)

                                    <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg bg-white dark:bg-peak_2 p-4 rounded shadow relative"
                                        x-data="{ membershipOption:false,renewConfirm: false, open: false, extendOpen: false, lockerOption: false ,extendLockerOpen:false,rentLockerOpen: false,  extendTreadmill: false }">

                                        @php
                                            $statusColors = [
                                                'Active' => ['bg-green-500', 'text-green-500'],
                                                'Inactive' => ['bg-blue-500', 'text-blue-500'],
                                                'Due' => ['bg-yellow-500', 'text-yellow-500'],
                                                'Overdue' => ['bg-red-500', 'text-red-500'],
                                                'Expired' => ['bg-gray-500', 'text-gray-500']
                                            ];

                                            $status = $member->membershipDuration ? $member->membershipDuration->status : 'Inactive';
                                            [$bgColor, $textColor] = $statusColors[$status] ?? ['bg-gray-500', 'text-white'];
                                        @endphp
                                        <button @click="membershipOption = true"
                                            class="absolute top-2 right-2 w-3 h-3 {{ $bgColor }} rounded-full"
                                            aria-label="{{ $status }} status" title="{{ $status }}" type="button">
                                        </button>

                                        <h2 class="text-xl font-semibold dark:text-white truncate">{{ $member->name }}</h2>
                                        <p class="text-gray-500 truncate">{{ $member->email }}</p>


                                        @can('member-edit')
                                            <button @click="open = true"
                                                class="mt-2 bg-primary text-primary-foreground px-4 py-2 rounded hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 w-full sm:w-auto">
                                                View Details
                                            </button>
                                        @endcan

                                        <!-- Details modal -->
                                        @include ('administrator.members.detail')



                                    </div>
                            @endforeach
                    @endif
                </div>
            </div>
        </div>
    </x-dash-layout>
@endcanany
<!-- The javascript scripts -->
@include ('administrator.members.script')