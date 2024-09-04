<div class="max-w-5xl mx-auto mt-20 p-6 bg-primary rounded-lg shadow-lg">
    <div class="space-y-4">
        <div class="text-center">
            <h2 class="text-2xl font-bold tracking-tight">Reserve Your Private Gym Room</h2>
        </div>
        <form class="grid gap-4">
            <div class="grid grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label for="room-type" class="text-sm font-medium">
                        Room Type
                    </label>
                    <button type="button" role="combobox" aria-controls="radix-:r16:" aria-expanded="false"
                        aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                        class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-primary px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <span style="pointer-events: none;">Select room type</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down h-4 w-4 opacity-50" aria-hidden="true">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <sel ect aria-hidden="true" tabindex="-1"
                        style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                        <option value=""></option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </sel>
                </div>
                <div class="space-y-1.5">
                    <label for="duration" class="text-sm font-medium">
                        Reservation Duration
                    </label>
                    <button type="button" role="combobox" aria-controls="radix-:r17:" aria-expanded="false"
                        aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                        class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <span style="pointer-events: none;">Select duration</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down h-4 w-4 opacity-50" aria-hidden="true">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <select aria-hidden="true" tabindex="-1"
                        style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                        <option value=""></option>
                        <option value="1-day">1 Day</option>
                        <option value="3-days">3 Days</option>
                        <option value="1-week">1 Week</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label for="start-date" class="text-sm font-medium">
                        Reservation Start Date
                    </label>
                    <button
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full justify-start text-left font-normal"
                        type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r18:"
                        data-state="closed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mr-1 h-4 w-4 -translate-x-1">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                            <path d="M8 14h.01"></path>
                            <path d="M12 14h.01"></path>
                            <path d="M16 14h.01"></path>
                            <path d="M8 18h.01"></path>
                            <path d="M12 18h.01"></path>
                            <path d="M16 18h.01"></path>
                        </svg>
                        Pick a date
                    </button>
                </div>
            </div>

            <button
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-black text-primary hover:bg-secondary hover:text-black h-10 px-4 py-2 w-full"
                type="submit">
                Book Now
            </button>
        </form>
    </div>
</div>