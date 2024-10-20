<x-dash-layout>
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Register New Member</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-xl font-semibold mb-4">Member Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" id="name" name="name" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <input type="tel" id="phone" name="phone" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label for="fb" class="block text-gray-700 text-sm font-bold mb-2">Facebook (optional):</label>
                        <input type="text" id="fb" name="fb"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-xl font-semibold mb-4">Subscription Service</h2>
                <div x-data="{ subscriptions: 1 }" class="space-y-4">
                    <template x-for="i in subscriptions" :key="i">
                        <div class="border-b pb-4 mb-4 last:border-b-0">
                            <h3 class="text-lg font-medium mb-3">Subscription <span x-text="i"></span></h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label :for="'service_type_' + i"
                                        class="block text-gray-700 text-sm font-bold mb-2">Service Type:</label>
                                    <select :name="'service_type_' + i" required
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                                <div>
                                    <label :for="'start_date_' + i"
                                        class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                                    <input type="date" :name="'start_date_' + i" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div>
                                    <label :for="'amount_' + i"
                                        class="block text-gray-700 text-sm font-bold mb-2">Amount:</label>
                                    <input type="number" :name="'amount_' + i" step="0.01" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="subscriptions < 4 ? subscriptions++ : null"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Add Subscription
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-xl font-semibold mb-4">Locker</h2>
                <div x-data="{ includeLocker: false, lockers: 1 }" class="space-y-4">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="includeLocker" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Include Locker</span>
                        </label>
                    </div>
                    <div x-show="includeLocker" class="space-y-4">
                        <template x-for="i in lockers" :key="i">
                            <div class="border-b pb-4 mb-4 last:border-b-0">
                                <h3 class="text-lg font-medium mb-3">Locker <span x-text="i"></span></h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label :for="'locker_start_date_' + i"
                                            class="block text-gray-700 text-sm font-bold mb-2">Locker Start
                                            Date:</label>
                                        <input type="date" :name="'locker_start_date_' + i"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                    <div>
                                        <label :for="'locker_no_' + i"
                                            class="block text-gray-700 text-sm font-bold mb-2">Locker no#:</label>

                                        <select id="locker_no" :name="'locker_no_' + i"
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
                                        <label :for="'locker_amount_' + i"
                                            class="block text-gray-700 text-sm font-bold mb-2">Locker Amount:</label>
                                        <input type="number" :name="'locker_amount_' + i" step="0.01"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="lockers < 4 ? lockers++ : null"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add Locker
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-dash-layout>