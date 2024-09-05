<!-- Hidden button to open modal -->
<div class="text-textwhite dark:text-textblack dark:bg-darkmode_light">
    <button id="open-modal-btn" @click="open = true"
        class="bg-blue-500 text-white px-4 py-2 rounded-md fixed bottom-10 right-20 z-50">
        Create Event
    </button>

    <!-- Modal -->

    <div id="modal" class="modal fixed inset-0 bg-thirdy bg-opacity-50 flex items-center justify-center hidden">
        <div class="p-4 rounded-md w-1/3 text-textblack dark:text-white bg-white dark:bg-darkmode_light">

            <h2 class="text-lg font-semibold mb-4">Create Event</h2>
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm text-textblack dark:text-textwhite">Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white dark:bg-darkmode_light"
                        placeholder="Event Title">
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm text-textblack dark:text-textwhite">Description</label>
                    <textarea name="description" id="description" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white dark:bg-darkmode_light"
                        placeholder="Event Description"></textarea>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm text-textblack dark:text-textwhite">Date</label>
                    <input type="date" name="date" id="date" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white dark:bg-darkmode_light">
                </div>
                <div class="mb-4">
                    <label for="time" class="block text-sm text-textblack dark:text-textwhite">Time</label>
                    <input type="time" name="time" id="time" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white dark:bg-darkmode_light">
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="open = false"
                        class="modal-close bg-gray-500 text-textwhite px-4 py-2 rounded-md">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Create
                        Event</button>
                </div>
            </form>
        </div>
    </div>
</div>