<div class="bg-white dark:bg-peak_2 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6"
    x-data="{ includeService: false, subscriptions: 1, serviceStartDate: '' }">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Subscription Service</h2>

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

                        <select :name="'service_type_' + i"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                            <option value="" selected disabled class="disabled">Choose an option
                            </option>
                            <option value="1month">1 Month</option>
                            <option value="1monthstudent">1 Month / Student</option>
                            <option value="3month">3 Months</option>
                            <option value="6month">6 Months</option>
                            <option value="12month">12 Months</option>
                        </select>
                    </div>

                    <div>
                        <label :for="'start_date_' + i"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Start Date
                        </label>
                        <input type="date" :name="'start_date_' + i" :value="serviceStartDate"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
                    </div>




                </div>

                <button type="button" @click="subscriptions > 1 ? subscriptions-- : null"
                    class="absolute top-4 right-4 text-red-500 hover:text-red-700 dark:hover:text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Add another Subscription
        </button>
    </div>
</div>