<section>
    <!-- Modal Background -->
    <div style="display: none;" x-show="opencreatemodal" @click="if ($event.target === $el) opencreatemodal = null"
        class="fixed inset-0 bg-black opacity-50 z-40 select-none">
    </div>
    <!-- Modal Structure -->
    <div style="display: none;"
        class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
        x-show="opencreatemodal" @click="if ($event.target === $el) opencreatemodal = null"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">

        <div @click.stop class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="mt-50 p-4">
                <div class="flex flex-col space-y-1.5 px-6 text-center">
                    <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">Create New User</h3>
                </div>

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

                <div class="px-3 py-2">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-2">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium leading-none">Name</label>
                                    <input type="text" name="name" placeholder="Name" required
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                                    <x-custom.error :errors="$errors->get('name')" />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-medium leading-none">Email</label>
                                    <input type="email" name="email" placeholder="Enter Your Email" required
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                                    <x-custom.error :errors="$errors->get('email')" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium leading-none">Password</label>
                                    <input type="password" name="password" placeholder="••••••••"
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                                    <x-custom.error :errors="$errors->get('password')" />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-medium leading-none">Confirm Password</label>
                                    <input type="password" name="confirm-password" placeholder="Confirm Password"
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                                    <x-custom.error :errors="$errors->get('confirm-password')" />
                                </div>
                                <div class="space-y-2 mb-3">
                                    <label class="text-sm font-medium leading-none">Choose a Role for this User</label>
                                    <select name="roles[]"
                                        class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-shade_9 dark:placeholder-shade_9/50">
                                        @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button
                                class="bg-white text-black border-2 border-basegray rounded-md text-sm font-medium hover:bg-darkgray hover:text-white h-10 px-4 py-2 w-full"
                                type="submit">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
