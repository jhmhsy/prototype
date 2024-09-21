@extends('layouts.dash')

@section('content')

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


<div class="bg-background p-6 rounded-lg shadow-lg">
    <div class="mb-6">
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <h2 class="text-2xl font-bold">Edit Role</h2>
        <p class="text-muted-foreground">Current role: {{ $role->name }}</p>
    </div>

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="grid gap-4">
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <input type="text" name="name" placeholder="Name"
                        class="form-control text-black dark:bg-darkmode_dark dark:text-white" value="{{ $role->name }}">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Permissions:
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid gap-1">

                        @foreach($permission as $value)
                        <div class="flex items-center gap-3">
                            <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}"
                                    class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                {{ $value->name }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('roles.index') }}"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>
@endsection