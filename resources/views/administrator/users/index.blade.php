<x-dash-layout>

    <div class="flex flex-col gap-4 rounded-lg border shadow-sm p-6  text-shade_9  
        border-shade_6/50 dark:border-white/5"
        x-data="{ openUserId: null, openshowmodal: null, opencreatemodal: null }">

        <div class="flex flex-row">
            <h1 class="text-lg font-bold mb-6 dark:text-white">Equipment Management</h1>
            <div class="ml-auto flex items-center gap-2">
                <button @click.prevent="opencreatemodal = !opencreatemodal"
                    class="hover:bg-green-400 focus:bg-green-500 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-3.5 w-3.5 dark:text-white">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <span class="sr-only sm:not-sr-only dark:text-white">New Reservation</span>
                </button>
                @include ("administrator.users.create")
            </div>
        </div>

        <div class="rounded-lg" data-v0-t="card">
            <div class="p-2">
                <div class="relative w-full overflow-auto">
                    <table class="w-full text-sm">
                        <thead class="text-black dark:text-white ">
                            <tr>
                                <th class="h-12 px-4 text-left align-middle">No.</th>
                                <th class="h-12 px-4 text-left align-middle">Name</th>
                                <th class="h-12 px-4 text-left align-middle">Email</th>
                                <th class="h-12 px-4 text-left align-middle">Roles</th>

                                <th class="h-12 px-4 text-left align-middle">Actions</th>
                            </tr>


                        </thead>

                        <tbody class="text-gray-600 dark:text-gray-400">
                            @foreach ($data as $key => $user)
                            <tr
                                class=" transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                <td class="px-4 align-middle text-black dark:text-white">{{ ++$i }}.</td>
                                <td class="px-4 align-middle font-medium">{{ $user->name }}</td>
                                <td class="px-4 align-middle">{{ $user->email }}</td>

                                <td class="px-4 align-middle">
                                    @if ($user->getRoleNames()->first() == "Admin")
                                    <p class="text-green-500 font-bold ">Admin</p>
                                    @elseif ($user->getRoleNames()->first() == "SuperAdmin")
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
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </x-custom.anchor-link>
                                        @include ("administrator.users.show")

                                        <x-custom.anchor-link
                                            @click.prevent="openUserId = openUserId === {{ $user->id }} ? null : {{ $user->id }}"
                                            class="bg-main hover:bg-shade_2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </x-custom.anchor-link>
                                        @include ("administrator.users.edit")

                                        @can('role-delete')
                                        @php
                                        // Generate a unique form ID based on the user ID
                                        $uniqueFormId = 'delete-user-' . $user->id;
                                        @endphp

                                        @if($user->hasRole('SuperAdmin'))
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


                                        <!-- Edit Form -->

                                        <!-- End of Edit Form -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $data->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>

</x-dash-layout>