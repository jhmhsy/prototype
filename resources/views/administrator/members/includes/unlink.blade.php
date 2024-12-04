<div style="display:none;" x-show="unlinkConfirm" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="unlinkConfirm = false"></div>
<div style="display:none;" x-show="unlinkConfirm" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 rounded-lg transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-card bg-white dark:bg-peak_2 rounded-lg shadow-lg max-w-sm w-full mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-red-500">Unlink QR Code</h2>
        </div>
        <p class="text-muted-foreground mb-6 text-gray-500">
            Are you sure you want to <span class="text-red-500">Unlink</span>
            the QR code <br>
            currently associated with this member?
        </p>

        <div class="flex justify-end space-x-4">
            <div>
                <button
                    class="bg-black text-white hover:bg-black/80 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2"
                    @click="unlinkConfirm=false, membershipOption=true">
                    Cancel
                </button>
            </div>

            <form action="{{ route('member.unlink', $member->id) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <!-- Assuming you're using a PUT request for the update -->

                <button type="submit"
                    class="bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Confirm
                </button>
            </form>


        </div>


    </div>
</div>