<x-dash-layout>

    @if(session('success'))
    <div id="notification" class="notification">
        <button id="close-notification" class="close-btn">&times;</button>
        <p class="notification-message">{{ session('success') }}</p>
        <div id="time-bar" class="time-bar"></div>
    </div>
    @endif


    <div class="container dark:text-gray-600">
        <h2 class="dark:text-white">Register New Member</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <input hidden name="form_token" value="{{ session('form_token') }}">


            <select name="membership_type" id="membership_type">
                <option value="Regular">Regular</option>
                <option value="Student">Student</option>
            </select>
            <h2>Member Details</h2>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required maxlength="50">
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" maxlength="20">
            </div>
            <div>
                <label for="fb">Facebook (optional):</label>
                <input type="text" id="fb" name="fb" maxlength="50">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="100">
            </div>

            <h2>Subscription Service</h2>
            <div x-data="{ includeService: false, subscriptions: 1, serviceStartDate: '' }">
                <div>
                    <label>
                        <input type="checkbox" x-model="includeService"
                            @change="if (includeService) { subscriptions = 1; serviceStartDate = new Date().toISOString().slice(0, 10); } else { serviceStartDate = ''; }">
                        Include Subscriptions
                    </label>
                </div>
                <div x-show="includeService">
                    <template x-for="i in subscriptions" :key="i">
                        <div class="mb-4">
                            <h3>Subscription <span x-text="i"></span></h3>

                            <div>
                                <label :for="'service_type_' + i">Service Type:</label>
                                <select :name="'service_type_' + i">
                                    <option value="1month">1 Month</option>
                                    <option value="3month">3 Months</option>
                                    <option value="6month">6 Months</option>
                                    <option value="12month">12 Months</option>
                                </select>
                            </div>

                            <div>
                                <label :for="'start_date_' + i">Subscription Start Date:</label>
                                <input type="date" :name="'start_date_' + i" :value="serviceStartDate">
                            </div>

                            <button type="button" @click="subscriptions > 1 ? subscriptions-- : null"
                                class="mt-2 text-red-500">
                                Delete Subscription
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="subscriptions < 4 ? subscriptions++ : null" class="mt-2">
                        Add Subscription
                    </button>
                </div>
            </div>


            <h2>Locker</h2>
            <div x-data="{ includeLocker: false, lockerStartDate: '' }">
                <div>
                    <label>
                        <input type="checkbox" x-model="includeLocker" name="includeLocker"
                            @change="lockerStartDate = includeLocker ? new Date().toISOString().slice(0, 10) : ''">
                        Include Locker
                    </label>
                </div>
                <div x-show="includeLocker">

                    <div class="mb-4">
                        <h3>Locker</h3>

                        <div>
                            <label for="locker_start_date">Locker Start Date:</label>
                            <input type="date" name="locker_start_date" x-model="lockerStartDate">
                        </div>
                        <div>
                            <label for="locker_no">Locker no#:</label>
                            <select id="locker_no" name="locker_no"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled selected>Select a locker</option>
                                @for ($j = 1; $j <= 27; $j++) <option value="{{ $j }}"
                                    {{ in_array($j, $occupiedLockers) ? 'disabled' : '' }}>
                                    Locker No. {{ $j }} {{ in_array($j, $occupiedLockers) ? '(Unavailable)' : '' }}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <div>
                            <label for="locker_month">Locker months: 100/month</label>
                            <input type="number" name="locker_month" step="0.01" oninput="monthInputLimit(this)">
                        </div>
                    </div>
                </div>
            </div>




            <h2>Treadmill</h2>
            <div x-data="{ includeTreadmill: false, treadmillStartDate: '' }"
                x-init="treadmillStartDate = includeTreadmill ? new Date().toISOString().slice(0, 10) : ''">
                <div>
                    <label>
                        <input type="checkbox" x-model="includeTreadmill"
                            @change="treadmillStartDate = includeTreadmill ? new Date().toISOString().slice(0, 10) : ''">
                        Include Treadmill
                    </label>
                </div>
                <div x-show="includeTreadmill">
                    <div>
                        <label for="treadmill_start_date">Treadmill Start Date:</label>
                        <input type="date" name="treadmill_start_date" x-model="treadmillStartDate">
                    </div>
                    <div>
                        <label for="treadmill_months">How many months?</label>
                        <input type="number" name="treadmill_months" oninput="monthInputLimit(this)">
                    </div>
                </div>
            </div>



            <button type="submit">register</button>

        </form>
    </div>
</x-dash-layout>