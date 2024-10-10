<x-guest-layout>

    <div class="grid md:grid-cols-1 gap-8 max-w-6xl mx-auto py-12 px-4 border rounded-lg">
        <div class="space-y-6">

            <div class="flex items-center gap-2">

                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div @click="step--" class="cursor-pointer h-2 w-2/3 bg-black dark:bg-white rounded-full"></div>
                </div>
                <span class="text-sm font-medium">Step 2 of 3</span>
            </div>

            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-bold">Payment</h1>
                    <p class="text-muted-foreground">Complete your ticket purchase by entering your payment information.
                    </p>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Ticket Details
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid gap-4">
                            <div class="flex items-center justify-between">
                                <span>Name</span>
                                <span x-text="name"></span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Quantity</span>
                                <span x-text="quantity"> </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Days Duration</span>
                                <div class="flex gap-1">
                                    <span x-text="quantity"></span>
                                    <span>days</span>
                                </div>

                            </div>
                            <div class="flex items-center justify-between">
                                <span>Ticket Price</span>
                                <div class="flex">
                                    <span>₱&nbsp;</span>
                                    <span x-text="cost"></span>
                                </div>
                            </div>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold">Total Amount</h2>

                    <div class="flex">
                        <p class="text-4xl font-bold">₱</p>
                        <p class="text-4xl font-bold" x-text="amount"></p>
                        <p class="text-4xl font-bold">.00</p>
                    </div>
                </div>

                <x-forms.reverse-nav-btn type="submit" class="cursor-pointer h-10 px-4 py-2 w-full">
                    Pay Now
                </x-forms.reverse-nav-btn>
            </div>
        </div>


    </div>

</x-guest-layout>