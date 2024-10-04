<x-dash-layout>
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text:black"
        x-data="{ openeditmodal: null, openshowmodal: null, opencreatemodal: null }">
        <div class="flex flex-row">

            <h1 class="text-2xl font-bold mb-6">User Management</h1>
            <div class="ml-auto flex items-center gap-2">
                <button @click.prevent="opencreatemodal = !opencreatemodal"
                    class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-3.5 w-3.5">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <span class="sr-only sm:not-sr-only sm:whitespace-nowrap ">New Roles</span>
                </button>
                @include ("administrator.roles.create")
            </div>
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
                    <x-custom.anchor-link
                        @click.prevent="openshowmodal = openshowmodal === {{ $role->id }} ? null : {{ $role->id }}"
                        class="bg-main hover:bg-shade_2">
                        View
                    </x-custom.anchor-link>
                    @include ("administrator.roles.show")
                    @endcan

                    @can('role-edit')
                    <x-custom.anchor-link
                        @click.prevent="openeditmodal = openeditmodal === {{ $role->id }} ? null : {{ $role->id }}"
                        class="bg-blue-500 hover:bg-blue-600">
                        Edit
                    </x-custom.anchor-link>
                    @include ("administrator.roles.edit")
                    @endcan

                    @can('role-delete')
                    @if ($role->name == 'SuperAdmin')
                    <x-custom.pop-up :disabled="true" :name="'role'" :formId="'delete-'.$role->id">
                    </x-custom.pop-up>
                    @else
                    <x-custom.pop-up :name="'role'" :formId="'delete-'.$role->id">
                    </x-custom.pop-up>
                    @endif

                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline"
                        id="delete-{{ $role->id }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endcan

                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-dash-layout>