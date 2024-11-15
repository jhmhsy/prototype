<!-- Delete user Modal -->
<div style="display:none;" x-show="opendelete" class="fixed inset-0 bg-black opacity-50 z-40"
    @click="opendelete = false"></div>
<div style="display:none;" x-show="opendelete" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50  " @click.stop>
    <div class="bg-card bg-white dark:bg-peak_2 rounded-lg shadow-lg max-w-sm w-full mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold dark:text-white">Confirmation</h2>
        </div>
        <p class="text-muted-foreground mb-6 text-gray-500">Please confirm that you want to <span
                class="text-red-500">"DELETE"</span> this Member
            ( <span class="text-black">{{$member->name}}</span> ), along
            with all their current subscriptions and subscription history.
        </p>

        <div class="flex justify-end space-x-4">
            <button
                class="bg-black text-white hover:bg-black/80 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2"
                @click="opendelete=false">
                Cancel
            </button>

            <form method="POST" action="{{ route('members.destroy', $member->id) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded w-24 focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Confirm
                </button>
            </form>
        </div>


    </div>
</div>