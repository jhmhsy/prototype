@can('dailysales-list')
<x-dash-layout>
    <section class="container mx-auto px-4 py-6 space-y-6">
        {{-- Daily Sales Overview --}}
        <div class="bg-white dark:bg-peak_2 rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Daily Sales Overview</h1>
            </div>

            @foreach ($data as $memberData)
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h2 class="text-lg dark:text-white font-semibold mb-4">{{ $memberData['name'] }}</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-500 text-left">
                        <thead class="">
                            <tr class=" text-gray-700 dark:text-gray-300">
                                <th class="px-4 py-3">Services</th>
                                <th class="px-4 py-3 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberData['details'] as $detail)
                            <tr class="border-b dark:border-gray-600 text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-2">{{ $detail['type'] }}</td>
                                <td class="px-4 py-2 text-right">{{ $detail['amount'] }}</td>
                            </tr>
                            @endforeach
                            <tr class=" text-black dark:text-white font-bold">
                                <td class="px-4 py-2">Total Amount</td>
                                <td class="px-4 py-2 text-right">{{ $memberData['totalAmount'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Daily Member Sales --}}
        <div class="bg-white dark:bg-peak_2 rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Daily Member Sales</h1>
            </div>

            <div class="p-6">
                <div class="bg-white dark:bg-peak_2 p-6 rounded-lg space-y-6mx-auto">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <h3 class="text-lg font-semibold mb-4 text-black dark:text-white">Membership Total</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">{{ $priceData['Walk-in'] ?? 'N/A' }}
                                    Walk-in - Yearly Registration</span>
                                <div class="flex space-x-2">
                                    <span
                                        class="text-black dark:text-white font-semibold">{{ $memberCounts['Walkin'] }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">{{ $priceData['Regular'] ?? 'N/A' }}
                                    Regular - Yearly Registration</span>
                                <div class="flex space-x-2">
                                    <span
                                        class="text-black dark:text-white font-semibold">{{ $memberCounts['Regular'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <h3 class="text-lg font-semibold mb-4 text-black dark:text-white">Services Total</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">1 Month</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['1month'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">1 Month (Student)</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['1monthstudent'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">3 Months</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['3month'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">6 Months</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['6month'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">12 Months</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['12month'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Walk-in Service</span>
                                <span
                                    class="text-black dark:text-white font-semibold">{{ $serviceCounts['WalkinService'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <h3 class="text-lg font-semibold mb-4 text-black dark:text-white">Additional Includes</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Lockers</span>
                                <span class="text-black dark:text-white font-semibold">{{ $lockerAmount }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Treadmills</span>
                                <span class="text-black dark:text-white font-semibold">{{ $treadmillAmount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-500">Total Sales</span>
                            <span
                                class="text-black dark:text-white text-xl font-bold">₱{{ number_format($totalSales, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
@endcan