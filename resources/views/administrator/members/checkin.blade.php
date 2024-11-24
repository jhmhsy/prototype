<td class="px-6 py-4 whitespace-nowrap ">



    @if (!$member->hasSubscriptions && !$member->hasLockers && !$member->hasTreadmills)

    <span @click="openservices = true"
        class="cursor-pointer px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        No subscriptions
    </span>

    @elseif ($member->hasSubscriptions || $member->hasLockers || $member->hasTreadmill)

    <!-- not yet checked in -->
    @if (!$alreadyCheckedIn)

    <!-- if overdue -->
    @if ($member->hasOverdueSubscription || $member->hasOverdueLocker || $member->hasOverdueTreadmill)
    <span @click="openservices = true"
        class="cursor-pointer px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-red-800 dark:text-red-400">
        Overdue Subscription
    </span>

    <!-- if has active/due good subscription -->
    @elseif ($member->hasActiveSubscription || $member->hasActiveLocker || $member->hasActiveTreadmill)

    <button @click="openservices = true"
        class="{{ $buttonClass }} text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
        Check-in
    </button>


    <!-- if no active subscription -->
    @elseif (!$member->hasActiveSubscription && !$member->hasActiveLocker && !$member->hasActiveTreadmill)
    <span @click="openservices = true"
        class="cursor-pointer px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        No Active subscriptions
    </span>
    @endif

    <!-- if already checked in -->
    @elseif ($alreadyCheckedIn)

    <span @click="openservices = true"
        class="cursor-pointer px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
        User has checked in
    </span>


    @endif
    @endif




</td>