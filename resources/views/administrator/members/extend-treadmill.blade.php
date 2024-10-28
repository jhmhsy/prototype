<!-- Rent More Treadmill Modal -->
<div style="display:none;" x-show="extendTreadmill" class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>

<!-- Member Details Modal -->
<div style="display:none;" x-show="extendTreadmill" @click.away="extendTreadmill = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Extend Treadmill Duration</h3>
    <form action="{{ route('members.extendTreadmill', $member->id) }}" method="POST">
        @csrf
        <input hidden name="form_token" value="{{ session('form_token') }}">

        <div class="mb-4" x-data="{ treadmillStartDate: new Date().toISOString().slice(0, 10) }">
            <label for="treadmill_start_date">Treadmill Start Date:</label>
            <input type="date" name="treadmill_start_date" x-model="treadmillStartDate"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>


        <div class="mb-4">
            <label for="treadmill_months">How many months?</label>
            <input type="number" name="treadmill_months" min="1" max="12"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Extend
        </button>
    </form>
    <button @click="extendTreadmill = false, open = true"
        class="mt-4 w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
        Cancel
    </button>
</div>