@extends('layouts.dash')
@section('content')
    <div class="text-shade_9 dark:text-tint_1 border-shade_6/50 dark:border-white/5 flex flex-col space-y-3">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="border dark:border-white/30 border-shade_6/50 rounded-lg px-4 py-5 flex space-x-2 items-center">
                <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" class="text-main dark:text-tint_8" fill="currentColor" viewBox="0 0 640 512"><path  d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                <div>
                    <h1 class="text-sm">Total Users</h1>
                    <p class="text-2xl font-bold">{{ $users }}</p>
                </div>
            </div>
            <div class="border dark:border-white/30 border-shade_6/50  rounded-lg px-4 py-5 flex space-x-2 items-center">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="text-main dark:text-tint_8" fill="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z"/></svg>
                <div>
                    <h1 class="text-sm">Total Sales</h1>
                    <p class="text-xl font-bold">₱150,000</p>
                </div>
            </div>
            <div class="border dark:border-white/30 border-shade_6/50 rounded-lg px-4 py-5 flex space-x-2 items-center">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="text-main dark:text-tint_8" fill="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                <div>
                    <h1 class="text-sm">Total Reservations</h1>
                    <p class="text-xl font-bold">120</p>
                </div>
            </div>
            <div class="border dark:border-white/30 border-shade_6/50 rounded-lg px-4 py-5 flex space-x-2 items-center">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" class="text-main dark:text-tint_8" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16l-97.5 0c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8l97.5 0c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32L0 448c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-224c0-17.7-14.3-32-32-32l-64 0z"/></svg>
                <div>
                    <h1 class="text-sm">Positive Feedbacks</h1>
                    <p class="text-xl font-bold">69</p>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="rounded-lg border border-shade_6/50 dark:border-white/30 border-shade_6/50-white/5 bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Dashboard
                    </h3>
                    <p class="text-sm text-muted-foreground">Get an overview of your business performance.</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col items-start gap-2">
                            <div class="text-sm text-muted-foreground">Revenue</div>
                            <div class="text-2xl font-bold">$45,231.89</div>
                            <div class="text-xs text-muted-foreground">+20.1% from last month</div>
                        </div>
                        <div class="flex flex-col items-start gap-2">
                            <div class="text-sm text-muted-foreground">Subscriptions</div>
                            <div class="text-2xl font-bold">+2350</div>
                            <div class="text-xs text-muted-foreground">+180.1% from last month</div>
                        </div>
                        <div class="flex flex-col items-start gap-2">
                            <div class="text-sm text-muted-foreground">Sales</div>
                            <div class="text-2xl font-bold">+12,234</div>
                            <div class="text-xs text-muted-foreground">+19% from last month</div>
                        </div>
                        <div class="flex flex-col items-start gap-2">
                            <div class="text-sm text-muted-foreground">Active Now</div>
                            <div class="text-2xl font-bold">+573</div>
                            <div class="text-xs text-muted-foreground">+201 since last hour</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-lg border dark:border-white/30 border-shade_6/50 dark:border border-shade_6/50-white/5 bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Recent
                        Orders</h3>
                    <p class="text-sm text-muted-foreground">View and manage your recent orders.</p>
                </div>
                <div class="p-6">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full caption-bottom text-sm">
                            <thead class="[&amp;_tr]:border border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b">
                                <tr class="border border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                        Invoice
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                        Status
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                        Method
                                    </th>
                                    <th
                                        class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="[&amp;_tr:last-child]:border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-0">
                                <tr class="border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        INV001</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full dark:border-white/30-white/5 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Credit Card
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        $250.00</td>
                                </tr>
                                <tr class="border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        INV002</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground"
                                            data-v0-t="badge">
                                            Pending
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">PayPal</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        $150.00</td>
                                </tr>
                                <tr class="border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        INV003</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground"
                                            data-v0-t="badge">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Bank Transfer
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        $350.00</td>
                                </tr>
                                <tr class="border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        INV004</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full dark:border-white/30-white/5 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Credit Card
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        $450.00</td>
                                </tr>
                                <tr class="border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                        INV005</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                        <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full dark:border-white/30-white/5 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">PayPal</td>
                                    <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                        $550.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rounded-lg border  border-shade_6/50 dark:border dark:border-white/30 border-shade_6/50-white/5 bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Upcoming
                        Events</h3>
                    <p class="text-sm text-muted-foreground">Stay up-to-date with your upcoming events.</p>
                </div>
                <div class="p-6">
                    <div class="grid gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-muted rounded-full w-12 h-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-muted-foreground">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium">Company Retreat</div>
                                <div class="text-sm text-muted-foreground">August 15, 2023</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-muted rounded-full w-12 h-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-muted-foreground">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium">Product Launch</div>
                                <div class="text-sm text-muted-foreground">September 1, 2023</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-muted rounded-full w-12 h-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-muted-foreground">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
