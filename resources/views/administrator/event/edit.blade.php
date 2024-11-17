<div style="display: none;" x-show="Editmodal === {{$event->id}}"
    class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] sm:w-[80%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-2 sm:p-3 md:p-4"
    x-show="Editmodal === {{$event->id}}" @click.away="Editmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">

    <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="mt-50 p-2 sm:p-3 md:p-4">
            <div class="flex flex-col space-y-1.5 px-3 sm:px-4 md:px-6">
                <h3 class="whitespace-nowrap tracking-tight text-xl sm:text-2xl font-bold dark:text-white">Edit Event
                </h3>
                <p class="text-sm text-gray-500">What is this new event?</p>
            </div>

            <div class="p-3 sm:p-4 md:p-6 text-black dark:text-white">
                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-500">Event Name:</label>
                        <input type="text" id="name" name="name"
                            class="dark:bg-peak_1 w-full p-2 border dark:border-none border-gray-300 rounded"
                            value="{{ old('name', $event->name) }}" required maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-500">Location:</label>
                        <input type="text" id="location" name="location"
                            class="dark:bg-peak_1 w-full p-2 border dark:border-none border-gray-300 rounded"
                            value="{{ old('location', $event->location) }}" required maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="details" class="block text-gray-500">Details:</label>
                        <textarea id="details" name="details"
                            class="dark:bg-peak_1 w-full p-2 border dark:border-none border-gray-300 rounded" rows="4"
                            required maxlength="300">{{ old('details', $event->details) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-gray-500">Date:</label>
                        <input type="date" id="date" name="date"
                            class="dark:bg-peak_1 w-full p-2 border dark:border-none border-gray-300 rounded"
                            value="{{ old('date', $event->date) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="time" class="block text-gray-500">Time:</label>
                        <input type="time" id="time" name="time"
                            class="dark:bg-peak_1 w-full p-2 border dark:border-none border-gray-300 rounded"
                            value="{{ old('time', $event->time) }}" required>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Event</button>
                </form>
            </div>
        </div>
    </div>
</div>