@extends('layouts.dash')
@section('content')

<div class="rounded-lg border text-shade_9 dark:text-tint_1 border-shade_6/50 dark:border-white/5 text-card-foreground shadow-sm p-6"
    data-v0-t="card">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">User List</h1>
        <div class="flex items-center gap-4">
            <input
                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 max-w-md"
                placeholder="Search users..." type="text" value="" />
        </div>
    </div>
    <div class="overflow-x-auto">
        {{--
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-muted text-muted-foreground">
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Last Name</th>
                    <th class="px-4 py-3 text-left">Membership Type</th>
                    <th class="px-4 py-3 text-left">Contact Number</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                <tr class="border-b">
                    <td class="px-4 py-3">{{$user->first_name}}</td>
        <td class="px-4 py-3">{{$user->last_name}}</td>
        <td class="px-4 py-3">{{$user->membership}}</td>
        <td class="px-4 py-3">{{$user->contact_number}}</td>
        <td class="px-4 py-3">{{$user->email}}</td>
        <td class="px-4 py-3">{{$user->role}}</td>
        <td class="px-4 py-3 text-right">
            <div class="flex items-center justify-end gap-2"></div>
        </td>
        </tr>
        @endforeach
        {{$users->links()}}

        </tbody>
        </table>
        --}}
    </div>
</div>
@endsection