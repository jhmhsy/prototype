@extends('layouts.dash')

@section('content')
<div class="w-full bg-background text-foreground ">
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="flex items-center gap-4 shadow-lg rounded-[10px] p-4 dark:bg-darkmode_light">
                <span class="relative flex shrink-0 overflow-hidden rounded-full h-16 w-16">
                    <img class="aspect-square object-cover w-full h-full" alt="User Avatar"
                        src="/images/profile/cat-face.jpg" />
                </span>
                <div class="grid gap-1">
                    <h2 class="text-2xl font-bold">John Doe</h2>
                    <p class="text-muted-foreground">Software Engineer</p>
                </div>
            </div>
            <div class="col-span-2  grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="space-y-2 shadow-lg rounded-[10px] p-4 dark:bg-darkmode_light">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Age:</span>
                        <span> (N/A)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Phone:</span>
                        <span>(N/A)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Roles:</span>

                        @if(count($user->getRoleNames()) > 0)
                        @foreach($user->getRoleNames() as $v)
                        <x-custom.input-label class="badge badge-success text-black">
                            {{ $v }}
                        </x-custom.input-label>
                        @endforeach
                        @else
                        <x-custom.input-label class="badge badge-secondary text-gray-500">
                            User
                        </x-custom.input-label>
                        @endif

                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Reservation:</span>
                        <span>start - end (N/A)</span>
                    </div>
                </div>
                <div class="space-y-2 shadow-lgrounded-[10px] p-4 dark:bg-darkmode_light">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Subscription:</span>
                        <span> (N/A)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Start Date:</span>
                        <span> (N/A)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">End Date:</span>
                        <span> (N/A)</span>
                    </div>
                </div>
            </div>
        </div>

        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full my-6">

        </div>

        <div class="space-y-4 shadow-lg rounded-[10px] p-4 dark:bg-darkmode_light">
            <h3 class="text-xl font-bold">About Me</h3>
            <p class="text-muted-foreground">
                (N/A)
            </p>
        </div>
    </div>
</div>
@endsection