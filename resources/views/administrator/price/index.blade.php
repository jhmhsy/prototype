@canany(['price-view', 'price-edit'])
    <x-dash-layout>


        <body class="bg-gray-100 dark:bg-peak_3">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold mb-8 dark:text-white">Service Prices</h1>

                <div class="bg-white dark:bg-peak_1 rounded-lg shadow overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-peak_2">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Service Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                @can('price-edit')
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-peak_1 dark:text-white">
                            @foreach($prices as $price)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $price->service_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">₱{{ number_format($price->price, 2) }}</td>
                                    @can('price-edit')
                                        <td class="px-6 py-4 whitespace-nowrap"
                                            x-data="{ Editmodal: false, serviceType: '{{ $price->service_type }}', priceValue: '{{ $price->price }}' }">


                                            <button @click="Editmodal = true"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
        </body>
    </x-dash-layout>
@endcanany