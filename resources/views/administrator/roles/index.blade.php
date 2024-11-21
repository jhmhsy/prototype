@canany(['role-list', 'role-view', 'role-create', 'role-edit', 'role-delete'])
    <x-dash-layout title="Roles">
        <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text:black dark:text-gray-300"
            x-data="{ openeditmodal: null, openshowmodal: null, opencreatemodal: null }">

            <div class="flex flex-col gap-2">
                <div class="flex flex-row">
                    <h1 class="text-2xl font-bold mb-6">Role Management</h1>

                    <div class="ml-auto flex items-center gap-2">
                        @can('role-create')
                            <button @click.prevent="opencreatemodal = !opencreatemodal"
                                class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-3.5 w-3.5">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                                <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">New Roles</span>
                            </button>
                            @include('administrator.roles.create')
                        @endcan
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif


            </div>

            <div class="rounded-lg" data-v0-t="card">
                <div class="p-2">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full text-sm mb-3">
                            <thead class="text-black dark:text-white">
                                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle">ID</th>
                                    <th class="h-12 px-4 text-left align-middle">Name</th>

                                    @canany(['role-view', 'role-edit', 'role-delete'])
                                        <th class="h-12 text-center align-middle font-medium">Actions</th>
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 dark:text-gray-400">
                                @foreach ($roles as $key => $role)
                                    <tr
                                        class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                        <td class="px-4 align-middle text-black dark:text-white">{{ ++$i }}.</td>
                                        <td class="px-4 align-middle font-medium">{{ $role->name }}</td>




                                        @canany(['role-view', 'role-edit', 'role-delete'])
                                            <td class="px-4 align-middle">
                                                <div class="action-dropdown flex items-center justify-center">
                                                    <button
                                                        class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                                d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                        </svg>
                                                    </button>

                                                    <div
                                                        class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                        <div class="py-1">
                                                            @can('role-view')
                                                                <button
                                                                    @click.prevent="openshowmodal = openshowmodal === {{ $role->id }} ? null : {{ $role->id }}"
                                                                    class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                        class="w-4 h-4 mr-3">
                                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                        <circle cx="12" cy="12" r="3" />
                                                                    </svg>
                                                                    View
                                                                </button>

                                                            @endcan

                                                            @can('role-edit')
                                                                @if ($role->name == 'SuperAdmin' && $role->id == 1)
                                                                    <button disabled
                                                                        class="line-through  w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                            fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                                        </svg>
                                                                        Edit
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        @click.prevent="openeditmodal = openeditmodal === {{ $role->id }} ? null : {{ $role->id }}"
                                                                        class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                            fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                                        </svg>
                                                                        Edit
                                                                    </button>
                                                                @endif

                                                            @endcan

                                                            @can('role-delete')
                                                                @if ($role->name == 'SuperAdmin' && $role->id == 1)
                                                                    <button disabled
                                                                        class=" line-through w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                            class="w-4 h-4 mr-3">
                                                                            <path d="M3 6h18"></path>
                                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                        </svg>
                                                                        Delete
                                                                    </button>
                                                                @else
                                                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                                        class="inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button
                                                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round" class="w-4 h-4 mr-3">
                                                                                <path d="M3 6h18"></path>
                                                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                            </svg>
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endcan
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            @include('administrator.roles.show')
                                            @include('administrator.roles.edit')
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-dash-layout>
@endcanany