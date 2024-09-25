<section class="relative min-h-screen w-full  dark:border-white/10 dark:text-tint_1 text-shade_9">
    <div class="inset-0 flex flex-col items-center justify-center px-4 pt-40 text-center">
        <div>
            <h1 class="text-tint_1 text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl">
                Elevate Your Fitness Journey
            </h1>
            <p class="text-tint_1 max-w-[900px] md:text-xl lg:text-base xl:text-xl">
                Our gym reservation system makes it easy to book your sessions, manage your membership, and
                stay on top of your fitness goals.
            </p>
        </div>
        <div class="container px-4 md:px-6 m-auto">
            <div class="mx-auto grid max-w-5xl gap-6 pt-10 pb-6 lg:grid-cols-3 lg:gap-12">
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2 group transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        viewBox="0 0 48 48" id="In-Home-Mode--Streamline-Outlined----Material-Symbols">
                        <path class="text-main" fill="currentColor"
                            d="M8 40.0002V20.0002L3.8 23.2002L2 20.8002L24 3.9502L46 20.8002L44.2 23.2002L24 7.7502L11 17.7002V37.0002H20.6V40.0002H8ZM30.55 44.0002L22.8 36.2502L24.9 34.1002L30.55 39.8002L41.9 28.5002L44 30.6002L30.55 44.0002Z"
                            stroke-width="1"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Easy Booking</h3>
                    <p class="text-tint_1">Reserve your spot in your favorite classes with just a few clicks.</p>
                </div>
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path
                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"
                            class="text-main " fill="currentColor" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"
                            class="text-main " fill="currentColor" />
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Class Schedules</h3>
                    <p class="text-tint_1">Stay up-to-date with the latest class schedules and availability.</p>
                </div>
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"
                            class="text-main " fill="currentColor" />
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Member Management</h3>
                    <p class="text-tint_1">Easily manage your membership details and billing information.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center space-x-2 my-5">
        <x-custom.primary-button class="dark:hover:text-white" type="button" onclick="window.location.href = '{{ route('ticket.show') }}'">
            Book Now
        </x-custom.primary-button>
        <x-custom.primary-button type="button" onclick="window.location.href = '#equipment-section'" :active="request()->routeIs('reservation')"
            class="px-20 space-x-1 border border-main/20 text-white dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                <path fill-rule="evenodd"
                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
            </svg>
            <p>Learn More</p>
        </x-custom.primary-button>
    </div>
</section>

    <section class="bg-black py-12 md:py-20 ">
        <div class="flex flex-col px-10 mb-8 text-left md:mb-12 text-white">
            <h2 class="text-3xl font-bold  mb-2">We Provide</h2>
            <p class="text-muted-foreground">Explore our wide range of equipment and rooms</p>
        </div>

        <div class="px-20">
            <div class="grid grid-cols-8 gap-1 p-10">
                <!-- First Row: X O X O X O X O -->
                <div class="col-span-1"></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="M2 4v16"></path>
                            <path d="M2 8h18a2 2 0 0 1 2 2v10"></path>
                            <path d="M2 17h20"></path>
                            <path d="M6 8v9"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Bedrooms</span>
                </div>


                <div class="col-span-1 "></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"></path>
                            <path d="M2 11v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H6v-2a2 2 0 0 0-4 0Z">
                            </path>
                            <path d="M4 18v2"></path>
                            <path d="M20 18v2"></path>
                            <path d="M12 4v9"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Lounges</span>
                </div>

                <div class="col-span-1"></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <rect width="20" height="15" x="2" y="7" rx="2" ry="2"></rect>
                            <polyline points="17 2 12 7 7 2"></polyline>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">TVs</span>
                </div>

                <div class="col-span-1"></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="M12 20h.01"></path>
                            <path d="M2 8.82a15 15 0 0 1 20 0"></path>
                            <path d="M5 12.859a10 10 0 0 1 14 0"></path>
                            <path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">WiFi</span>
                </div>


                <!-- Second Row: O X O X O X O ---------------------------------->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path
                                d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z">
                            </path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Fridges</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <rect width="20" height="15" x="2" y="4" rx="2"></rect>
                            <rect width="8" height="7" x="6" y="8" rx="1"></rect>
                            <path d="M18 8v7"></path>
                            <path d="M6 19v2"></path>
                            <path d="M18 19v2"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Microwaves</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Kettles</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="M10 2v2"></path>
                            <path d="M14 2v2"></path>
                            <path
                                d="M16 8a1 1 0 0 1 1 1v8a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V9a1 1 0 0 1 1-1h14a4 4 0 1 1 0 8h-1">
                            </path>
                            <path d="M6 2v2"></path>
                        </svg>
                    </button>
                    <span class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Coffee
                        Makers</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <!-- Third Row: X O X O X O X O -->
                <div class="col-span-1"></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path
                                d="M9 6 6.5 3.5a1.5 1.5 0 0 0-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5">
                            </path>
                            <line x1="10" x2="8" y1="5" y2="7"></line>
                            <line x1="2" x2="22" y1="12" y2="12"></line>
                            <line x1="7" x2="7" y1="19" y2="21"></line>
                            <line x1="17" x2="17" y1="19" y2="21"></line>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Bathrooms</span>
                </div>

                <div class="col-span-1"></div> <!-- X (empty space) -->
                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path d="m14 5-3 3 2 7 8-8-7-2Z"></path>
                            <path d="m14 5-3 3-3-3 3-3 3 3Z"></path>
                            <path d="M9.5 6.5 4 12l3 6"></path>
                            <path d="M3 22v-2c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2H3Z"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Desks</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <polyline points="3.5 2 6.5 12.5 18 12.5"></polyline>
                            <line x1="9.5" x2="5.5" y1="12.5" y2="20"></line>
                            <line x1="15" x2="18.5" y1="12.5" y2="20"></line>
                            <path d="M2.75 18a13 13 0 0 0 18.5 0"></path>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Chairs</span>
                </div>
                <div class="col-span-1"></div> <!-- X (empty space) -->

                <div class="flex flex-col items-center group  p-2 rounded">
                    <button
                        class="rounded-full transition-colors duration-300 p-4 mb-2 border-2 border-charcoalgray w-20 h-12 flex items-center justify-center group-hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-charcoalgray transition-colors duration-300 group-hover:text-white">
                            <path
                                d="M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z">
                            </path>
                            <path d="M6 18h12"></path>
                            <path d="M6 14h12"></path>
                            <rect width="12" height="12" x="6" y="10"></rect>
                        </svg>
                    </button>
                    <span
                        class="text-sm text-charcoalgray transition-colors duration-300 group-hover:text-white">Wardrobes</span>
                </div>
            </div>
        </div>




    </section>



</div>