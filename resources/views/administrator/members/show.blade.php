<section>
    <div style="display: none;" x-show="openshowmodal === {{ $member->id }}"
        @click="if ($event.target === $el) openshowmodal = null"
        class="fixed inset-0 bg-black opacity-50 z-40 select-none">
    </div>
    <div style="display: none;"
        class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-11/12 xl:w-4/5  p-4 z-50 "
        x-show="openshowmodal === {{ $member->id }}" @click="if ($event.target === $el) openshowmodal = null"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">
        <div class=" rounded w-full max-h-[90vh] overflow-y-auto">


            <div @click="if ($event.target === $el) openshowmodal = null"
                class="grid md:grid-cols-2 gap-6 lg:gap-12 items-start max-w-6xl px-4 mx-auto py-6">

                <div class="bg-white dark:bg-peak_2 rounded-lg p-6 grid gap-6">
                    <div class="bg-card rounded-lg p-6">
                        <div class="flex items-center gap-4">
                            <span class="relative flex shrink-0 overflow-hidden rounded-full h-16 w-16">
                                <img class="aspect-square h-full w-full" alt="@shadcn" src="/placeholder-user.jpg" />
                            </span>
                            <div class="grid gap-1">
                                <div class="text-xl font-bold dark:text-white">{{ $member->name }}</div>
                                <div class="text-sm text-gray-500">{{ $member->email ?? 'N/A'}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div class="bg-card rounded-lg p-6">
                            <div class="grid gap-2">
                                <h3 class="text-lg font-semibold text-gray-500">About Me</h3>
                                <p class=" dark:text-white">
                                    ----------------- ----------------- ----------------- -----------------
                                    ----------------- ----------------- -----------------

                                </p>
                            </div>
                        </div>
                        <div class="bg-card rounded-lg p-6 shadow-sm">
                            <div class="grid gap-2">
                                <h3 class="text-lg font-semibold text-gray-500">Additional Details</h3>
                                <p class="dark:text-white">
                                    ----------------- ----------------- ----------------- -----------------
                                    -----------------
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div @click="if ($event.target === $el) openshowmodal = null" class="grid gap-6">

                    <div class="bg-white dark:bg-peak_2 rounded-lg p-6 shadow-sm">
                        <div class="grid gap-4">
                            <h3 class="text-lg font-semibold dark:text-white">Personal Information</h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Facebook</div>
                                    <div class="dark:text-white">{{$member->fb ?? 'N/A'}}</div>
                                </div>
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Phone</div>
                                    <div class="dark:text-white">+{{$member->phone ?? 'N/A'}}</div>
                                </div>
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Membership Type</div>
                                    <div class="dark:text-white"> {{ $member->membership_type }}</div>


                                </div>
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Availability
                                    </div>
                                    <div class="dark:text-white">-- ---- ------ ----</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-peak_2 rounded-lg p-6 shadow-sm">
                        <div class="grid gap-4">
                            <h3 class="text-lg font-semibold dark:text-white">Subscription Details</h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Subscription Type
                                    </div>
                                    <div class="dark:text-white">------</div>
                                </div>
                                <div class="grid gap-1">
                                    <div class="text-sm font-medium text-gray-500">Start Date</div>
                                    <div class="dark:text-white">---------- --, -----</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</section>