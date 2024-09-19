<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="space-y-6">
        <h2 class="text-xl font-semibold text-gray-800">Are you a regular or a subscriber?</h2>
        <div class="flex space-x-4">
            <button id="regularButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Regular</button>
            <button id="subscriberButton" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Subscriber</button>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Schedule Your Reservation</h3>
            <form>
                <label class="block mb-2 text-gray-700">Date:</label>
                <input type="date" class="border border-gray-300 rounded w-full p-2 mb-4" required />
                <label class="block mb-2 text-gray-700">Time:</label>
                <input type="time" class="border border-gray-300 rounded w-full p-2 mb-4" required />
                <div class="flex justify-end">
                    <button type="button" id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Close</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const regularButton = document.getElementById('regularButton');
        const subscriberButton = document.getElementById('subscriberButton');
        const modal = document.getElementById('modal');
        const closeModal = document.getElementById('closeModal');
        regularButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
        subscriberButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
</body>