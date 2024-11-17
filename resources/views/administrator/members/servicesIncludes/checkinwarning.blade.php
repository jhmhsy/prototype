<!-- Confirm Renew Modal -->
<div style="display:none;" x-show="showWarning" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="showWarning = false"></div>

<div style="display:none;" x-show="showWarning" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full mx-4" @click.away="showWarning = false">
        <h3 class="text-xl font-bold mb-4">Warning</h3>
        <p class="mb-4">This user has overdue subscriptions. Do you want to proceed with
            check-in?</p>
        <div class="flex justify-end space-x-4">
            <div>
                <button @click="showWarning = false, openservices = true"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                    Cancel
                </button>
            </div>
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