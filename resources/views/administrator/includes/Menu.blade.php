@extends('layouts.dash')
@section('content')

<div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
    </div>
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
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
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Recent
                Orders</h3>
            <p class="text-sm text-muted-foreground">View and manage your recent orders.</p>
        </div>
        <div class="p-6">
            <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm">
                    <thead class="[&amp;_tr]:border-b">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
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
                    <tbody class="[&amp;_tr:last-child]:border-0">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                INV001</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                    data-v0-t="badge">
                                    Paid
                                </div>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Credit Card
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                $250.00</td>
                        </tr>
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                INV002</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground"
                                    data-v0-t="badge">
                                    Pending
                                </div>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">PayPal</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                $150.00</td>
                        </tr>
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                INV003</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground"
                                    data-v0-t="badge">
                                    Unpaid
                                </div>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Bank Transfer
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                $350.00</td>
                        </tr>
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                INV004</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                    data-v0-t="badge">
                                    Paid
                                </div>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">Credit Card
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                                $450.00</td>
                        </tr>
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                INV005</td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
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
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Upcoming
                Events</h3>
            <p class="text-sm text-muted-foreground">Stay up-to-date with your upcoming events.</p>
        </div>
        <div class="p-6">
            <div class="grid gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-muted rounded-full w-12 h-12 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-muted-foreground">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-muted-foreground">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-6 h-6 text-muted-foreground">
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
@endsection