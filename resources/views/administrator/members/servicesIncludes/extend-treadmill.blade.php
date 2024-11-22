<!-- Rent More Treadmill Modal -->
<div style="display:none;" x-show="extendTreadmill" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="extendTreadmill = false">
</div>

<!-- Member Details Modal -->
<div style="display:none;" x-show="extendTreadmill" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2"
    @click.stop>
    <div class="modal-content">
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 dark:text-white">Extend Treadmill Duration</h3>
        <form action="{{ route('members.extendTreadmill', $member->id) }}" method="POST"
            id="treadmill-form-{{ $member->id }}" class="treadmill-form" x-data="{ month: '', showError: false }"
            @submit.prevent="showError = !month; if (!showError) $el.submit();">
            @csrf
            <input hidden name="form_token" value="{{ session('form_token') }}">
            <!-- Start Date with Refresh Button -->
            <div class="mb-4">
                <label for="treadmill_start_date_{{ $member->id }}" class="block text-sm font-medium text-gray-500">
                    Starting Date
                </label>
                <div class="flex space-x-2">
                    <input type="date" id="treadmill_start_date_{{ $member->id }}" name="start_date" required
                        class="dark:bg-peak_1 dark:text-white mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-none bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <div class="flex space-x-2">
                        <button type="button" onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill')"
                            class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 tooltip-button">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <div class="tooltip hidden absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1"
                            role="tooltip">
                            Automatically sets the date to extend to the following day
                        </div>
                    </div>
                </div>
            </div>
            <!-- Month Selection -->
            <div class="mb-4">
                <label for="month_{{ $member->id }}" class="block text-sm font-medium text-gray-500">
                    How many Months (max 12)
                </label>
                <input x-model="month" type="number" id="month_{{ $member->id }}" name="month"
                    class="dark:bg-peak_1 dark:text-white mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-none bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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
        <button @click="extendTreadmill = false, openservices = true"
            class="mt-4 w-full border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded ">
            Cancel
        </button>
    </div>
</div>