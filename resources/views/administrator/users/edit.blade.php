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
            <div class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class=" mt-50 p-4">
                    <div class="flex flex-col space-y-1.5 px-6">
                        <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">Revise User Details</h3>
                    </div>
                    <div class="p-6">
                        <x-custom.alert-success>Edit Success!</x-custom.alert-success>
                        <form method="POST" action="{{ route('users.update', $user->id) }}" class="ml-2" onsubmit="successAlert()">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-2">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="name">
                                            Name
                                        </label>
                                        <input
                                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            type="text" name="name" value="{{ $user->name }}" required />
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="name">
                                            Email
                                        </label>
                                        <input
                                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            type="email" name="email" value="{{ $user->email }}" required />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                            Password
                                        </label>
                                        <input
                                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            type="password" name="confirm-password" placeholder="••••••••" />
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="name">
                                            Confirm Password
                                        </label>
                                        <input
                                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                            type="password" name="confirm-password" placeholder="Confirm Password" />
                                    </div>
                                    <div class="space-y-2" class="form-group">
                                        <label
                                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                            for="type">
                                            Choose a Role for this user
                                        </label>
                                        <div class="relative">
                                            <select name="roles[]"
                                                class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
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
                                    type="submit">
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