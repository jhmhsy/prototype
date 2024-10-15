<x-dash-layout>
    <div class="flex flex-col gap-4 rounded-lg border shadow-sm p-6  text-shade_9  
        border-shade_6/50 dark:border-white/5"
        x-data="{ openUserId: null, openshowmodal: null, opencreatemodal: null }">

        <div class="flex flex-row">
            <h1 class="text-lg font-bold mb-6 dark:text-gray-300">User Management</h1>
            <div class="ml-auto flex items-center gap-2">
                <button @click.prevent="opencreatemodal = !opencreatemodal"
                    class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1 border-white/50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="h-3.5 w-3.5 dark:text-white">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <span class="sr-only sm:not-sr-only dark:text-white">Create user</span>
                </button>
                @include ('administrator.users.create')
            </div>
        </div>

        <div class="rounded-lg" data-v0-t="card">
            <div class="p-2">
                <div class="relative w-full overflow-auto">
                    <table class="w-full text-sm mb-3">
                        <thead class="text-black dark:text-white ">
                            <tr>
                                <th class="h-12 px-4 text-left align-middle">ID</th>
                                <th class="h-12 px-4 text-left align-middle">Name</th>
                                <th class="h-12 px-4 text-left align-middle">Email</th>
                                <th class="h-12 px-4 text-left align-middle">Roles</th>
                                <th class="h-12 px-4 text-left align-middle">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 dark:text-gray-400">
                            @foreach ($data as $key => $user)
                                <tr
                                    class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                    <td class="px-4 align-middle text-black dark:text-white">{{ ++$i }}.</td>
                                    <td class="px-4 align-middle font-medium">{{ $user->name }}</td>
                                    <td class="px-4 align-middle">{{ $user->email }}</td>
                                    <td class="px-4 align-middle">
                                        @if ($user->getRoleNames()->first() == 'Admin')
                                            <p class="text-green-500 font-bold ">Admin</p>
                                        @elseif ($user->getRoleNames()->first() == 'SuperAdmin')
                                            <p class="text-red-800 font-bold ">SuperAdmin</p>
                                        @else
                                            <p class="text-black font-bold dark:text-white ">
                                                {{ $user->getRoleNames()->first() }}</p>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="flex items-center gap-2">
                                            <x-custom.anchor-link
                                                @click.prevent="openshowmodal = openshowmodal === {{ $user->id }} ? null : {{ $user->id }}"
                                                class="bg-main hover:bg-shade_2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="h-4 w-4">
                                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </x-custom.anchor-link>
                                            @include ('administrator.users.show')

                                            @can('role-edit')
                                                @if ($user->hasRole('SuperAdmin') && $user->id == 1)
                                                    <button
                                                        class="bg-gray-400 text-white uppercase inline-flex items-center justify-center text-xs font-medium h-9 rounded-md px-2"
                                                        disabled>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-ban"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <x-custom.anchor-link
                                                        @click.prevent="openUserId = openUserId === {{ $user->id }} ? null : {{ $user->id }}"
                                                        class="bg-green-500 hover:bg-green-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pen"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                        </svg>
                                                    </x-custom.anchor-link>
                                                @endif
                                            @endcan

                                            @include ('administrator.users.edit')
                                            @can('role-delete')
                                                @php
                                                    // Generate a unique form ID based on the user ID
                                                    $uniqueFormId = 'delete-user-' . $user->id;
                                                @endphp

                                                @if ($user->hasRole('SuperAdmin') && $user->id == 1)
                                                    <x-custom.pop-up :disabled="true" :normal="false" :name="'user'"
                                                        :formId="$uniqueFormId">
                                                    </x-custom.pop-up>
                                                @else
                                                    <x-custom.pop-up :normal="false" :name="'user'" :formId="$uniqueFormId">
                                                    </x-custom.pop-up>
                                                @endif

                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                    style="display:inline" id="{{ $uniqueFormId }}" class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-1">
                        {{ $data->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dash-layout>
