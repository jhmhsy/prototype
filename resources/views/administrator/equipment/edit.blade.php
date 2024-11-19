<div style="display: none;" x-show="Editmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="Editmodal === {{$equipment->id}}" @click.away="Editmodal = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90 ">
    <div class="bg-white dark:bg-peak_2  rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="text-2xl font-bold dark:text-white">New equipment</h3>
                <p class="text-sm text-gray-500">What is this new equipment? </p>
            </div>
            <div class="p-6  text-black dark:text-white">
                <form action="{{ route('equipments.update', $equipment->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-500  ">Equipment Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $equipment->name) }}"
                            class="dark:bg-peak_1  w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required
                            maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-500 ">Type</label>
                        <input type="text" id="type" name="type" value="{{ old('type', $equipment->type) }}"
                            class="dark:bg-peak_1  w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required
                            maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="details" class="block text-sm font-medium text-gray-500 ">Details</label>
                        <textarea id="details" name="details" rows="4"
                            class="dark:bg-peak_1  w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required
                            maxlength="300">{{ old('details', $equipment->details) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="extra_details" class="block text-sm font-medium text-gray-500 ">Extra
                            Details</label>
                        <textarea id="extra_details" name="extra_details"
                            class="dark:bg-peak_1  w-full px-4 py-2 mt-1 border dark:border-none rounded-md "
                            maxlength="300">{{ old('extra_details', $equipment->extra_details) }}</textarea>
                    </div>

                    <button type="submit"
                        class="w-full group flex items-center px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                        Update equipment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>