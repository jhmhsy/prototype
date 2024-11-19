<div style="display: none;" x-show="viewmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none; width: 450px;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="viewmodal === {{ $event->id}}" @click.away="viewmodal = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    @click.stop>

    <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">
        <button class="absolute top-0 right-0 m-4 text-gray-500" @click="createmodal = false">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>

        </button>
        <div class="mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="text-2xl font-bold dark:text-white">Event Details</h3>
                <p class="text-sm text-gray-500">Here are the details for this event:</p>
            </div>
            <div class="p-6 text-black dark:text-white">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-500 ">Event Name</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('name', $event->name) }}</p>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-500 ">Location</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('location', $event->location) }}</p>
                </div>

                <div class="mb-4">
                    <label for="details" class="block text-sm font-medium text-gray-500 ">Details</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('details', $event->details) }}</p>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-500 ">Event Date</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('date', $event->date) }}</p>
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-sm font-medium text-gray-500 ">Event Time</label>
                    <p class="w-full px-4 py-2 mt-1 ">{{ old('time', $event->time) }}</p>
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