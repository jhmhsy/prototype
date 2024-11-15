<div style="display:none;" style="display: none;" x-show="openservices"
    class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="openservices" @click.away="openservices = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[55%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2">

    <div class="mt-3 text-center">

        <div class="mt-2 px-7 py-3">
            <div class="flex gap-5 w-full">

                <div class="text-sm text-left text-gray-500 flex flex-col">

                    <div class="flex gap-5">
                        {{-- <div class="absolute top-2 right-2 w-3 h-3 {{ $statusColor }}
                        rounded-full" aria-label="{{ $status }} status" title="{{ $status }}">
                    </div>--}}

                    <button @click="membershipOption = true, openservices = false"
                        class="absolute top-2 right-2 w-3 h-3 {{ $bgColor }} rounded-full"
                        aria-label="{{ $status }} status" title="{{ $status }}" type=" button">
                    </button>
                </div>
            </div>

        </div>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-black dark:text-white">{{ $member->name }}'s Services List</h2>
            <div class="space-x-2 text-sm">
                <select x-model="serviceFilter"
                    class="text-left text-sm border p-2 pr-10 rounded dark:bg-peak_2 dark:text-white">
                    <option value="all">All</option>
                    <option value="service">Service</option>
                    <option value="locker">Lockers</option>
                    <option value="treadmill">Treadmill</option>
                </select>
                <select x-model="statusFilter"
                    class="text-left  text-sm border p-2 pr-10 rounded dark:bg-peak_2 dark:text-white">
                    <option value="current">Current</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
        </div>

        <!-- the tabular table -->
        <div class="overflow-x-auto h-64 sm:h-80">
            @include ('administrator.members.table')
        </div>
    </div>


</div>


<div class="p-6">

    <div class="grid grid-cols-1 md:flex gap-5 justify-between items-center">
        <div class="grid grid-cols-3 space-x-2 text-md sm:text-sm">

            @can('subscription-extend')
            <button @click="extendOpen = true; openservices = false;"
                onclick="refreshDate({{ $member->id }}, 'services', 'service')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Subscription
            </button>
            @endcan

            @can('locker-extend')
            <button @click="lockerOption = true; openservices = false"
                onclick="refreshDate({{ $member->id }}, 'lockers', 'locker')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Locker
            </button>
            @endcan

            @can('treadmill-extend')
            <button @click="extendTreadmill = true; openservices = false"
                onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Treadmill
            </button>
            @endcan
        </div>

        <div class="flex gap-2">

            @if (!$member->hasSubscriptions)

            <button disabled for="has no active subscription"
                class="mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                No Subscription
            </button>


            @elseif ($member->hasSubscriptions)

            @if (!$alreadyCheckedIn)

            @if ($member->hasOverdueSubscription)
            <button @click="openservices = false; showWarning = true" for="with overdue subscription"
                class="mt-4 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-300">
                Check-in (Warning)
            </button>
            @elseif ($member->hasActiveSubscription)
            <form action="{{ route('checkin.store', $member) }}" method="POST">
                @csrf
                <button type="submit" for="hasnt checked in yet"
                    onclick="this.disabled = true; this.innerText = 'Checking in...'; this.form.submit();"
                    class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">
                    Check-in
                </button>
            </form>
            @elseif (!$member->hasActiveSubscription)
            <button disabled for="has no active subscription"
                class="mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                No Active Subscription
            </button>
            @endif

            @elseif ($alreadyCheckedIn)
            <button disabled for="already checked in"
                class="mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-300">
                Checked In
            </button>

            @endif
            @endif

            <button @click="openservices = false"
                class="mt-4 border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded-lg">
                Close
            </button>
        </div>

    </div>
</div>

</div>


@can('subscription-extend')
@include ('administrator.members.extend-service')
@endcan
@can('locker-extend')
@include ('administrator.members.extend-locker')
@endcan
@can('treadmill-extend')
@include ('administrator.members.extend-treadmill')
@endcan


@include ('administrator.members.membershipOption')