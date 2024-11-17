<div style="display: none;" x-show="Editmodal === {{$event->id}}"
    class="fixed select-none inset-0 bg-black/50 backdrop-blur-sm z-40">
</div>

<div style="display: none;"
    class="modal fixed w-[95%] sm:w-[85%] md:w-[70%] lg:w-[55%] xl:w-[40%] 2xl:w-[35%] top-[5%] sm:top-[10%] md:top-[50%] left-1/2 transform -translate-x-1/2 md:-translate-y-1/2 z-50"
    x-show="Editmodal === {{$event->id}}" @click.away="Editmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">

    <div class="bg-white dark:bg-peak_2 rounded-lg shadow-2xl ring-1 ring-black/5 dark:ring-white/10 w-full max-h-[90vh] sm:max-h-[85vh] overflow-y-auto"
        @click.stop>
        <!-- Header Section -->
        <div
            class="sticky top-0 bg-white dark:bg-peak_2 border-b dark:border-gray-700 px-4 sm:px-6 py-4 flex justify-between items-center">
            <div>
                <h3 class="text-xl sm:text-2xl font-semibold tracking-tight dark:text-white">Edit Event</h3>
                <p class="text-sm text-gray-500 mt-1">Update your event details below</p>
            </div>
            <button @click="Editmodal = null"
                class="rounded-full p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Form Section -->
        <div class="p-4 sm:p-6 space-y-6">
            <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event
                        Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full min-h-[2.75rem] px-3 py-2 text-base rounded-md border dark:bg-peak_1 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-shadow duration-200"
                        value="{{ old('name', $event->name) }}" required maxlength="50">
                </div>

                <div class="space-y-2">
                    <label for="location"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" id="location" name="location"
                        class="w-full min-h-[2.75rem] px-3 py-2 text-base rounded-md border dark:bg-peak_1 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-shadow duration-200"
                        value="{{ old('location', $event->location) }}" required maxlength="50">
                </div>

                <div class="space-y-2">
                    <label for="details"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Details</label>
                    <textarea id="details" name="details" rows="4"
                        class="w-full px-3 py-2 text-base rounded-md border dark:bg-peak_1 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-shadow duration-200 resize-y"
                        required maxlength="300">{{ old('details', $event->details) }}</textarea>
                    <p class="text-xs text-gray-500 text-right" x-data="{ count: 0 }"
                        x-init="count = $el.previousElementSibling.value.length">
                        <span x-text="count"></span>/300
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" id="date" name="date"
                            class="w-full min-h-[2.75rem] px-3 py-2 text-base rounded-md border dark:bg-peak_1 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-shadow duration-200"
                            value="{{ old('date', $event->date) }}" required>
                    </div>

                    <div class="space-y-2">
                        <label for="time"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Time</label>
                        <input type="time" id="time" name="time"
                            class="w-full min-h-[2.75rem] px-3 py-2 text-base rounded-md border dark:bg-peak_1 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-shadow duration-200"
                            value="{{ old('time', $event->time) }}" required>
                    </div>
                </div>

                <!-- Footer with Action Buttons -->
                <div
                    class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 space-y-3 space-y-reverse sm:space-y-0 pt-5">
                    <button type="button" @click="Editmodal = null"
                        class="w-full sm:w-auto px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-4 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>