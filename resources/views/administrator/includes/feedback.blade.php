@extends('layouts.dash')
@section('content')
<div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 border-shade_6/50 dark:border-white/5"
    data-v0-t="card">
    <h1 class="text-2xl font-bold mb-6">Feedback</h1>

    <section class="flex flex-col">
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Total Feedback
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold">{{ $totalFeedback}}</div>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Positive
                            Feedback
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold">{{ $positiveTotal}}</div>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Negative
                            Feedback
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold">{{ $negativeTotal}}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                <div class="w-full rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Monthly
                            Feedback
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold">{{ $monthlyTotal}}</div>
                    </div>
                </div>
                <div class="w-full rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Yearly
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
@endsection