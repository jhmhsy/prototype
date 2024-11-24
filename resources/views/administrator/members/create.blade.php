@canany(['member-create', 'subscription-create', 'locker-create', 'treadmill-create'])
<x-dash-layout title="Create Member">
    <div class="w-full flex flex-col flex-wrap md:flex-nowrap" x-data="{
    membershipType: 'Regular',
    prices: {
        'Regular': '{{ $prices['Regular'] ?? 'N/A' }}',
        'Walk-in': '{{ $prices['Walk-in'] ?? 'N/A' }}',  // Consistently using 'Walk-in'
        'Manual': '{{ $prices['Manual'] ?? 'N/A' }}'
    }}">
        <div class="px-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Register New Member</h1>
            <p class="text-gray-600 dark:text-gray-400">Fill in the details below to register a new member</p>
        </div>
        <div class="w-full flex flex-wrap">

            <div class="container px-4 max-w-4xl w-full md:w-[65%]">
                <!-- Header -->


                <!-- Success Message -->
                @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('members.store') }}" method="POST" class="space-y-8"
                    x-data="{ registering: false}" @submit="registering = true">
                    @csrf
                    <input type="hidden" name="form_token" value="{{ session('form_token') }}">

                    <!-- Basic Information Card -->
                    <div
                        class="bg-white dark:bg-peak_2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Membership Registration
                        </h2>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Membership Type
                            </label>
                            <select name="membership_type" id="membership_type" x-model="membershipType"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-gray-500 border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:text-black dark:focus:text-white sm:text-sm rounded-md dark:bg-peak_1 dark:border-gray-600 ">

                                <option value="Regular">Regular - ₱{{ $prices['Regular'] ?? 'N/A' }}</option>
                                <option value="Walkin">Walkin - ₱{{ $prices['Walk-in'] ?? 'N/A' }}</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Name
                                </label>
                                <input type="text" id="name" name="name" required maxlength="50"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                            </div>

                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Phone
                                </label>
                                <input type="tel" id="phone" name="phone" maxlength="20"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>


                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Email
                                </label>
                                <input type="email" id="email" name="email" maxlength="100"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">

                                <!-- Display error message if any -->
                                @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                            <div>
                                <label for="fb" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Facebook (optional)
                                </label>
                                <input type="text" id="fb" name="fb" maxlength="50"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <!-- Subscription Section -->
                        @can(['subscription-create'])


                        <div class="bg-white dark:bg-peak_2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6"
                            x-data="{ includeService: false, subscriptions: 1, serviceStartDate: '' }">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Subscription Service
                            </h2>

                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" x-model="includeService"
                                        @change="if (includeService) { subscriptions = 1; serviceStartDate = new Date().toISOString().slice(0, 10); } else { serviceStartDate = ''; }"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">Include Subscriptions</span>
                                </label>
                            </div>

                            <div x-show="includeService" class="space-y-6">
                                <template x-for="i in subscriptions" :key="i">
                                    <div class="bg-gray-50 dark:bg-peak_2 rounded-lg p-4 relative">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                            Subscription <span x-text="i"></span>
                                        </h3>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label :for="'service_type_' + i"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Service Type
                                                </label>
                                                <!-- Regular membership options -->

                                                <template x-if="membershipType === 'Regular'">
                                                    <select :name="'service_type_' + i"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                                        <option value="" selected disabled class="disabled">Choose an
                                                            option
                                                        </option>

                                                        <option value="1month">1 Month -
                                                            ₱{{ $prices['1month'] ?? 'N/A' }}
                                                        </option>
                                                        <option value="1monthstudent">1 Month / Student -
                                                            ₱{{ $prices['1monthstudent'] ?? 'N/A' }}
                                                        </option>
                                                        <option value="3month">3 Months -
                                                            ₱{{ $prices['3month'] ?? 'N/A' }}
                                                        </option>
                                                        <option value="6month">6 Months -
                                                            ₱{{ $prices['6month'] ?? 'N/A' }}
                                                        </option>
                                                        <option value="12month">12 Months -
                                                            ₱{{ $prices['12month'] ?? 'N/A' }}
                                                        </option>
                                                    </select>
                                                </template>
                                                <template x-if="membershipType === 'Walkin'">
                                                    <select :name="'service_type_' + i"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                                        <option value="WalkinService">Walkin -
                                                            ₱{{ $prices['WalkinService'] ?? 'N/A' }}
                                                        </option>
                                                    </select>
                                                </template>
                                                <template x-if="membershipType === 'Manual'">
                                                    <!-- Manual membership options -->
                                                    <select :name="'service_type_' + i"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                                        <option value="" selected disabled class="disabled">Choose an
                                                            option
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

                                                </template>



                                            </div>

                                            <div>
                                                <label :for="'start_date_' + i"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Start Date
                                                </label>
                                                <input type="date" :name="'start_date_' + i" :value="serviceStartDate"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                            </div>

                                            <!-- Manual membership options -->
                                            <template x-if="membershipType === 'Manual'">
                                                <div>
                                                    <label :for="'amount_' + i"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                        Manual Price
                                                    </label>
                                                    <input type="number" :name="'amount_' + i"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                                </div>
                                            </template>




                                        </div>

                                        <button type="button" @click="subscriptions > 1 ? subscriptions-- : null"
                                            class="absolute top-4 right-4 text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>



                                <button type="button" @click="subscriptions < 4 ? subscriptions++ : null"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50"
                                    x-bind:disabled="subscriptions >= 4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Add another Subscription
                                </button>
                            </div>
                        </div>

                        @endcan

                        <!-- Locker Section -->
                        @canany(['locker-create'])
                        <div class="bg-white dark:bg-peak_2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6"
                            x-data="{ includeLocker: false, lockerStartDate: '' }">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Locker</h2>

                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" x-model="includeLocker" name="includeLocker"
                                        @change="lockerStartDate = includeLocker ? new Date().toISOString().slice(0, 10) : ''"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">Include Locker</span>
                                </label>
                            </div>

                            <div x-show="includeLocker" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="locker_start_date"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Start Date
                                        </label>
                                        <input type="date" name="locker_start_date" x-model="lockerStartDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                    </div>

                                    <div>
                                        <label for="locker_no"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Locker Number
                                        </label>
                                        <select id="locker_no" name="locker_no"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                            <option value="" disabled selected>Select a locker</option>
                                            @for ($j = 1; $j <= 40; $j++) <option value="{{ $j }}"
                                                {{ in_array($j, $occupiedLockers) ? 'disabled' : '' }}>
                                                Locker No. {{ $j }}
                                                {{ in_array($j, $occupiedLockers) ? '(Unavailable)' : '' }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>

                                    <div>
                                        <label for="locker_month"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Duration (months) - 100/month
                                        </label>
                                        <input type="number" name="locker_month" step="0.01"
                                            oninput="monthInputLimit(this)"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan

                        <!-- Treadmill Section -->
                        @canany(['treadmill-create'])
                        <div class="bg-white dark:bg-peak_2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6"
                            x-data="{ includeTreadmill: false, treadmillStartDate: '' }"
                            x-init="treadmillStartDate = includeTreadmill ? new Date().toISOString().slice(0, 10) : ''">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Treadmill</h2>

                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" x-model="includeTreadmill"
                                        @change="treadmillStartDate = includeTreadmill ? new Date().toISOString().slice(0, 10) : ''"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">Include Treadmill</span>
                                </label>
                            </div>
                            <div x-show="includeTreadmill" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="treadmill_start_date"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" name="treadmill_start_date" x-model="treadmillStartDate"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>

                                <div>
                                    <label for="treadmill_months"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Duration (months)
                                    </label>
                                    <input type="number" name="treadmill_months" oninput="monthInputLimit(this)"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" x-bind:disabled="registering"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <span x-text="registering ? 'Registering...' : 'Register Member'"></span>
                        </button>
                    </div>
                </form>
            </div>


            @include ('administrator.members.create-includes.total-price')
        </div>
    </div>
    <!-- Month Input Limit Script -->
    <script>
    function monthInputLimit(input) {
        if (input.value < 0) input.value = 0;
        if (input.value > 12) input.value = 12;
    }
    </script>




</x-dash-layout>
@endcanany