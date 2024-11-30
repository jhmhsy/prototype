<div style="display:none;" style="display: none;" x-show="openservices"
    class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="openservices" @click.away="openservices = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-full lg:w-[80%] h-full lg:h-[80%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 rounded-lg bg-white dark:bg-peak_2 overflow-y-auto">

    <div class="mt-3 text-center">

        <div class="mt-2 px-7 py-3">
            <div class="flex gap-5 w-full">
                <div class="text-sm text-left text-gray-500 flex flex-col">

                    <div class="flex gap-5">

                    </div>
                </div>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-center mb-4">
                <div>
                    <h2 class="text-xl font-bold text-left text-black dark:text-white">{{ $member->name }}'s Services
                        List</h2>
                    <div class="mb-4">

                        <div class="flex gap-2">
                            <button @click="membershipOption = true, openservices = false"
                                class="my-auto w-3 h-3 {{ $bgColor }} rounded-full" aria-label="{{ $status }} status"
                                title="{{ $status }}" type=" button">
                            </button>
                            <p class="dark:text-white my-auto">
                                @if ($member->membershipDuration)
                                    @if ($member->membership_type === 'Walkin')
                                        Limited 1/day up until
                                        {{ \Carbon\Carbon::parse($member->membershipDuration->due_date)->format('M j, Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($member->membershipDuration->start_date)->format('M j, Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($member->membershipDuration->due_date)->format('M j, Y') }}
                                    @endif


                                @else
                                    <span class="text-gray-500">No membership duration available</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-sm grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <select x-model="serviceFilter"
                        class="w-full text-left text-sm border p-2 pr-10 rounded dark:bg-peak_2 dark:text-white">
                        <option value="all">All</option>
                        <option value="service">Service</option>
                        <option value="locker">Lockers</option>
                        <option value="treadmill">Treadmill</option>
                    </select>
                    <select x-model="statusFilter"
                        class="w-full text-left  text-sm border p-2 pr-10 rounded dark:bg-peak_2 dark:text-white">
                        <option value="current">Current</option>
                        <option value="expired">Expired</option>
                    </select>
                </div>
            </div>

            <!-- the tabular table -->
            <div class="overflow-x-auto h-64 sm:h-80">
                @include ('administrator.members.servicesIncludes.table')
            </div>
        </div>


    </div>


    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:flex gap-5 justify-between items-center overflow-y-auto">
            <div class=" grid grid-cols-1 lg:grid-cols-3 gap-4  text-md sm:text-sm">

                @can('subscription-extend')
                    <button @click="extendOpen = true; openservices = false;"
                        onclick="refreshDate({{ $member->id }}, 'services', 'service')"
                        class="border dark:border-blue-500 border-black hover:border-blue-600 dark:text-blue-500 text-black  hover:bg-blue-600 hover:text-white active:bg-blue-700 active:text-white px-4 py-2 rounded-lg">Subscription
                    </button>
                @endcan

                @can('locker-extend')
                    <button @click="lockerOption = true; openservices = false"
                        onclick="refreshDate({{ $member->id }}, 'lockers', 'locker')"
                        class="border dark:border-blue-500 border-black hover:border-blue-600 dark:text-blue-500 text-black  hover:bg-blue-600 hover:text-white active:bg-blue-700 active:text-white px-4 py-2 rounded-lg">Locker
                    </button>
                @endcan

                @can('treadmill-extend')
                    <button @click="extendTreadmill = true; openservices = false"
                        onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill')"
                        class="border dark:border-blue-500 border-black hover:border-blue-600 dark:text-blue-500 text-black  hover:bg-blue-600 hover:text-white active:bg-blue-700 active:text-white px-4 py-2 rounded-lg">Treadmill
                    </button>
                @endcan
            </div>

            <div class=" grid grid-cols-1 lg:grid-cols-2 justify-end gap-4  text-md sm:text-sm">

                @if (!$member->hasSubscriptions && !$member->hasLockers && !$member->hasTreadmills)

                    <button disabled for="has no active subscription"
                        class=" bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                        No Subscription
                    </button>
                @elseif ($member->hasSubscriptions || $member->hasLockers || $member->hasTreadmill)

                    <!-- not yet checked in -->
                    @if (!$alreadyCheckedIn)

                        <!-- if is overdue -->
                        @if ($member->hasOverdueSubscription || $member->hasOverdueLocker || $member->hasOverdueTreadmill)
                            <button @click="openservices = false; showWarning = true;" for="with overdue subscription"
                                class=" bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-300">


                                Check-in (Warning)
                            </button>

                            <!-- if has active / good -->
                        @elseif ($member->hasActiveSubscription || $member->hasActiveLocker || $member->hasActiveTreadmill)
                            <form action="{{ route('checkin.store', $member) }}" method="POST" class="w-full ">
                                @csrf
                                <button type="submit" for="hasnt checked in yet"
                                    onclick="this.disabled = true; this.innerText = 'Checking in...'; this.form.submit();"
                                    class=" {{ $buttonClass }} w-full text-white px-4 py-2 rounded transition duration-300">
                                    Check-in
                                </button>
                            </form>

                            <!-- if has no active subscription -->
                        @elseif (!$member->hasActiveSubscription && !$member->hasActiveLocker && !$member->hasActiveTreadmill)
                            <button disabled for="has no active subscription"
                                class=" bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                                No Active Subscription
                            </button>
                        @endif

                        <!-- if already checked in -->
                    @elseif ($alreadyCheckedIn)

                        <button disabled for="already checked in"
                            class=" bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                            Checked In
                        </button>


                    @endif
                @endif

                <div class="hidden lg:block">
                    <button @click="membershipOption = true, openservices = false"
                        class=" border dark:border-blue-500 border-black hover:border-blue-600 dark:text-blue-500 text-black  hover:bg-blue-600 hover:text-white active:bg-blue-700 active:text-white px-4 py-2 rounded-lg">
                        Renew
                    </button>
                </div>
                <button @click=" membershipOption=true, openservices=false"
                    class=" block lg:hidden border dark:border-blue-500 border-black hover:border-blue-600 dark:text-blue-500 text-black  hover:bg-blue-600 hover:text-white active:bg-blue-700 active:text-white px-4 py-2 rounded-lg">
                    Renew
                </button>


            </div>

        </div>
    </div>

</div>


@can('subscription-extend')
    @include ('administrator.members.servicesIncludes.extend-service')
@endcan
@can('locker-extend')
    @include ('administrator.members.servicesIncludes.extend-locker')
@endcan
@can('treadmill-extend')
    @include ('administrator.members.servicesIncludes.extend-treadmill')
@endcan


@include ('administrator.members.membershipOption')
@include ('administrator.members.servicesIncludes.checkinwarning')