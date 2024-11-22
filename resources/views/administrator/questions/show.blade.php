<div style="display: none;" x-show="viewmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="modal fixed admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="viewmodal === {{ $question->id}}" @click.away="viewmodal = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    @click.stop>

    <div class="bg-white dark:bg-peak_1 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="text-2xl font-bold dark:text-white">Question Details</h3>
                <p class="text-sm text-gray-500">Heres the full question details.</p>
            </div>
            <div class="p-6 text-black dark:text-white">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-500 ">Question</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('name', $question->question) }}</p>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-500 ">Answer</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('location', $question->answer) }}</p>
                </div>

                <div class="mb-4">
                    <label for="details" class="block text-sm font-medium text-gray-500 ">Extra Answer</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('details', $question->extra_answer) }}</p>
                </div>



                <button type="button"
                    class="w-full group flex items-center px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 dark:hover:bg-peak_3"
                    @click="viewmodal = false">
                    Close
                </button>

            </div>
        </div>
    </div>
</div>