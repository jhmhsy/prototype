<div style="display: none;" x-show="openeditmodal === {{ $role->id }}"
    @click="if ($event.target === $el) openeditmodal = null" class="fixed inset-0 bg-black opacity-50 z-40 select-none">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="openeditmodal === {{ $role->id }}" @click="if ($event.target === $el) openeditmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <div @click.stop class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="bg-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="container mx-auto max-w-2xl px-4 py-8">
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <h1 class="text-2xl font-bold">Edit Roles</h1>
                        <p class="text-muted-foreground">Current role: {{ $role->name }}</p><br>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="role-name">
                                    Role Name
                                </label>
                                <input type="text" name="name" placeholder="Name"
                                    class="flex h-10 w-full text-black rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    value="{{ $role->name }}">




                            </div>
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium">Permissions</h3>
                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                                    @foreach($permissions as $permission)
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center gap-3">
                                            <label
                                                class="select-none flex items-center text-sm font-medium leading-none cursor-pointer ">
                                                <input type="checkbox" name="permission[{{ $permission->id }}]"
                                                    value="{{ $permission->id }}" class="name"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <span class="ml-2">{{ $permission->name }}</span>
                                                <!-- Add spacing for the label -->
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                        <div class="w-full flex flex-row justify-end">
                            <button
                                class="inline-flex items-center text-black justify-end rounded-md text-sm bg-blue-400 hover:bg-blue-700 h-10 px-4 py-2">
                                Save Changes
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>