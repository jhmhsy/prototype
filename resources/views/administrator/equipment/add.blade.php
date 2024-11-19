<div style="display: none;" x-show="createmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="modal fixed admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="createmodal" @click.away="createmodal = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90">
    <div
        class="bg-white dark:bg-peak_2  dark:text-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class=" mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">

                <p class="text-sm text-muted-foreground">Enter the details of the new equipment.</p>
            </div>

            <div class="p-6 dark:text-white">


                <form action="{{ route('equipment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="form_token" value="{{ session('form_token') }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500" for="name">
                                Equipment Name
                            </label>
                            <input
                                class="dark:bg-peak_1 flex h-10 w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                                type="text" name="name" id="name" required maxlength="50"
                                placeholder="Enter equipment name" />
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500" for="type">
                                Equipment Type
                            </label>
                            <div class="relative">
                                <select id="type" name="type" required maxlength="50"
                                    class="dark:bg-peak_1 flex h-10 w-full items-center justify-between rounded-md border dark:border-none  px-3 py-2 text-sm">
                                    <option value="" disabled>Select equipment Type</option>

                                    <option value="fullbody">Full Body</option>
                                    <option value="chest">Chest</option>
                                    <option value="back">Back</option>
                                    <option value="shoulders">Shoulders</option>
                                    <option value="arms">Arms</option>
                                    <option value="legs">Legs</option>
                                    <option value="core">Core</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="details" name="details">
                            Details
                        </label>
                        <textarea
                            class="dark:bg-peak_1 flex min-h-[80px] w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                            name="details" id="details" required maxlength="300" placeholder="Enter equipment details"
                            rows="4"></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="extra-details" name="extra_details">
                            Extra Details
                        </label>
                        <textarea
                            class="dark:bg-peak_1 flex min-h-[80px] w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                            name="extra_details" id="extra_details" maxlength="300"
                            placeholder="Enter any additional details" rows="4"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-500">Upload Images</label>
                        <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full"
                            accept="image/*">
                        <small class="text-gray-500">You can upload up to 3 images.</small>
                    </div>

                    <button
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors  h-10 px-4 py-2 w-full"
                        type="submit">
                        Add Equipment
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>