<x-guest-layout>
    <!-- <x-custom.loader2 /> -->

    <section class="dark:bg-black h-[100vh]">
        <form action="{{ route('payment.pay') }}" method="POST" x-data="{
step: 1,
fullname: '',
quantity: 1,
amount: 0,
cost: 50,
name: '',
email: '',
phone: '',
showError: false,
isValidEmail(email) {
const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
return re.test(String(email).toLowerCase());
}
}">
            @csrf
            <header class=" xl:absolute bg-background pt-4 ">
                <div class="container mx-auto flex items-center justify-between px-4 md:px-6">
                    <a href="{{ route('welcome') }}"
                        class="inline-flex h-8 items-center justify-center rounded-md border border-input bg-background 
                    px-4 text-sm font-medium shadow-sm transition-colors hover:bg-accent hover:text-accent-foreground 
                    focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mr-2 h-4 w-4">
                            <path d="m12 19-7-7 7-7"></path>
                            <path d="M19 12H5"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <div style="display:block;">
                    <x-custom.darkmode />
                </div>
            </header>



            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto py-12 px-4">


                <div x-show="step === 1">
                    @include('components.gymtickets.selection')
                </div>

                <div x-show="step === 2" x-transition>
                    @include('components.gymtickets.confirmation')
                </div>

                {{-- Payment Method --}}
                <div class="rounded-lg border dark:border-gray-600 dark:bg-black bg-white  shadow-sm">
                    <div x-data="{ paymentMethod: 'gcash' }" class="p-6 grid gap-6">
                        <div>
                            <h1 class="text-3xl font-bold">Payment Method</h1>
                            <p class="text-gray-500">
                                Choose a method of your payment below.
                            </p>
                        </div>
                        <div role="radiogroup" aria-required="false" dir="ltr" class="grid gap-4" tabindex="0"
                            style="outline: none">
                            <label
                                :class="{'bg-green-400 text-white border-green-400': paymentMethod === 'paypal', 'bg-popover': paymentMethod !== 'paypal'}"
                                class="cursor-pointer flex items-center gap-3 rounded-md border border-gray-500 p-4 transition-colors duration-300">
                                <input type="radio" name="paymentMethod" value="paypal"
                                    class="sr-only appearance-none w-6 h-6 border border-gray-400 checked:bg-green-400 checked:border-transparent focus:outline-none"
                                    @click="paymentMethod = 'paypal'" :checked="paymentMethod === 'paypal'" />
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
                                class="cursor-pointer flex items-center gap-3 rounded-md border border-gray-500 p-4 transition-colors duration-300">
                                <input type="radio" name="paymentMethod" value="gcash"
                                    class="sr-only appearance-none w-6 h-6 border-2 border-gray-400 checked:bg-green-400 checked:border-transparent focus:outline-none"
                                    @click="paymentMethod = 'gcash'" :checked="paymentMethod === 'gcash'" />
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

                        <div class="rounded-lg border border-gray-500  shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class=" text-2xl font-semibold text-black dark:text-gray-500">
                                    Extra tip:
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="grid gap-4">
                                    <div class="flex items-center justify-between text-black dark:text-gray-300">
                                        <ul>
                                            <li>
                                                ∎ Each <strong class=" dark:text-white">ticket</strong> is
                                                equivalent to a
                                                <strong class="dark:text-white">full-day</strong>
                                                complimentary pass to the gym.
                                            </li>
                                            <li>
                                                ∎ <strong class="dark:text-white">After purchasing</strong> ,
                                                please proceed to the gym front desk
                                                and present the
                                                <strong class="dark:text-white">code</strong> provided here
                                                to claim your tickets.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

</x-guest-layout>