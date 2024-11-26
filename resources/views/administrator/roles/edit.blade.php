<style>
.modal {
    max-height: 90vh;
    /* Limit height to 90% of the viewport */
    overflow-y: auto;
    /* Enable vertical scrolling if content overflows */
    overflow-x: hidden;
    /* Prevent horizontal overflow */
}
</style>
<div style="display: none;" x-show="openeditmodal === {{ $role->id }}"
    @click="if ($event.target === $el) openeditmodal = null" class="fixed inset-0 bg-black opacity-50 z-40 select-none">
</div>

<div style="display: none;"
    class=" modal fixed admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="openeditmodal === {{ $role->id }}" @click="if ($event.target === $el) openeditmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <div @click.stop class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto"
        @click.stop>
        <div class="modal rounded shadow-lg w-full max-w-2xl  overflow-y-auto">
            <div class="container mx-auto max-w-2xl px-4 py-8">
                <form action="{{ route('roles.update', $role->id) }}" method="POST"
                    class="flex flex-col max-h-[90vh] rounded-lg shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-6">Edit Roles</h2>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Current Role</label>
                            <h2 class="block text-3xl dark:text-white font-medium mb-2">{{ $role->name }}</h2>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}"
                                class="border dark:border-none rounded dark:bg-peak_1 px-3 py-2 w-full">
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mb-4">Permissions</h3>

                            <div class="border dark:border-gray-800 rounded-lg max-h-[600px] overflow-y-auto">
                                <!-- Is-Admin Permission -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Admin Permissions</h4>
                                    <div class="space-y-2 relative">
                                        <label class="flex items-center permission-label">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'is-admin')->first()->id }}"
                                                {{ $role->hasPermissionTo('is-admin') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Is Admin</span>
                                        </label>
                                        <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                            style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                            Grants admin-level access.
                                        </div>
                                    </div>
                                    <div class="space-y-2 relative">
                                        <label class="flex items-center permission-label">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'is-super')->first()->id }}"
                                                {{ $role->hasPermissionTo('is-super') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Is Super</span>
                                        </label>
                                        <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                            style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                            Grants superuser-level access.
                                        </div>
                                    </div>
                                    <div class="space-y-2 relative">
                                        <label class="flex items-center permission-label">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'is-user')->first()->id }}"
                                                {{ $role->hasPermissionTo('is-user') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Is User</span>
                                        </label>
                                        <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                            style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                            Grants user-level access.
                                        </div>
                                    </div>
                                </div>


                                <!-- Overview -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Overview</h4>
                                    <div class="space-y-2 relative">
                                        <label class="flex items-center permission-label">
                                            <input type="checkbox" name="permission[]"
                                                value="{{ $permissions->where('name', 'overview-list')->first()->id }}"
                                                {{ $role->hasPermissionTo('overview-list') ? 'checked' : '' }}
                                                class="rounded">
                                            <span class="ml-2">Overview List</span>
                                        </label>
                                        <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                            style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                            Can view the list of all overview data.
                                        </div>
                                    </div>
                                </div>

                                <!-- Check-in Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Check-in Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'checkin-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('checkin-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Check-in List</span>

                                            </label>
                                            <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                Can see a list of all check-ins.
                                            </div>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'checkin-log-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('checkin-log-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Check-in Log List</span>
                                            </label>
                                            <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                Can view detailed logs of check-ins.
                                            </div>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'checkin-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('checkin-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Check-in Edit</span>
                                            </label>
                                            <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                Can edit check-in details for members.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Member Management</h4>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Manage Members</h5>
                                        <div class="space-y-2">
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-create')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-create') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Create Member</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can add a new member to the system.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-list')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-list') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Member List</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can view the list of all members.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-view')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-view') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Member View</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can view member details.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-services')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-services') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Member Services</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can Open member Services.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-edit')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-edit') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Member Edit</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can edit member details.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-membership-renew')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-membership-renew') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Membership Renewal</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can renew a member's membership.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'member-delete')->first()->id }}"
                                                        {{ $role->hasPermissionTo('member-delete') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Member Delete</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can Delete a member.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'confirmation-list')->first()->id }}"
                                                        {{ $role->hasPermissionTo('confirmation-list') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Confirmation List</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can Confirm the approval/dissaproval id canceling subscriptions
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Subscription Permissions</h5>
                                        <div class="space-y-2">
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'subscription-create')->first()->id }}"
                                                        {{ $role->hasPermissionTo('subscription-create') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Create Subscription</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can create a new subscription for a member.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'subscription-extend')->first()->id }}"
                                                        {{ $role->hasPermissionTo('subscription-extend') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Extend Subscription</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can extend the member's subscription duration.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'subscription-end')->first()->id }}"
                                                        {{ $role->hasPermissionTo('subscription-end') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">End Subscription</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can end a member's subscription.
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-4 mb-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Locker Permissions</h5>
                                        <div class="space-y-2">
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'locker-create')->first()->id }}"
                                                        {{ $role->hasPermissionTo('locker-create') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Create Locker</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can assign a locker to a member.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'locker-extend')->first()->id }}"
                                                        {{ $role->hasPermissionTo('locker-extend') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Extend Locker</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can extend a member's locker rental.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'locker-end')->first()->id }}"
                                                        {{ $role->hasPermissionTo('locker-end') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">End Locker</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can end a member's locker rental.
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-4">
                                        <h5 class="text-sm font-medium text-gray-600 mb-2">Treadmill Permissions</h5>
                                        <div class="space-y-2">
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'treadmill-create')->first()->id }}"
                                                        {{ $role->hasPermissionTo('treadmill-create') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Create Treadmill</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can rent a treadmill to a member.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'treadmill-extend')->first()->id }}"
                                                        {{ $role->hasPermissionTo('treadmill-extend') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">Extend Treadmill</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can extend a member's treadmill rental.
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="space-y-2 relative">
                                                <label class="flex items-center permission-label">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permissions->where('name', 'treadmill-end')->first()->id }}"
                                                        {{ $role->hasPermissionTo('treadmill-end') ? 'checked' : '' }}
                                                        class="rounded">
                                                    <span class="ml-2">End Treadmill</span>
                                                    <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                        style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                        Can end a member's treadmill rental.
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Price Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'price-view')->first()->id }}"
                                                    {{ $role->hasPermissionTo('price-view') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">View Prices</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the current prices for services.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'price-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('price-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Edit Prices</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can edit the pricing details for services.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reservation Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Reservation Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'reservation-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('reservation-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Reservation List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can see a list of all reservations.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Equipment Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Equipment Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'equipment-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('equipment-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Equipment List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the equipment list.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'equipment-view')->first()->id }}"
                                                    {{ $role->hasPermissionTo('equipment-view') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">View Equipment</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view details of a specific equipment.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'equipment-create')->first()->id }}"
                                                    {{ $role->hasPermissionTo('equipment-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create Equipment</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can add a new equipment item to the system.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'equipment-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('equipment-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Edit Equipment</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can edit details of existing equipment.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'equipment-delete')->first()->id }}"
                                                    {{ $role->hasPermissionTo('equipment-delete') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Delete Equipment</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can Delete specific equipment.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Events Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'event-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('event-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Event List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the list of all events.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'event-view')->first()->id }}"
                                                    {{ $role->hasPermissionTo('event-view') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">View Event</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can see details of a specific event.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'event-create')->first()->id }}"
                                                    {{ $role->hasPermissionTo('event-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create Event</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can create a new event.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'event-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('event-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Edit Event</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can edit an existing event.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'event-delete')->first()->id }}"
                                                    {{ $role->hasPermissionTo('event-delete') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Delete Event</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can delete an event.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- User Account Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">User Account Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'user-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('user-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">User List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the list of all users account.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'user-view')->first()->id }}"
                                                    {{ $role->hasPermissionTo('user-view') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">View User</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view details of a specific user account.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'user-create')->first()->id }}"
                                                    {{ $role->hasPermissionTo('user-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create User</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can add a new user account.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'user-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('user-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Edit User</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can edit details of an existing user account.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'user-delete')->first()->id }}"
                                                    {{ $role->hasPermissionTo('user-delete') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Delete User</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can delete user accounts.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feedback and Help -->
                                <div class="p-4">
                                    <h4 class="font-medium text-gray-500 mb-3">Feedback and Help</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'feedback-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('feedback-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Feedback List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view and access feedback page.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'help-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('help-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Help List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view and access the help page.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <!-- FAQ Management -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">FAQ Management</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'faq-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('faq-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">FAQ List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the list of FAQs.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'faq-view')->first()->id }}"
                                                    {{ $role->hasPermissionTo('faq-view') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">View FAQ</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view details of a specific FAQ.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'faq-create')->first()->id }}"
                                                    {{ $role->hasPermissionTo('faq-create') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Create FAQ</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can add a new FAQ.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'faq-edit')->first()->id }}"
                                                    {{ $role->hasPermissionTo('faq-edit') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Edit FAQ</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can edit existing FAQs.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'faq-delete')->first()->id }}"
                                                    {{ $role->hasPermissionTo('faq-delete') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Delete FAQ</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can delete FAQs.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Permissions -->
                                <div class="p-4 border-b dark:border-gray-800">
                                    <h4 class="font-medium text-gray-500 mb-3">Additional Permissions</h4>
                                    <div class="space-y-2">
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'asset-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('asset-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Asset List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view the list of assets.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'dailysales-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('dailysales-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Daily Sales List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view daily sales reports.
                                                </div>
                                            </label>
                                        </div>
                                        <div class="space-y-2 relative">
                                            <label class="flex items-center permission-label">
                                                <input type="checkbox" name="permission[]"
                                                    value="{{ $permissions->where('name', 'productsales-list')->first()->id }}"
                                                    {{ $role->hasPermissionTo('productsales-list') ? 'checked' : '' }}
                                                    class="rounded">
                                                <span class="ml-2">Product Sales List</span>
                                                <div class="permission-tooltip absolute z-10 bg-white text-black text-xs py-1 px-2 mt-1 shadow-lg rounded border"
                                                    style="display: none; opacity: 0; visibility: hidden; transition: opacity 0.2s, visibility 0.2s; left: 0; top: 100%; white-space: nowrap;">
                                                    Can view product sales reports.
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
// checkboxTooltip.js
document.addEventListener('DOMContentLoaded', function() {
    const checkboxLabels = document.querySelectorAll('.permission-label');

    checkboxLabels.forEach(label => {
        let tooltipTimer;

        // Show tooltip
        const showTooltip = () => {
            tooltipTimer = setTimeout(() => {
                const tooltip = label.parentElement.querySelector('.permission-tooltip');
                if (tooltip) {
                    tooltip.style.opacity = '1';
                    tooltip.style.visibility = 'visible';
                    tooltip.style.display = 'block';
                }
            }, 1000); // 1 second delay
        };

        // Hide tooltip
        const hideTooltip = () => {
            clearTimeout(tooltipTimer);
            const tooltip = label.parentElement.querySelector('.permission-tooltip');
            if (tooltip) {
                tooltip.style.opacity = '0';
                tooltip.style.visibility = 'hidden';
                tooltip.style.display = 'none';
            }
        };

        // Add event listeners
        label.addEventListener('mouseenter', showTooltip);
        label.addEventListener('mouseleave', hideTooltip);
    });
});
</script>