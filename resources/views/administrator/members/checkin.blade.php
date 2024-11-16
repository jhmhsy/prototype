<td class="px-6 py-4 whitespace-nowrap ">


    @if ($alreadyCheckedIn)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
            User has checked in
        </span>
    @elseif (!$member->hasActiveSubscription)
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
            No Active subscriptions
        </span>
    @else
        <!-- @php
                        $buttonClass = '';
                        foreach ($member->services as $service) {
                            if ($service->status === "Overdue") {
                                $buttonClass = "bg-red-500 hover:bg-red-600";
                                break;
                            } elseif ($service->status === "Due") {
                                $buttonClass = "bg-orange-500 hover:bg-orange-600";
                            }
                        }


                        if (!$buttonClass) {
                            $buttonClass = "bg-green-500 hover:bg-green-600"; // Class for active or default
                        }
                    @endphp -->

        <button @click="open = true"
            class="{{ $buttonClass }} text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
            Check-in
        </button>
    @endif
</td>

<!-- Warning Modal -->
<div how="showWarning" style="display: none;"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full mx-4" @click.away="showWarning = false">
        <h3 class="text-xl font-bold mb-4">Warning</h3>
        <p class="mb-4">This user has overdue subscriptions. Do you want to proceed with
            check-in?</p>
        <div class="flex justify-end space-x-4">
            <button @click="showWarning = false, openservices = true"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                Cancel
            </button>
            <form action="{{ route('checkin.store', $member) }}" method="POST">
                @csrf
                <input type="hidden" name="force_checkin" value="1">
                <button type="submit"
                    onclick="this.disabled = true; this.innerText = 'Checking in. . .'; this.form.submit();"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Proceed Anyway
                </button>

            </form>
        </div>
    </div>
</div>