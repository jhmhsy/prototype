<div style="display: none;" x-show="isOpen" class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90" @click.away="isOpen = false">
    <div class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class=" mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">New Event</h3>
                <p class="text-sm text-muted-foreground">What is this new event? </p>
            </div>
            <div class="p-6">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="form_token" value="{{ session('form_token') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="name">
                                Event Name
                            </label>
                            <input
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                type="text" name="name" id="name" required placeholder="e.g International party" />
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="type">
                                Location
                            </label>
                            <div class="relative">
                                <select id="location" name="location" required
                                    class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                    <option value="" disabled>Select Location</option>
                                    <option value="backdoor">Backdoor</option>
                                    <option value="studio">Studio</option>
                                    <option value="stage">Stage</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="details" name="details">
                            Details
                        </label>
                        <textarea
                            class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            name="details" id="details" required placeholder="We do party beitch" rows="4"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-shade_8 font-semibold mb-2">Date</label>
                        <input type="date" id="date" name="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="time" class="block text-shade_8 font-semibold mb-2">Time</label>
                        <select id="time" name="time"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3"
                            required>
                            <option value="" disabled selected>Select an hour</option>
                            <!-- Loop through 7 to 20 for full hours -->
                            @for ($i = 7; $i < 21; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">
                                    {{ $i > 12 ? $i - 12 : $i }} {{ $i >= 12 ? 'pm' : 'am' }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <button
                        class="bg-white text-black border-2 border-basegray rounded-md text-sm font-medium hover:bg-darkgray hover:text-white h-10 px-4 py-2 w-full"
                        type="submit">
                        Add Event
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>