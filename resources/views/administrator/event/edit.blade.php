<div style="display: none;" x-show="Editmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="Editmodal" @click.away="Editmodal = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90" @click.away="Editmodal = false">
    <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class=" mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold dark:text-white">New Event</h3>
                <p class="text-sm text-gray-500 ">What is this new event? </p>
            </div>
            <div class="p-6 text-black dark:text-white">
                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-500 ">Event Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}"
                            class="dark:bg-peak_1 w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-500 ">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $event->location) }}"
                            class="dark:bg-peak_1 w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required>
                    </div>

                    <div class="mb-4">
                        <label for="details" class="block text-sm font-medium text-gray-500 ">Details</label>
                        <textarea id="details" name="details" rows="4"
                            class="dark:bg-peak_1 w-full px-4 py-2 mt-1 border dark:border-none rounded-md "
                            required>{{ old('details', $event->details) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-500 ">Event Date</label>
                        <input type="date" id="date" name="date" value="{{ old('date', $event->date) }}"
                            class="dark:bg-peak_1 w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required>
                    </div>

                    <div class="mb-4">
                        <label for="time" class="block text-sm font-medium text-gray-500 ">Event Time</label>
                        <input type="time" id="time" name="time" value="{{ old('time', $event->time) }}"
                            class="dark:bg-peak_1 w-full px-4 py-2 mt-1 border dark:border-none rounded-md " required>
                    </div>

                    <button type="submit"
                        class="w-full group flex items-center px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                        Update Event
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>