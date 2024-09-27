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
                    <x-custom.create-button onclick="window.location.href='{{ route('roles.create') }}'">
                        Create Role
                    </x-custom.create-button>
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
                <div class="bg-tint_4 dark:bg-shade_3 rounded-lg shadow-md px-4 py-5 ">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex">
                            <h2 class="text-lg font-semibold">{{ $role->name }}</h2>
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 md:grid-cols-2 gap-2 text-xs">
                        @can('role-edit')
                            <x-custom.anchor-link href="{{ route('roles.show', $role->id) }}"
                                class="bg-main hover:bg-shade_2">
                                View
                            </x-custom.anchor-link>
                        @endcan

                        @can('role-edit')
                            <x-custom.anchor-link :href="route('roles.edit', $role->id)" class="bg-blue-500 hover:bg-blue-600">
                                Edit
                            </x-custom.anchor-link>
                        @endcan

                        @can('role-delete')
                            @if ($role->name == 'SuperAdmin')
                                <x-custom.pop-up :disabled="true" :name="'role'" :formId="'delete'">
                                </x-custom.pop-up>
                            @else
                                <x-custom.pop-up :name="'role'" :formId="'delete'">
                                </x-custom.pop-up>
                            @endif
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}"style="display:inline"
                                id="delete" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
