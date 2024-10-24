<x-dash-layout>
    <div class="container">
        <h2>Register New Member</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <h2>Member Details</h2>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div>
                <label for="fb">Facebook (optional):</label>
                <input type="text" id="fb" name="fb">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <h2>Subscription Service</h2>
            <div x-data="{ subscriptions: 1 }">
                <template x-for="i in subscriptions" :key="i">
                    <div>
                        <h3>Subscription <span x-text="i"></span></h3>
                        <div>
                            <label for="service_type">Service Type:</label>
                            <select :name="'service_type_' + i" required>
                                <option value="Monthly">Monthly</option>
                                <option value="Yearly">Yearly</option>
                            </select>
                        </div>
                        <div>
                            <label for="start_date">Start Date:</label>
                            <input type="date" :name="'start_date_' + i" required>
                        </div>
                        <div>
                            <label for="amount">Amount:</label>
                            <input type="number" :name="'amount_' + i" step="0.01" required>
                        </div>
                    </div>
                </template>
                <button type="button" @click="subscriptions < 4 ? subscriptions++ : null">Add Subscription</button>
            </div>

            <h2>Locker</h2>
            <div x-data="{ includeLocker: false, lockers: 1 }">
                <div>
                    <label>
                        <input type="checkbox" x-model="includeLocker">
                        Include Locker
                    </label>
                </div>
                <div x-show="includeLocker">
                    <template x-for="i in lockers" :key="i">
                        <div>
                            <h3>Locker <span x-text="i"></span></h3>
                            <div>
                                <label for="locker_start_date">Locker Start Date:</label>
                                <input type="date" :name="'locker_start_date_' + i">
                            </div>
                            <div>
                                <label for="lock    er_no">Locker no#:</label>
                                <select id="locker_no" name="locker_no" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Select a locker</option>
                                    @for ($i = 1; $i <= 27; $i++) <option value="{{ $i }}" {{ in_array(
                                            $i,
                                            $occupiedLockers
                                        ) ? 'disabled' : '' }}>
                                                                            Locker No. {{ $i }}
                                                                            {{ in_array($i, $occupiedLockers) ? '(Unavailable)' : '' }}
                                                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label for="locker_amount">Locker Amount: 100/month</label>

                            </div>
                        </div>
                    </template>
                    <button type="button" @click="lockers < 4 ? lockers++ : null">Add Locker</button>
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</x-dash-layout>