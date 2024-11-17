<div style="display:none;" x-show="lockerOption" class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="lockerOption" @click.away="lockerOption = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2">
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 dark:text-white">Locker Options</h3>
    @php
    // Check if the member has any lockers with specific statuses
    $activeLocker = $member->lockers()
    ->whereIn('status', ['Active', 'Inactive', 'Due', 'Overdue', 'Expired'])
    ->first();

    $hasAnyLocker = !is_null($activeLocker); // User has at least one subscription locker
    $hasActiveOrDueLocker = $activeLocker && in_array($activeLocker->status, ['Active', 'Due', 'Overdue', 'Inactive',
    'Expired']);
    @endphp

    <div class="flex gap-5 m-auto" x-data="{ 
    hasAnyLocker: {{ json_encode($hasAnyLocker) }}, 
    hasActiveOrDueLocker: {{ json_encode($hasActiveOrDueLocker) }}}">
        <!-- Extend Current Locker Button -->
        <button x-show="hasActiveOrDueLocker" @click="extendLockerOpen = true; lockerOption = false;"
            onclick="refreshDate({{ $member->id }}, 'lockers', 'locker');"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Extend Locker #{{ $activeLocker ? $activeLocker->locker_number : '' }}
        </button>
        <button x-show="!hasActiveOrDueLocker" disabled
            class="mt-4 bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
            Extend Locker
        </button>

        <!-- Rent New Locker Button -->
        <button x-show="!hasAnyLocker" @click="rentLockerOpen = true; lockerOption = false;"
            onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill');"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Rent Locker
        </button>
        <button x-show="hasAnyLocker" disabled class="mt-4 bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
            Already Rented
        </button>
    </div>
    <button @click="lockerOption = false, openservices = true"
        class="mt-4 w-full  border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded ">
        Cancel
    </button>


</div>


<!-- EXTEND CURRENT LOCKER MODAL ------------------------------------------------------------------>
<div style="display:none;" x-show="extendLockerOpen" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="extendLockerOpen = false">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="extendLockerOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4"></h3>
    <form action="{{ route('members.rent-locker', $member->id) }}" method="POST" id="locker-form-{{ $member->id }}"
        class="locker-form" x-data="{ month: '', showError: false, }"
        @submit.prevent="showError = !month; if (!showError) $el.submit();">
        @csrf
        <input hidden name="form_token" value="{{ session('form_token') }}">
        <div class="mb-4">
            <label for="locker_no" class="block text-sm font-medium text-gray-700">Locker
                Number</label>

            <select name="locker_no" id="locker_no"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                {{ !isset($locker) ? 'disabled' : '' }}>
                @if (isset($locker))
                <option value="{{ $locker->locker_no }}" selected>Locker No. {{ $locker->locker_no }}</option>
                @else
                <option value="" disabled selected>No Locker Assigned</option>
                @endif
            </select>
            <input type="hidden" name="locker_no" value="{{ isset($locker) ? $locker->locker_no : '' }}">

        </div>

        <div class="mb-4">
            <label for="locker_start_date_{{ $member->id }}" class="block text-sm font-medium text-gray-700">
                Start Date
            </label>
            <div class="flex space-x-2">
                <input type="date" id="locker_start_date_{{ $member->id }}" name="start_date" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div class="relative inline-block">
                    <button type="button" onclick="refreshDate({{ $member->id }}, 'lockers', 'locker')"
                        class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 tooltip-button">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                    <div class="tooltip hidden absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1" role="tooltip">
                        Automatically updates the date to reflect the most recent rented lockers due date
                    </div>
                </div>
            </div>
        </div>

        <!-- Month Selection -->
        <div class="mb-4">
            <label for="month_{{ $member->id }}" class="block text-sm font-medium text-gray-700">
                How many Months (max 12)
            </label>

            <input x-model="month" type="number" id="month_{{ $member->id }}" name="month" placeholder="##"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                oninput="monthInputLimit(this)">

            <!-- Error Message -->
            <p x-show="showError" x-cloak class="error text-xs text-red-500">
                Months quantity is needed.
            </p>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Confirm
        </button>
    </form>
    <button @click="extendLockerOpen = false, lockerOption = true"
        class="mt-4 w-full border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded ">
        Cancel
    </button>
</div>








<!-- RENT ANOTHER LOCKER MODAL -->
<div style="display:none;" x-show="rentLockerOpen" class="fixed select-none inset-0 bg-black opacity-50 z-40"
    @click="extendLockerOpen = false">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="rentLockerOpen" @click.away="rentLockerOpen = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Rent More Locker</h3>
    <form action="{{ route('members.rent-locker', $member->id) }}" method="POST" id="locker-form-{{ $member->id }}"
        class="locker-form" x-data="{ month: '', showError: false, loading: false }"
        @submit.prevent="showError = !month; if (!showError) $el.submit();">
        @csrf
        <input hidden name="form_token" value="{{ session('form_token') }}">
        <div class="mb-4">
            <label for="locker_no" class="block text-sm font-medium text-gray-700">Locker
                Number (<span class="text-green-500">max 1</span>)</label>
            <select id="locker_no" name="locker_no" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @php
                $allOccupied = true;
                $firstAvailable = null;

                // Find first available locker
                for ($i = 1; $i <= 21; $i++) { if (!in_array($i, $occupiedLockers)) { $firstAvailable=$i;
                    $allOccupied=false; break; } } @endphp @if ($allOccupied) <option value="" disabled selected>All
                    lockers are occupied</option>
                    @else
                    <option value="" disabled>Select a locker</option>
                    @endif

                    @for ($i = 1; $i <= 21; $i++) <option value="{{ $i }}"
                        {{ in_array($i, $occupiedLockers) ? 'disabled' : '' }}
                        {{ $i === $firstAvailable ? 'selected' : '' }}>
                        Locker No. {{ $i }}
                        {{ in_array($i, $occupiedLockers) ? '(Unavailable)' : '' }}
                        </option>
                        @endfor
            </select>
        </div>


        <div class="mb-4">
            <label for="locker_start_date_{{ $member->id }}" class="block text-sm font-medium text-gray-700">
                Start Date
            </label>
            <div x-data="{ date: new Date().toISOString().split('T')[0] }" class="flex space-x-2">
                <input type="date" x-model="date" id="locker_start_date_{{ $member->id }}" name="start_date" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div class="relative inline-block">
                    <button
                        @click="loading = true; date = new Date().toISOString().split('T')[0]; setTimeout(() => loading = false, 500)"
                        type="button"
                        class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 tooltip-button">
                        <svg :class="{ 'animate-spin': loading }" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                    <div class="tooltip hidden absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1" role="tooltip">
                        Automatically updates the date to reflect the most recent rented lockers due date
                    </div>
                </div>
            </div>
        </div>

        <!-- Month Selection -->
        <div class="mb-4">
            <label for="month_{{ $member->id }}" class="block text-sm font-medium text-gray-700">
                How many Months (max 12)
            </label>
            <input x-model="month" type="number" id="month_{{ $member->id }}" name="month" placeholder="##"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                oninput="monthInputLimit(this)">

            <!-- Error Message -->
            <p x-show="showError" x-cloak class="error text-xs text-red-500">
                Months quantity is needed.
            </p>
        </div>

        <!-- Submit Button -->
        <button type="submit" :disabled="loading"
            class="w-full bg-blue-500 teot-white po-4 py-2 rounded hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
            Confirm
        </button>
    </form>
    <button @click="rentLockerOpen = false, lockerOption = true"
        class="mt-4 w-full border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded ">
        Cancel
    </button>
</div>