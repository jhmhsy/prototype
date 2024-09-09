@extends('layouts.dash')
@section('content')

<div class="flex flex-col gap-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Role Management</h1>

        @can('role-create')
        <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create
            New Role</a>
        @endcan


    </div>

    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession


    <div class="rounded-lg border shadow-sm" data-v0-t="card">
        <div class="p-2">
            <div class="relative w-full overflow-auto">
                <table class="w-full text-sm">
                    <thead class="">
                        <tr class="border-b ">
                            <th class="h-12 px-4 text-left align-middle">
                                No.
                            <th class="h-12 px-4 text-left align-middle">
                                Name
                            </th>

                            <th class="h-12 px-4 text-left align-middle">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="border-0">
                        @foreach ($roles as $key => $role)
                        <tr class="border-b transition-colors hover:bg-muted/50 py-20">


                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ ++$i }}
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">{{ $role->name }}


                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="flex items-center gap-2">

                                    <a href="{{ route('roles.show',$role->id) }}"
                                        class="inline-flex items-center justify-center  rounded-md text-sm font-medium ring-offset-background  disabled:pointer-events-none h-1 w-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <span class="sr-only">Show</span>
                                    </a>

                                    @can('role-edit')
                                    <a href="{{ route('roles.edit',$role->id) }}"
                                        class="inline-flex items-center justify-center  rounded-md text-sm font-medium ring-offset-background  disabled:pointer-events-none h-1 w-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                            <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v10"></path>
                                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            <path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"></path>
                                        </svg>
                                        <span class="sr-only">Edit</span>
                                    </a>
                                    @endcan


                                    @can('role-delete')
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm
                                            font-medium ring-offset-background disabled:pointer-events-none h-1 w-10
                                            text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endcan


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    {!! $roles->links('pagination::bootstrap-5') !!}

                </table>
            </div>
        </div>
    </div>
</div>
@endsection