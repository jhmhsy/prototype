<div style="display: none;" x-show="Editmodal" class="fixed select-none inset-0 bg-black opacity-35 z-40">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="Editmodal" @click.away="Editmodal = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90" @click.away="Editmodal = false">
    <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">

        <div class="bg-white dark:bg-peak_1 rounded-lg shadow overflow-hidden p-6 w-full ">
            <h2 class="text-2xl font-bold mb-4 dark:text-white">Edit Price</h2>
            <form method="POST" action="{{ route('prices.update', $price->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="service_type" class="block font-bold mb-2 dark:text-white">Service Type</label>
                    <input type="text" id="service_type" name="service_type" x-model="serviceType"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-peak_2 dark:text-white"
                        required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block font-bold mb-2 dark:text-white">Price</label>
                    <input type="number" id="price" name="price" x-model="priceValue"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-peak_2 dark:text-white"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </button>
                    <button type="button" @click="Editmodal = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded ml-2">
                        Cancel
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>