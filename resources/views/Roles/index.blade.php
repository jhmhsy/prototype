@extends('layouts.dash')

@section('content')


<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text:black">
    <div class="flex flew-row space-between items-center justify-between mb-6">

        <div class="flex space-between">
            <div>
                <h1 class="text-2xl font-bold">Manage Roles</h1>

            </div>
        </div>



        @can('role-create')
        <div class="flex items-center justify-between">
            <a class="" href="{{ route('roles.create') }}">
                Create Roles
            </a>
        </div>
        @endcan
    </div>




    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
        @foreach ($roles as $key => $role)
        <div class="bg-card rounded-lg shadow-md p-6 dark:bg-darkmode_light">
            <div class="flex items-center justify-between mb-4">
                <div class="flex">
                    <h2 class="text-lg font-semibold">{{ ++$i }}. &nbsp;</h2>
                    <h2 class="text-lg font-semibold">{{ $role->name }}</h2>
                </div>



            </div>
            <p class="text-muted-foreground mb-6">this here is the role details .</p>
            <div class="flex justify-end gap-2">




                @can('role-edit')
                <a href="{{ route('roles.show',$role->id) }}"
                    class="inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none  border border-inpu h-9 rounded-md px-2">
                    show
                </a>
                @endcan

                @can('role-delete')
                <a href="{{ route('roles.edit',$role->id) }}"
                    class="inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none  border border-inpu h-9 rounded-md px-2">
                    edit
                </a>
                @endcan

                @can('role-delete')
                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none border border-inpu h-9 rounded-md px-2">
                        Delete
                    </button>
                </form>

                @endcan
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection