@canany(['feedback-list'])
    <x-dash-layout title="Feedback">
        <div class="rounded-lg border shadow-sm p-6  text-shade_9  
        border-shade_6/50 dark:border-white/5" data-v0-t="card">
            <h1 class="text-lg font-bold mb-6 dark:text-white">Equipment Management</h1>

            <section class="flex flex-col">
                <div class="grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="rounded-lg   shadow-sm bg-white dark:text-white dark:bg-peak_2" data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="whitespace-nowrap text-2xl font-semibold  ">Total
                                    Feedback
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="text-4xl font-bold">{{ $totalFeedback}}</div>
                            </div>
                        </div>
                        <div class="rounded-lg   shadow-sm bg-white dark:text-white dark:bg-peak_2 " data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="whitespace-nowrap text-2xl font-semibold  ">Positive
                                    Feedback
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="text-4xl font-bold">{{ $positiveTotal}}</div>
                            </div>
                        </div>
                        <div class="rounded-lg   shadow-sm bg-white dark:text-white dark:bg-peak_2" data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="whitespace-nowrap text-2xl font-semibold  ">Negative
                                    Feedback
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="text-4xl font-bold">{{ $negativeTotal}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="w-full rounded-lg   shadow-sm bg-white dark:text-white dark:bg-peak_2" data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="whitespace-nowrap text-2xl font-semibold  ">Monthly
                                    Feedback
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="text-4xl font-bold">{{ $monthlyTotal}}</div>
                            </div>
                        </div>
                        <div class="w-full rounded-lg   shadow-sm bg-white dark:text-white dark:bg-peak_2" data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="whitespace-nowrap text-2xl font-semibold  ">Yearly
                                    Feedback
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="text-4xl font-bold">{{ $yearlyTotal}}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </x-dash-layout>
@endcanany