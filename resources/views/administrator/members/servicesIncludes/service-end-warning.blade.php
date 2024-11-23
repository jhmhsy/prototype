<div style="display:none;" x-show="serviceendWarning" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="serviceendWarning = false"></div>

<div style="display:none;" x-show="serviceendWarning" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-white dark:bg-peak_2 p-6 rounded-lg shadow-xl max-w-md w-full mx-4"
        @click.away="serviceendWarning = false">
        <h3 class="text-xl font-bold mb-4">Important</h3>
        <p class="mb-4 text-gray-500">The service is currently ongoing. Would you like to proceed with ending it?</p>
        <div class="flex justify-end space-x-4">
            <div>
                <button @click="serviceendWarning = false, openservices = true"
                    class=" border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded ">
                    Cancel
                </button>
            </div>

            <form action="{{ route('services.end', $service->id) }}" method="POST" class="my-auto">
                @csrf
                <input type="hidden" name="force_checkin" value="1">
                <button type="submit"
                    onclick="this.disabled = true; this.innerText = 'Stopping ...'; this.form.submit();"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Proceed Anyway
                </button>

            </form>
        </div>
    </div>
</div>