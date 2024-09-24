@extends('layouts.dash')
@section('content')

<div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 border-shade_6/50 dark:border-white/5" data-v0-t="card">

    <h1 class="text-2xl font-bold mb-6">Events</h1>
    <div class="bg-background rounded-lg shadow-lg">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&amp;_tr]:border-b">
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <th
                            class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                            Event
                        </th>
                        <th
                            class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                            Details
                        </th>
                        <th
                            class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                            Date
                        </th>
                        <th
                            class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                            Time
                        </th>
                        <th
                            class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[120px]">
                            Actions
                        </th>
                    </tr>
                </thead>
                {{---
                <tbody class="[&amp;_tr:last-child]:border-0">
                    @foreach ($events as $event)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                            {{ Str::limit($event->title, 28, '...') }}
                </td>

                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                    {{ Str::limit($event->description, 50, '...') }}
                </td>

                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                    {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</td>

                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                    {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</td>

                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                    <div class="flex items-center justify-end gap-2">
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="h-4 w-4">
                                <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v10"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"></path>
                            </svg>
                        </button>
                    </div>

                </td>

                </tr>

                @endforeach


                {{$events->links()}}
                </tbody>
                ----}}
            </table>
        </div>
    </div>
</div>
@endsection