@canany(['user-list', 'user-view', 'user-create', 'user-edit', 'user-delete'])
    <x-dash-layout title="Users">


        <div class="flex flex-col gap-4 rounded-lg border shadow-sm p-6  text-shade_9  
                                            border-shade_6/50 dark:border-white/5"
            x-data="{ openUserId: null, openshowmodal: null, opencreatemodal: null }">

            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold dark:text-white">Manage your Events</h1>
                    <div class="ml-auto flex items-center gap-2">
                        @can('user-create')
                            <button @click.prevent="opencreatemodal = !opencreatemodal"
                                class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1 border-white/50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-3.5 w-3.5 dark:text-white">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                                <span class="sr-only sm:not-sr-only dark:text-white">Create user</span>
                            </button>
                            @include ('administrator.users.create')
                        @endcan
                    </div>
                </div>


                <span class="text-sm text-gray-600 dark:text-gray-400" @if ($data->isEmpty()) style="display:
                none;" @endif>
                    Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
                </span>

                <!-- Pagination / search bar controls -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Pagination -->
                    <div>
                        {{ $data->links('vendor.pagination.custom-pagination') }}
                    </div>

                    <!-- Search bar -->
                    <form method="GET" action="{{ route('administrator.users') }}" class="mb-4">
                        <div class="relative">
                            <button type="submit"
                                class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span> <!-- For accessibility -->
                            </button>
                            <input type="text" name="search" value="{{ request('search') }}" maxlength="250"
                                placeholder="Search users..."
                                class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                        </div>
                    </form>
                </div>

            </div>

            <div class="rounded-lg" data-v0-t="card">
                <div class="p-2">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full text-sm mb-3">
                            <thead class="text-black dark:text-white">
                                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle">
                                        <a href="{{ route('administrator.users', ['sortBy' => 'id', 'sortDirection' => $sortBy === 'id' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                            class="{{ $sortBy === 'id' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                            ID
                                        </a>
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle">
                                        <a href="{{ route('administrator.users', ['sortBy' => 'name', 'sortDirection' => $sortBy === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                            class="{{ $sortBy === 'name' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                            Name
                                        </a>
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle">
                                        <a href="{{ route('administrator.users', ['sortBy' => 'email', 'sortDirection' => $sortBy === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                            class="{{ $sortBy === 'email' ? 'text-black dark:text-white' : 'text-gray-500' }}">
                                            Email
                                        </a>
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle">
                                        Roles

                                    </th>

                                    @canany(['user-view', 'user-edit', 'user-delete'])
                                        <th class="h-12 text-center align-middle font-medium">Actions</th>
                                    @endcanany
                                </tr>
                            </thead>


                            <tbody class="text-gray-600 dark:text-gray-400">
                                @foreach ($data as $key => $user)

                                    <tr
                                        class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                        <td class=" px-4 align-middle text-black dark:text-white">{{ ++$i }}.</td>
                                        <td class="px-4 align-middle font-medium">{{ $user->name }}</td>
                                        <td class="px-4 align-middle">{{ $user->email }}</td>
                                        <td class="px-4 align-middle">
                                            @if ($user->getRoleNames()->first() == 'Admin')
                                                <p class="text-green-500 font-bold ">Admin</p>
                                            @elseif ($user->getRoleNames()->first() == 'SuperAdmin')
                                                <p class="text-red-800 font-bold ">SuperAdmin</p>
                                            @elseif ($user->getRoleNames()->first() == 'Staff')
                                                <p class="text-yellow-700 font-bold ">Staff</p>
                                            @else
                                                <p class="text-black font-bold dark:text-white ">
                                                    {{ $user->getRoleNames()->first() }}
                                                </p>
                                            @endif
                                        </td>
                                        @canany(['user-view', 'user-edit', 'user-delete'])
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
                                                            @can('user-view')
                                                                <button
                                                                    @click.prevent="openshowmodal = openshowmodal === {{ $user->id }} ? null : {{ $user->id }}"
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

                                                            @can('user-edit')
                                                                @if ($user->hasRole('SuperAdmin') && $user->id == 1)
                                                                @else
                                                                    <button
                                                                        @click.prevent="openUserId = openUserId === {{ $user->id }} ? null : {{ $user->id }}"
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

                                                            @can('user-delete')
                                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                                    style="display:inline" class="hidden">
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
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endcanany
                                        @can('user-view')
                                            @include ('administrator.users.show')
                                        @endcan

                                        @can('user-edit')
                                            @include ('administrator.users.edit')
                                        @endcan

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </x-dash-layout>
@endcanany