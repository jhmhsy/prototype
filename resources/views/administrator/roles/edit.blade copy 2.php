<div style="display: none;" x-show="openeditmodal === {{ $role->id }}"
    @click="if ($event.target === $el) openeditmodal = null" class="fixed inset-0 bg-black opacity-50 z-40 select-none">
</div>

<div style="display: none;"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[45%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="openeditmodal === {{ $role->id }}" @click="if ($event.target === $el) openeditmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <div @click.stop class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto"
        @click.stop>
        <div class="rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="container mx-auto max-w-2xl px-4 py-8">
                <form action="{{ route('roles.update', $role->id) }}" method="POST"
                    class="bg-white rounded-lg shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-6">Edit Roles</h2>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Current Role</label>
                            <input type="text" value="{{ $role->name }}"
                                class="border rounded px-3 py-2 w-full bg-gray-50" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}"
                                class="border rounded px-3 py-2 w-full">
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-4">Permissions</h3>

                            <div class="border rounded-lg max-h-[600px] overflow-y-auto">
                                <!-- Overview -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Overview</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="overview-list"
                                                {{ $role->hasPermissionTo('overview-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Overview List</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Check-in Management -->
                                <div class="ml-4 mb-4">
                                    <h5 class="text-sm font-medium text-gray-600 mb-2">Manage Members</h5>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'member-create')->first()->id }}"
                                                {{ $role->hasPermissionTo('member-create') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Create Member</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'member-list')->first()->id }}"
                                                {{ $role->hasPermissionTo('member-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Member List</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'member-edit')->first()->id }}"
                                                {{ $role->hasPermissionTo('member-edit') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Member Edit</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'member-membership-renew')->first()->id }}"
                                                {{ $role->hasPermissionTo('member-membership-renew') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Membership Renewal</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Member Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Member Management</h4>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Manage Members</h5>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="member-list"
                                                    {{ $role->hasPermissionTo('member-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Member List</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="member-edit"
                                                    {{ $role->hasPermissionTo('member-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Member Edit</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]"
                                                    value="member-membership-renew"
                                                    {{ $role->hasPermissionTo('member-membership-renew') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Membership Renewal</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Subscription Permissions</h5>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="subscription-create"
                                                    {{ $role->hasPermissionTo('subscription-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create Subscription</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="subscription-extend"
                                                    {{ $role->hasPermissionTo('subscription-extend') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Extend Subscription</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="subscription-end"
                                                    {{ $role->hasPermissionTo('subscription-end') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">End Subscription</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Locker Permissions</h5>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="locker-create"
                                                    {{ $role->hasPermissionTo('locker-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create Locker</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="locker-extend"
                                                    {{ $role->hasPermissionTo('locker-extend') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Extend Locker</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="locker-end"
                                                    {{ $role->hasPermissionTo('locker-end') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">End Locker</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="ml-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Treadmill Permissions</h5>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="treadmill-create"
                                                    {{ $role->hasPermissionTo('treadmill-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create Treadmill</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="treadmill-extend"
                                                    {{ $role->hasPermissionTo('treadmill-extend') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Extend Treadmill</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="permissions[]" value="treadmill-end"
                                                    {{ $role->hasPermissionTo('treadmill-end') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">End Treadmill</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Price Management</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="price-view"
                                                {{ $role->hasPermissionTo('price-view') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">View Prices</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="price-edit"
                                                {{ $role->hasPermissionTo('price-edit') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Edit Prices</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Reservation Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Reservation Management</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="reservation-list"
                                                {{ $role->hasPermissionTo('reservation-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Reservation List</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Equipment Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Equipment Management</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="equipment-list"
                                                {{ $role->hasPermissionTo('equipment-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Equipment List</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="equipment-view"
                                                {{ $role->hasPermissionTo('equipment-view') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">View Equipment</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="equipment-create"
                                                {{ $role->hasPermissionTo('equipment-create') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Create Equipment</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="equipment-edit"
                                                {{ $role->hasPermissionTo('equipment-edit') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Edit Equipment</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="equipment-delete"
                                                {{ $role->hasPermissionTo('equipment-delete') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Delete Equipment</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Events Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">Events Management</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="event-list"
                                                {{ $role->hasPermissionTo('event-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Event List</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="event-view"
                                                {{ $role->hasPermissionTo('event-view') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">View Event</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="event-create"
                                                {{ $role->hasPermissionTo('event-create') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Create Event</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="event-edit"
                                                {{ $role->hasPermissionTo('event-edit') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Edit Event</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="event-delete"
                                                {{ $role->hasPermissionTo('event-delete') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Delete Event</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- User Account Management -->
                                <div class="p-4 border-b">
                                    <h4 class="font-medium text-gray-800 mb-3">User Account Management</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="user-list"
                                                {{ $role->hasPermissionTo('user-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">User List</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="user-view"
                                                {{ $role->hasPermissionTo('user-view') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">View User</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="user-create"
                                                {{ $role->hasPermissionTo('user-create') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Create User</span>
                                        </label> <label class="flex items-center"><input type="checkbox"
                                                name="permissions[]" value="user-edit"
                                                {{ $role->hasPermissionTo('user-edit') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Edit User</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="user-delete"
                                                {{ $role->hasPermissionTo('user-delete') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Delete User</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Feedback & Help -->
                                <div class="p-4">
                                    <h4 class="font-medium text-gray-800 mb-3">Feedback & Help</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="feedback-list"
                                                {{ $role->hasPermissionTo('feedback-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Feedback List</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="help-list"
                                                {{ $role->hasPermissionTo('help-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Help List</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>