@canany(['member-create', 'subscription-create', 'locker-create', 'treadmill-create'])
<x-dash-layout>
<<<<<<< HEAD
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text-black dark:dark:text-gray-300 border border-black/40 dark:border-white/40 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 dark:text-white">Create a New Member</h2>
=======
    <div class="container dark:text-gray-600">
        <h2 class="dark:text-white">Register New Member</h2>
>>>>>>> 29a4e95c4972173aedb72540c8402f7a5b0bceed

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" class="space-y-6">
            @csrf
            <input hidden name="form_token" value="{{ session('form_token') }}">

<<<<<<< HEAD
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="name" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Name:</label>
                    <input type="text" id="name" name="name" required maxlength="50" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
=======

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

            @can(['subscription-create'])
            <h2>Subscription Service</h2>
            <div x-data="{ includeService: false, subscriptions: 1, serviceStartDate: '' }">
                <div>
                    <label>
                        <input type="checkbox" x-model="includeService"
                            @change="if (includeService) { subscriptions = 1; serviceStartDate = new Date().toISOString().slice(0, 10); } else { serviceStartDate = ''; }">
                        Include Subscriptions
                    </label>
>>>>>>> 29a4e95c4972173aedb72540c8402f7a5b0bceed
                </div>
                <div class="space-y-2">
                    <label for="phone" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Phone:</label>
                    <input type="tel" id="phone" name="phone" maxlength="20" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="fb" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Facebook (optional):</label>
                    <input type="text" id="fb" name="fb" maxlength="50" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Email:</label>
                    <input type="email" id="email" name="email" maxlength="100" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="membership_type" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Membership Type:</label>
                    <select name="membership_type" id="membership_type" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                        <option value="Regular">Regular</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
            </div>
            @endcan

<<<<<<< HEAD
            

            <button type="submit" class="bg-peak-4 dark:bg-gray-900 text-primary dark:text- rounded py-2 px-6 font-bold hover:bg-shade_4 dark:hover:bg-shade_7 transition-color duration-300">
                Register
            </button>
=======
            @canany(['locker-create'])
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
            @endcan


            @canany(['treadmill-create'])
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
            @endcan



            <button type="submit">register</button>

>>>>>>> 29a4e95c4972173aedb72540c8402f7a5b0bceed
        </form>
    </div>
</x-dash-layout>
@endcanany