<x-guest-layout>



    <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto py-12 px-4">
        <div class="space-y-6">
            <div class="flex items-center gap-2">
                <div class="h-2 flex-1 bg-muted rounded-full">
                    <div class="h-2 w-full bg-black rounded-full"></div>
                </div>
                <span class="text-sm font-medium">Stage 3 of 3</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Confirmation and QR Code</h1>
                <p class="text-muted-foreground">Thank you for your purchase. Here is your order summary and QR code.
                </p>
            </div>
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold">Thank You!</h2>
                    <p>Thank you for your purchase. We appreciate your business and look forward to seeing you at the
                        gym.</p>
                </div>

                <div class="flex flex-col items-center gap-4">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <img src="/placeholder.svg" alt="QR Code" width="200" height="200"
                            style="aspect-ratio: 200 / 200; object-fit: cover;" class="w-full max-w-[200px]" />
                    </div>
                    <p>Please show this QR code to the gym staff to redeem your tickets.</p>
                    <button
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                        Download QR Code
                    </button>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <div>
                <h2 class="text-2xl font-bold">Order Summary</h2>
                <p class="text-muted-foreground">Review the details of your ticket purchase.</p>
            </div>
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Order Summary
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