<x-guest-layout>
    <form action="{{ route('ticket.store') }}" method="POST" x-data="{ step: 1 }">
        @csrf
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto py-12 px-4">
            <div x-show="step === 1">

                @include('components.gymtickets.selection')
            </div>

            <div x-show="step === 2" x-transition>
                @include('components.gymtickets.confirmation')
            </div>

            {{-- Payment Method --}}
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">

                <div x-data="{ paymentMethod: 'gcash' }" class="p-6 grid gap-6">
                    <div>
                        <h1 class="text-3xl font-bold">Payment Method</h1>
                        <p class="text-muted-foreground">Choose e mathod of your payment below.</p>
                    </div>
                    <div role="radiogroup" aria-required="false" dir="ltr" class="grid gap-4" tabindex="0"
                        style="outline: none;">

                        <label
                            :class="{'bg-green-400 text-white border-green-400': paymentMethod === 'paypal', 'bg-popover border-muted hover:bg-accent hover:text-accent-foreground': paymentMethod !== 'paypal'}"
                            class="cursor-pointer flex items-center gap-3 rounded-md border-2 p-4 transition-colors duration-300">

                            <input type="radio" name="paymentMethod" value="paypal"
                                class="sr-only appearance-none w-6 h-6 border-2 border-gray-400 checked:bg-green-400 checked:border-transparent focus:outline-none"
                                @click="paymentMethod = 'paypal'" :checked="paymentMethod === 'paypal'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-6 h-6">
                                <rect width="20" height="12" x="2" y="6" rx="2"></rect>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path d="M6 12h.01M18 12h.01"></path>
                            </svg>
                            Paypal
                        </label>


                        <label
                            :class="{'bg-green-400 text-white border-green-400': paymentMethod === 'gcash', 'bg-popover border-muted hover:bg-accent hover:text-accent-foreground': paymentMethod !== 'gcash'}"
                            class="cursor-pointer flex items-center gap-3 rounded-md border-2 p-4 transition-colors duration-300">

                            <input type="radio" name="paymentMethod" value="gcash"
                                class="sr-only appearance-none w-6 h-6 border-2 border-gray-400 checked:bg-green-400 checked:border-transparent focus:outline-none"
                                @click="paymentMethod = 'gcash'" :checked="paymentMethod === 'gcash'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-6 h-6">
                                <rect width="20" height="12" x="2" y="6" rx="2"></rect>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path d="M6 12h.01M18 12h.01"></path>
                            </svg>
                            Gcash
                        </label>
                    </div>


                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Extra tip:
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid gap-4">
                                <div class="flex items-center justify-between">
                                    <ul>
                                        <li>∎Each <strong>ticket</strong> is equivalent to a <strong>full-day</strong>
                                            complimentary pass to the gym. </li>
                                        <li>∎<strong>After purchasing</strong>
                                            , please proceed to the gym front desk and present
                                            the <strong>code</strong> provided here to claim your tickets.</li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
</x-guest-layout>