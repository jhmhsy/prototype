@canany(['price-view', 'price-edit'])
    <x-dash-layout title="Prices">


        <body class="bg-gray-100 dark:bg-peak_3">
            <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-8">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-4 sm:mb-8 dark:text-white">
                    Service Prices
                </h1>

                <!-- Container for table responsiveness -->
                <div class="bg-white dark:bg-peak_1 rounded-lg shadow overflow-hidden">
                    <!-- Mobile View (Card Layout) -->
                    <div class="block sm:hidden">
                        @foreach($prices as $price)
                            <div class="border-b dark:border-peak_2 p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Service Type
                                        </span>
                                        <span class="font-medium dark:text-white">
                                            {{ $price->service_type }}
                                        </span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Price
                                        </span>
                                        <span class="font-medium dark:text-white">
                                            ₱{{ number_format($price->price, 2) }}
                                        </span>
                                    </div>
                                </div>
                                @can('price-edit')
                                    <div class="mt-2"
                                        x-data="{ Editmodal: false, serviceType: '{{ $price->service_type }}', priceValue: '{{ $price->price }}' }">
                                        <button @click="Editmodal = true"
                                            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                                            Edit
                                        </button>
                                        @include('administrator.price.edit')
                                    </div>
                                @endcan
                            </div>
                        @endforeach
                    </div>

                    <!-- Tablet and Desktop View (Table Layout) -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-peak_2">
                            <thead class="bg-gray-50 dark:bg-peak_2">
                                <tr>
                                    <th
                                        class="px-4 lg:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Service Type
                                    </th>
                                    <th
                                        class="px-4 lg:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                    @can('price-edit')
                                        <th
                                            class="px-4 lg:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white dark:bg-peak_1 divide-y divide-gray-200 dark:divide-peak_2 dark:text-white">
                                @foreach($prices as $price)
                                    <tr>
                                        <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $price->service_type }}
                                        </td>
                                        <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-sm">
                                            ₱{{ number_format($price->price, 2) }}
                                        </td>
                                        @can('price-edit')
                                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-sm"
                                                x-data="{ Editmodal: false, serviceType: '{{ $price->service_type }}', priceValue: '{{ $price->price }}' }">
                                                <button @click="Editmodal = true"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-3 sm:py-2 sm:px-4 rounded text-sm">
                                                    Edit
                                                </button>
                                                @include('administrator.price.edit')
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
    </x-dash-layout>
@endcanany