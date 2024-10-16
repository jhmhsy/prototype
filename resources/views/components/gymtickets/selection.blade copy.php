<x-guest-layout>


    <div
        class="grid md:grid-cols-1 gap-8 max-w-6xl mx-auto py-12 px-4 border dark:border-gray-600 rounded-lg bg-white dark:bg-peak_2">
        <div class="space-y-6">
            {{-- progress bar--}}
            <div class="flex items-center gap-2">
                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div class="cursor-pointer h-2 w-1/3 bg-black dark:bg-white rounded-full"></div>
                </div>
                <span class="text-sm font-medium text-gray-500">Step 1 of 3</span>
            </div>

            <div>
                <h1 class="text-3xl font-bold">Select Tickets</h1>
                <p class="text-gray-500">Fill out the form below to choose your tickets.</p>
            </div>
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-gray-500" for="name">
                        Name
                    </label>
                    <input class="flex h-10 w-full rounded-md border dark:border-none  px-3 py-2 text-sm dark:bg-peak_1"
                        id="name" name="name" placeholder="Enter your name" x-model="name" />
                    <p style="display:none;" x-show="showError && !name" x-cloak class="error text-xs text-red-500">
                        Name is required.
                    </p>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-gray-500" for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email"
                        class="flex h-10 w-full rounded-md border dark:border-none  px-3 py-2 text-sm dark:bg-peak_1"
                        x-model="email" placeholder="Enter your email" />
                    <p style="display:none;" x-show="showError && !email" x-cloak class="error text-xs text-red-500">
                        Email is required.
                    </p>
                    <p style="display:none;" x-show="showError && email && !isValidEmail(email)" x-cloak
                        class="error text-xs text-red-500">
                        Please enter a valid email.
                    </p>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-gray-500" for="phone">
                        Phone No#
                    </label>
                    <input class="flex h-10 w-full rounded-md border dark:border-none  px-3 py-2 text-sm dark:bg-peak_1"
                        id="phone" name="phone" placeholder="63+ " type="tel" x-model="phone" maxlength="15"
                        @input="phone = phone.replace(/[^0-9]/g, '')">
                    <p style="display:none;" x-show="showError && !phone" x-cloak class="error text-xs text-red-500">
                        Phone number is required.
                    </p>
                </div>

                <div class="grid gap-2 w-full">
                    <div class="flex flex-col md:flex-row justify-between items-center w-full">
                        <div class="grid gap-2 w-full md:w-auto md:flex-1">
                            <label class="text-sm font-medium text-gray-500" for="quantity">
                                Quantity
                            </label>
                            <div class="quantity-input flex items-center gap-2">
                                <button
                                    class="bg-black hover:bg-blue-500 active:bg-blue-600 text-white inline-flex items-center justify-center text-sm font-medium h-10 w-20 rounded-md"
                                    @click.prevent="if (quantity > 1) quantity--;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                </button>
                                <input x-model="quantity"
                                    class="flex py-2 h-10 w-16 rounded-md border dark:border-none px-4 text-center text-sm font-medium dark:bg-peak_1"
                                    type="number" id="quantity" name="quantity" min="1" />
                                <button
                                    class="bg-black hover:bg-blue-500 active:bg-blue-600 text-white inline-flex items-center justify-center text-sm font-medium h-10 w-20 rounded-md"
                                    @click.prevent="quantity++;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="grid gap-2  w-full md:w-auto md:flex-1 mt-4 md:mt-0  justify-end items-center">
                            <label class="text-sm font-medium mr-2 text-gray-500">
                                Total Price
                            </label>
                            <div class="flex items-center gap-2">
                                <div class="text-2xl font-bold">₱&nbsp;</div>
                                <div class="text-2xl font-bold" x-text="(cost * quantity)"></div>

                            </div>
                        </div>
                    </div>


                    <input type="hidden" id="N/A" name="status" value="unclaimed" />
                    <x-forms.reverse-nav-btn @click="
                                showError = false;
                                if (!name || !email || !phone || !quantity || !isValidEmail(email)) {
                                    showError = true;
                                } else {
                                    amount = quantity * cost;
                                    step++;
                                }
                            " class="cursor-pointer h-10 px-4 py-2 w-full">
                        Continue to Payment
                    </x-forms.reverse-nav-btn>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>