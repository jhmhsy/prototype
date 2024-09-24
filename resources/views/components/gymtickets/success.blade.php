<x-guest-layout>

    <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto py-12 px-4">
        <div class="grid md:grid-cols-1 border rounded-lg  mx-auto py-12 px-4">
            <div class="flex items-center gap-2">
                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div class="h-2 w-full bg-black dark:bg-white rounded-full"></div>
                </div>
                <span class="text-sm font-medium">Step 3 of 3</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Confirmation and QR Code</h1>
                <p class="text-basegray  pb-5">Thank you for your purchase. Here is your order summary and QR
                    code.
                </p>
            </div>
            <div class="dark:bg-darkmode_light space-y-6 border dark:border-none rounded-lg p-6">
                <div>
                    <h2 class="text-2xl font-bold">Thank You!</h2>
                    <p class="text-basegray">We appreciate your business and look forward to seeing you at the
                        gym.</p>
                </div>

                <div class="flex flex-col items-center gap-4">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <img src="/placeholder.svg" alt="QR Code" width="200" height="200"
                            style="aspect-ratio: 200 / 200; object-fit: cover;" class="w-full max-w-[200px]" />
                    </div>
                    <p class="text-basegray">Please show this QR code to the gym staff to redeem your tickets.</p>
                    <x-forms.reverse-nav-btn
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2">
                        Download QR Code
                    </x-forms.reverse-nav-btn>
                </div>
            </div>
        </div>

        <div class="space-y-6 p-6 border rounded-lg">
            <div>
                <h1 class="text-3xl font-bold">Order Summary</h1>
                <p class="text-basegray">Review the details of your ticket purchase.</p>
            </div>
            <div class="dark:bg-darkmode_light dark:border-none rounded-lg border text-card-foreground shadow-sm"
                data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Inf .

                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid gap-4">
                        <div class="flex items-center justify-between">
                            <span>Name</span>
                            <span>Jason Jason</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Email</span>
                            <span>Jason@gmail.com</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Tickets Purchased</span>
                            <span>2</span>
                        </div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full">
                        </div>
                        <div class="flex items-center justify-between font-medium">
                            <span>Total</span>
                            <span>$99.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>