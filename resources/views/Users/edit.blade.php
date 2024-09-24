@extends('layouts.dash')
@section('content')
    <div class="w-full bg-background text-foreground">
        <div class="container mx-auto sm:px-6 lg:px-8 space-y-3">
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
                <h1 class="text-2xl font-bold ">Change Password</h1>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-shade_6/50 dark:border-white/5"
                    data-v0-t="card">
                    <div class="p-6 space-y-3">
                        <div class="flex flex-col md:flex-row md:space-x-4">
                            <div class="flex-1 space-y-2">
                                <label class="text-sm font-medium leading-none">Name</label>
                                <input
                                    class="flex h-10 w-full rounded-md border border-input bg-tint_3 dark:bg-tint_8 px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50"
                                    type="text" name="name" placeholder="{{ $user->name }}">
                            </div>
                            <div class="flex-1 space-y-2">
                                <label class="text-sm font-medium leading-none">Email</label>
                                <input
                                    class="flex h-10 w-full rounded-md border border-input bg-tint_3 dark:bg-tint_8 px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50"
                                    type="email" name="email" placeholder="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row md:space-x-4">
                            <div class="flex-1 space-y-2">
                                <label class="text-sm font-medium leading-none" for="password">Password</label>
                                <input
                                    class="flex h-10 w-full rounded-md border border-input bg-tint_3 dark:bg-tint_8 px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50"
                                    type="password" name="password" id="password" placeholder="Enter your new password" />
                            </div>
                            <div class="flex-1 space-y-2">
                                <label class="text-sm font-medium leading-none" for="confirmPassword">Confirm
                                    Password</label>
                                <input
                                    class="flex h-10 w-full rounded-md border border-input bg-tint_3 dark:bg-tint_8 px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50"
                                    type="password" name="confirm-password" placeholder="Confirm your new password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong><br>
                            <select name="roles[]"
                                class="flex h-10 w-full rounded-md border border-input bg-tint_3 dark:bg-tint_8 px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50">
                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <x-custom.primary-button>Confirm</x-custom.primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
