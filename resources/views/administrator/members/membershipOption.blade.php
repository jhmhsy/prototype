<!-- Rent More Treadmill Modal -->
<div style="display:none;" x-show="membershipOption" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="membershipOption = false">
</div>

<!-- Member Details Modal -->
<div style="display:none;" x-show="membershipOption" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2"
    @click.stop>
    <div class="modal-content">

        <div class="flex gap-4 items-center mb-4">

            <div @click="membershipOption = true" class=" w-3 h-3 {{ $bgColor }} rounded-full"
                aria-label="{{ $status }} status" title="{{ $status }}" type="button">
            </div>
            <h2 class="text-lg font-semibold dark:text-white">Member Registration Status</h2>

        </div>
        <div class="mb-4">
            <p class="text-3xl font-bold  {{ $textColor }}">
                {{ $status }}
            </p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-500">Name</label>
            <p class="dark:text-white">{{ $member->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-500">Duration</label>
            <p class="dark:text-white">
                {{ \Carbon\Carbon::parse($member->membershipDuration->start_date)->format('M j, Y') }}
                -
                {{ \Carbon\Carbon::parse($member->membershipDuration->due_date)->format('M j, Y') }}
            </p>
        </div>
        <!-- Renew button -->
        <div>
            <div class="flex items-center justify-between">
                <button @click="renewConfirm = true; membershipOption = false"
                    class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded ">
                    Renew
                </button>
            </div>
        </div>



        <button @click="membershipOption = false"
            class="mt-4 w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
            Close
        </button>
    </div>


</div>


<!-- Confirm Renew Modal -->
<div style="display:none;" x-show="renewConfirm" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="renewConfirm = false"></div>
<div style="display:none;" x-show="renewConfirm" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-card bg-white dark:bg-peak_2 rounded-lg shadow-lg max-w-sm w-full mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold dark:text-white">Confirmation</h2>
        </div>
        <p class="text-muted-foreground mb-6 text-gray-500">Please select "Confirm" to renew this subscription.
        </p>
        </form>
        <div class="flex justify-end space-x-4">
            <button
                class="bg-black text-white hover:bg-black/80 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2"
                @click="renewConfirm=false, membershipOption=true">
                Cancel
            </button>

            <form action="{{ route('members.renew', $member) }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Confirm
                </button>
            </form>
        </div>


    </div>
</div>