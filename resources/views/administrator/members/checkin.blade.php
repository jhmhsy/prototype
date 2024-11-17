<td class="px-6 py-4 whitespace-nowrap ">

    @if (!$member->hasSubscriptions)

    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        No subscriptions
    </span>


    @elseif ($member->hasSubscriptions)

    <!-- not yet checked in -->
    @if (!$alreadyCheckedIn)

    <!-- if is overdue -->
    @if ($member->hasOverdueSubscription)
    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-red-800 dark:text-red-400">
        Overview Subscription
    </span>

    <!-- if has active / good -->
    @elseif ($member->hasActiveSubscription)
    <form action="{{ route('checkin.store', $member) }}" method="POST" class="my-auto">
        @csrf
        <button @click="open = true"
            class="{{ $buttonClass }} text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
            Check-in
        </button>
    </form>

    <!-- if has no active subscription -->
    @elseif (!$member->hasActiveSubscription)
    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        No Active subscriptions
    </span>
    @endif

    <!-- if already checked in -->
    @elseif ($alreadyCheckedIn)

    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
        User has checked in
    </span>


    @endif
    @endif



</td>