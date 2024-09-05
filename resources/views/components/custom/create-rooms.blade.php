<!-- Hidden button to open modal -->
<div class="text-textwhite dark:text-textblack dark:bg-darkmode_light">

    <button id="open-modal-btn" class="bg-blue-500 text-white px-4 py-2 rounded-md fixed bottom-10 right-20 z-50">
        Add Room</button>

    <!-- Modal  -->
    <div id="modal" class="modal fixed inset-0 bg-thirdy bg-opacity-50 flex items-center justify-center hidden">
        <div class="p-4 rounded-md w-1/3 text-textblack dark:text-white bg-white dark:bg-darkmode_light">
            <h3 class="text-lg font-semibold mb-4">Add Room</h3>
            <form id="room-form">
                <div class="mb-4">
                    <label for="room-name" class="block text-sm">Room Name</label>
                    <input id="room-name" name="room_name" type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg:white dark:bg-darkmode_light"
                        required>
                </div>
                <div class="mb-4">
                    <label for="room-description" class="block text-sm">Room Description</label>
                    <textarea id="room-description" name="room_description"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg:white dark:bg-darkmode_light"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="room-price" class="block text-sm">Room Price</label>
                    <input id="room-price" name="room_price" type="number"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white dark:bg-darkmode_light no-spinner"
                        required>


                </div>
                <div class="mb-4">
                    <label for="room-size" class="block text-sm">Room Size</label>
                    <input id="room-size" name="room_size" type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg:white dark:bg-darkmode_light"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button"
                        class="select-none modal-close bg-gray-500 text-textwhite px-4 py-2 rounded-md">Cancel</button>
                    <button class="select-none bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Save</button>
                </div>


            </form>
        </div>
    </div>
</div>