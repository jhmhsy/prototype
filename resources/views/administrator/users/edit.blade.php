<section>
    <div style="display: none;" x-show="openUserId === {{ $user->id }}"
        @click="if ($event.target === $el) openUserId = null"
        class="fixed inset-0 bg-black opacity-50 z-40 select-none">
    </div>

    <div style="display: none;"
        class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
        x-show="openUserId === {{ $user->id }}" @click="if ($event.target === $el) openUserId = null"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">
        <div @click.stop class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
            <x-custom.alert-success>Edit Success</x-custom.alert-success>
            <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class=" mt-50 p-4">
                    <div class="flex flex-col space-y-1.5 px-6">
                        <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold dark:text-white">Revise User
                            Details</h3>
                    </div>
                    <div class="p-6 dark:text-white">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" class="ml-2">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-2">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-gray-500 text-sm font-medium " for="name">
                                            Name
                                        </label>
                                        <input class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input  "
                                            type="text" name="name" value="{{ $user->name }}" required maxlength="50" />
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-gray-500 text-sm font-medium " for="name">
                                            Email
                                        </label>
                                        <input class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input  "
                                            type="email" name="email" value="{{ $user->email }}" required
                                            maxlength="98" />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div class="space-y-2">
                                        <label class="text-gray-500 text-sm font-medium ">
                                            Password
                                        </label>
                                        <input class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input  "
                                            type="password" name="confirm-password" placeholder="••••••••"
                                            maxlength="64" />
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-gray-500 text-sm font-medium " for="name">
                                            Confirm Password
                                        </label>
                                        <input class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input  "
                                            type="password" name="confirm-password" placeholder="Confirm Password"
                                            maxlength="64" />
                                    </div>
                                    <div class="space-y-2" class="form-group">
                                        <label class="text-gray-500 text-sm font-medium " for="type">
                                            Choose a Role for this user
                                        </label>
                                        <div class="relative">
                                            <select name="roles[]"
                                                class="dark:bg-peak_1 flex h-10 w-full items-center justify-between rounded-md border border-input  px-3 py-2 text-sm">
                                                @foreach ($roles as $value => $label)
                                                                                            <option value="{{ $value }}" {{ $user->
                                                    hasRole($value) ? 'selected' : '' }}>
                                                                                                {{ $label }}
                                                                                            </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="bg-white text-black items-center justify-center border-2 border-basegray rounded-md text-sm font-medium hover:bg-darkgray hover:text-white h-10 px-4 py-2 w-full"
                                    type="submit" onclick="successAlert()">
                                    Confirm
                                </button>
                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</section>