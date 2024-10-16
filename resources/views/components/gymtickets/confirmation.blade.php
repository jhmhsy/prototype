<x-guest-layout>

    <div
        class="grid md:grid-cols-1 gap-8 max-w-6xl mx-auto py-12 px-4 border dark:border-gray-600 rounded-lg bg-white dark:bg-black">
        <div class="space-y-6">

            <div class="flex items-center gap-2">

                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div @click="step--" class="cursor-pointer h-2 w-2/3 bg-black dark:bg-white rounded-full"></div>
                </div>
                <span class="text-sm font-medium text-gray-500">Step 2 of 3</span>
            </div>

            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-bold">Payment</h1>
                    <p class="text-gray-500">Complete your ticket purchase by entering your payment information.
                    </p>
                </div>
                <div class="rounded-lg border dark:border-gray-600 bg-020508 shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Ticket Details
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid gap-4">
                            <div class="flex items-center text-gray-500 justify-between">
                                <span>Name</span>
                                <span class="dark:text-white" x-text="name"></span>
                            </div>

                            <div class="flex items-center text-gray-500 justify-between">
                                <span>Quantity</span>
                                <span class="dark:text-white" x-text="quantity"> </span>
                            </div>
                            <div class="flex items-center text-gray-500 justify-between">
                                <span>Days Duration</span>
                                <div class="flex gap-1 dark:text-white">
                                    <span x-text="quantity"></span>
                                    <span>days</span>
                                </div>

                            </div>
                            <div class="flex items-center text-gray-500 justify-between">
                                <span>Ticket Price</span>
                                <div class="flex dark:text-white">
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
                    <h2 class="text-2xl font-bold dark:text-gray-500">Total Amount</h2>

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