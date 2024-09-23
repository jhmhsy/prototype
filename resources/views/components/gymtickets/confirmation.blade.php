<x-guest-layout>

    <div class="grid md:grid-cols- gap-8 max-w-6xl mx-auto py-12 px-4">
        <div class="space-y-6">

            <div class="flex items-center gap-2">

                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div @click="step--" class="cursor-pointer h-2 w-2/3 bg-black rounded-full"></div>
                </div>
                <span class="text-sm font-medium">Step 2 of 3</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Payment</h1>
                <p class="text-muted-foreground">Complete your ticket purchase by entering your payment information.</p>
            </div>
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold">Order Summary</h2>
                    <p class="text-muted-foreground">Review the details of your ticket purchase.</p>
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
                                <span>Jason Sullano</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Quantity</span>
                                <span>2</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Days Duration</span>
                                <span>2</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Ticket Price</span>
                                <span>$49.50</span>
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
                    <p class="text-4xl font-bold">$99.00</p>
                </div>

                <x-forms.reverse-nav-btn type="submit" class="cursor-pointer h-10 px-4 py-2 w-full">
                    Pay Now
                </x-forms.reverse-nav-btn>
            </div>
        </div>


    </div>

</x-guest-layout>