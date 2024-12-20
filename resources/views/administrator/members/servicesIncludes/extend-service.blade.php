<div style="display:none;" x-show="extendOpen" class="fixed select-none inset-0 bg-black opacity-50 z-40"
    @click="extendOpen = false">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="extendOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-full md:w-[60%] lg:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2">

    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 dark:text-white">Extend Subscription -
        {{$member->membership_type}}
    </h3>
    <form action="{{ route('members.extend', $member->id) }}" method="POST" id="service-form-{{ $member->id }}"
        class="service-form" x-data="{ showError: false }">
        @csrf
        <input hidden name="form_token" value="{{ session('form_token') }}">


        <!-- Service Type Selection -->
        <div class="mb-4">
            <label for="service_type_{{ $member->id }}" class="block text-sm font-medium text-gray-500">Service
                Type</label>

            @if($member->membership_type == 'Regular')
            <select id="service_type_{{ $member->id }}" name="service_type"
                class="dark:bg-peak_1 dark:text-white mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-none bg-white rounded-md shadow-sm  sm:text-sm">
                <option value="1month">1 Month</option>
                <option value="1monthstudent">1 Month / Student</option>
                <option value="3month">3 Months</option>
                <option value="6month">6 Months</option>
                <option value="12month">12 Months</option>
            </select>
            @elseif($member->membership_type == 'Walkin')
            <select id="service_type_{{ $member->id }}" name="service_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                <option value="WalkinService">Walkin</option>
            </select>
            @elseif($member->membership_type == 'Manual')
            <select id="service_type_{{ $member->id }}" name="service_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                <option value="" selected disabled class="disabled">Choose an option
                <option value="1">1 Month</option>
                <option value="2">2 Month</option>
                <option value="3">3 Month</option>
                <option value="4">4 Month</option>
                <option value="5">5 Month</option>
                <option value="6">6 Month</option>
                <option value="7">7 Month</option>
                <option value="8">8 Month</option>
                <option value="9">9 Month</option>
                <option value="10">10 Month</option>
            </select>
            @endif
        </div>

        <!-- Start Date with Refresh Button -->
        <div class="mb-4">
            <label for="service_start_date_{{ $member->id }}" class="block text-sm font-medium text-gray-500">
                Starting Date
            </label>
            <div class="flex space-x-2">
                <input type="date" id="service_start_date_{{ $member->id }}" name="start_date" required
                    class="dark:bg-peak_1 dark:text-white mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-none bg-white rounded-md shadow-sm  sm:text-sm">


                <div class="relative inline-block">
                    <button type="button" onclick="refreshDate({{ $member->id }}, 'services', 'service')"
                        class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 tooltip-button">
                        <svg class=" h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>

                    <div class="tooltip hidden absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1" role="tooltip">
                        Automatically updates the date to reflect the most recent subscription due date
                    </div>
                </div>
            </div>
        </div>
        @if($member->membership_type == 'Manual')
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Manual Price
            </label>
            <input type="number" name="amount"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
        </div>
        @endif




        <!-- Submit Button -->
        <button type="submit" class="mt-5 w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Confirm
        </button>
    </form>
    <button @click="extendOpen = false, openservices = true"
        class="mt-4 w-full border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded">
        Cancel
    </button>
</div>