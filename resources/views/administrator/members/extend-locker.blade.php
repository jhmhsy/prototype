<!-- Rent More Locker Modal -->
<div style="display: none;" x-show="rentLockerOpen" class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div x-show="rentLockerOpen" @click.away="rentLockerOpen = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">

    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Rent More Locker</h3>
    <form action="{{ route('members.rent-locker', $member->id) }}" method="POST">
        @csrf
        <input hidden name="form_token" value="{{ session('form_token') }}">
        <div class="mb-4">
            <label for="locker_no" class="block text-sm font-medium text-gray-700">Locker
                Number</label>
            <select id="locker_no" name="locker_no" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @php
                $allOccupied = true;
                $firstAvailable = null;

                // Find first available locker
                for ($i = 1; $i <= 21; $i++) { if (!in_array($i, $occupiedLockers)) { $firstAvailable=$i;
                    $allOccupied=false; break; } } @endphp @if ($allOccupied) <option value="" disabled selected>All
                    lockers are occupied</option>
                    @else
                    <option value="" disabled>Select a locker</option>
                    @endif

                    @for ($i = 1; $i <= 21; $i++) <option value="{{ $i }}"
                        {{ in_array($i, $occupiedLockers) ? 'disabled' : '' }}
                        {{ $i === $firstAvailable ? 'selected' : '' }}>
                        Locker No. {{ $i }}
                        {{ in_array($i, $occupiedLockers) ? '(Unavailable)' : '' }}
                        </option>
                        @endfor
            </select>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start
                Date</label>
            <input type="date" id="start_date" name="start_date" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">For How many Month</label>
            <input type="number" name="locker_month"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Rent Locker
        </button>
    </form>
    <button @click="rentLockerOpen = false, open = true"
        class="mt-4 w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
        Cancel
    </button>
</div>