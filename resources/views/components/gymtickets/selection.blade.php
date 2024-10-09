<x-guest-layout>

    <div class="grid md:grid-cols-1 gap-8 max-w-6xl mx-auto py-12 px-4 border rounded-lg">
        <div class="space-y-6">


            {{-- progress bar--}}
            <div class="flex items-center gap-2">
                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div class="cursor-pointer h-2 w-1/3 bg-black dark:bg-white rounded-full"></div>
                </div>
                <span class="text-sm font-medium">Step 1 of 3</span>
            </div>

            <div>
                <h1 class="text-3xl font-bold">Select Tickets</h1>
                <p class="text-muted-foreground">Fill out the form below to choose your tickets.</p>
            </div>
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="name">
                        Name
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="name" name="name" placeholder="Enter your name" />
                </div>
                <div class="grid gap-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="email">
                        Email
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="email" name="email" placeholder="Enter your email" type="email" />
                </div>
                <div class="grid gap-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="email">
                        Phone No#
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="phone" name="phone" placeholder="Enter your Phone No#" type="tel" />
                </div>
                <div class="grid gap-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="quantity">
                        Quantity
                    </label>

                    <select id="numberSelect" name="quantity"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="" disabled selected>ticket quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>


                <!-- status default temporary -->
                <input type="hidden" id="N/A" name="status" value="unclaimed" />


                <x-forms.reverse-nav-btn @click="step++" class="cursor-pointer h-10 px-4 py-2 w-full">
                    Continue to Payment
                </x-forms.reverse-nav-btn>
            </div>
        </div>
    </div>


</x-guest-layout>