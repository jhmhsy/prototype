@extends('layouts.dash')
@section('content')
    <div class="w-full bg-background text-foreground">
        <div class="container mx-auto space-y-3">
            <div class="flex items-center justify-between">
                <a class="inline-flex items-center gap-2 text-muted-foreground " href="{{ route('users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                    Back
                </a>
                <h1 class="text-2xl font-bold">User: {{ $user->id }}</h1>
            </div>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                <div class="col-span-1 flex items-center gap-4 shadow-lg rounded-[10px] p-4 bg-tint_4 dark:bg-shade_8">
                    <span class="relative flex shrink-0 overflow-hidden rounded-full h-16 w-16">
                        <img class="aspect-square object-cover w-full h-full" alt="User Avatar"
                            src="/images/profile/cat-face.jpg" />
                    </span>
                    <div class="grid gap-1">
                        <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                        <p class="text-muted-foreground">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="space-y-2 shadow-lg rounded-[10px] p-4 bg-tint_4 dark:bg-shade_8">
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

                        @if (count($user->getRoleNames()) > 0)
                            @foreach ($user->getRoleNames() as $v)
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
            </div>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                <div class="space-y-2 shadow-lg rounded-[10px] p-4 bg-tint_4 dark:bg-shade_8">
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
                <div class="space-y-4 shadow-lg rounded-[10px] p-4 bg-tint_4 dark:bg-shade_8">
                    <h3 class="text-xl font-bold">About Me</h3>
                    <p class="text-muted-foreground">
                        (N/A)
                    </p>
                </div>
            </div>
            
        </div>
    </div>
@endsection
