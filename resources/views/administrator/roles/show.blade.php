<div style="display: none;" x-show="openshowmodal === {{ $role->id }}"
    @click="if ($event.target === $el) openshowmodal = null" class="fixed inset-0 bg-black opacity-50 z-40 select-none">
</div>

<div style="display: none;"
    class="admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="openshowmodal === {{ $role->id }}" @click="if ($event.target === $el) openshowmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <div @click.stop class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto"
        @click.stop>
        <div class=" rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex flex-row p-6 justify-between  px-6 py-4 rounded-t-md">
                <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">
                    Role
                    Details</h3>
                <button @click="openshowmodal = null"
                    class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>


            <div class="space-y-4 p-6">
                <div class="space-y-1">
                    <div class="text-lg font-medium text-gray-500"> {{ $role->name }}</div>
                    <p for="Role Details" class="dark:text-white">------ ------ --- -- ------ --<br> ---- --
                        --------- --- ------- --
                        ----- --------</p>
                </div>

                <div class="form-group">
                    <h4 class="text-sm font-medium text-gray-500">Permissions</h4>
                    <ul class="mt-2 space-y-2 text-sm dark:text-white">


                        @if(isset($role->permissions) && count($role->permissions) > 0)
                            @foreach ($role->permissions as $permission)
                                <li class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-4 w-4 text-green-500">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                    <span>{{ $permission->name }}</span>
                                </li>
                            @endforeach

                        @else

                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="h-4 w-4 text-red-500" viewBox="0 0 16 16">
                                    <path
                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                </svg>
                                <span>No Permissions</span>
                            </li>
                        @endif



                    </ul>
                </div>
            </div>




        </div>
    </div>

</div>