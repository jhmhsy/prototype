<!-- Rent More Treadmill Modal s-->
<div style="display:none;" x-show="membershipOption" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="membershipOption = false">
</div>

<!-- Member Details Modal -->
<div style="display:none;" x-show="membershipOption" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2"
    @click.stop>
    <div class="modal-content">

        <div class="flex gap-4 items-center mb-4">

            <div @click="membershipOption = true" class=" w-3 h-3 {{ $bgColor }} rounded-full"
                aria-label="{{ $status }} status" title="{{ $status }}" type="button">
            </div>
            <h2 class="text-lg font-semibold dark:text-white">Member Registration Status</h2>

        </div>
        <div class="mb-4">
            <p class="text-3xl font-bold  {{ $textColor }}">
                {{ $status }}
            </p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-500">Name</label>
            <p class="dark:text-white">{{ $member->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-500">Membership Type</label>
            <p class="dark:text-white">{{ $member->membership_type }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-500">Duration</label>
            <p class="dark:text-white">
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
        <!-- Renew button -->
        <div>
            <div class="flex items-center justify-between">

                @can('member-membership-renew')
                <button @click="renewConfirm = true; membershipOption = false"
                    class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded ">
                    Renew
                </button>
                @endcan

            </div>
        </div>


        <div class="flex gap-5">
            @if ($member->membership_type == 'Walkin')
            <button @click="changeMembershipConfirm = true; membershipOption = false"
                class="mt-4 w-full border border-blue-500 text-blue-500 hover:bg-blue-700 hover:text-white px-4 py-2 rounded">
                Change Membership
            </button>
            @else
            <button disabled class=" mt-4 w-full border border-blue-500 text-blue-500   px-4 py-2 rounded line-through">
                Change Membership <span class="text-xs text-red-800 decoration-none">Unavailable</span>
            </button>
            @endif
            <button @click="membershipOption = false"
                class="mt-4 w-full  border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded">
                Close
            </button>
        </div>
    </div>


</div>


<!-- Confirm Renew Modal -->
<div style="display:none;" x-show="renewConfirm" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="renewConfirm = false"></div>
<div style="display:none;" x-show="renewConfirm" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-card bg-white dark:bg-peak_2 rounded-lg shadow-lg max-w-sm w-full mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold dark:text-white">Membership Renewal Confirmation</h2>
        </div>
        <p class="text-muted-foreground mb-6 text-gray-500">Please select "<span
                class="text-black dark:text-white">Confirm</span>" to renew this subscription.
        </p>

        <div class="flex justify-end space-x-4">
            <div>
                <button
                    class="bg-black text-white hover:bg-black/80 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2"
                    @click="renewConfirm=false, membershipOption=true">
                    Cancel
                </button>
            </div>

            <form action="{{ route('members.renew', $member) }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Confirm
                </button>
            </form>
        </div>


    </div>
</div>



<!-- Confirm Change Membership Modal -->
<div style="display:none;" x-show="changeMembershipConfirm" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="changeMembershipConfirm = false"></div>
<div style="display:none;" x-show="changeMembershipConfirm" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-card bg-white dark:bg-peak_2 rounded-lg shadow-lg max-w-sm w-full mx-4 p-6">
        <form action="{{ route('members.changemembership', $member) }}" method="POST" class="inline">
            @csrf
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">Confirm Membership Transition</h2>
            </div>
            <p class="text-muted-foreground mb-6 text-gray-500">Please select the new membership type and click
                "<span class="text-black dark:text-white">Confirm</span>" to
                update this user's membership.
            </p>


            <!-- Membership Type Dropdown -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Membership Type
                </label>
                <select name="membership_type" id="membership_type" x-model="membershipType"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-gray-600 dark:text-white">
                    <option value="Regular">Regular</option>
                    <option value="Manual">Manual</option>
                </select>
            </div>

            <p class="text-muted-foreground mb-6 text-gray-500">Tip: This change is permanent and cannot be undone
            </p>
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white hover:bg-blue-600  px-4 py-2 rounded ">
                Confirm
            </button>
        </form>
        <button @click="changeMembershipConfirm=false, membershipOption=true"
            class="mt-4 w-full  border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded">
            Close
        </button>



    </div>

</div>