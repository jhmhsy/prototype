<x-guest-layout>

    <div x-show="openModal === 'modal3'" @click="openModal = null" style="display: none;"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center" x-transition>
        <div @click.stop class="bg-white p-5 rounded shadow-lg">
            <h2 class="text-lg font-bold">Modal 3 Title</h2>
            <p>This is the content of Modal 3.</p>
            <button @click="openModal = null" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</x-guest-layout>