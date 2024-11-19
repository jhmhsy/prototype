<div style="display: none;" x-show="openeditmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="openeditmodal === {{$member->id}}" @click.away="openeditmodal = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90 ">
    <div class="bg-white dark:bg-peak_2  rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="text-2xl font-bold dark:text-white">Edit {{$member->name}}'s Details</h3>
                <p class="text-sm text-gray-500">What's the new info? </p>
            </div>
            <div class="p-6  text-black dark:text-white">
                <form method="POST" action="{{ route('members.update', $member->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-4 text-md-right  text-sm font-medium text-gray-500">Name</label>
                        <div class="col-md-6">
                            <input
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-none dark:text-white"
                                id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $member->name) }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="phone"
                            class="col-md-4 text-md-right  text-sm font-medium text-gray-500">Phone</label>
                        <div class="col-md-6">
                            <input
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-none dark:text-white"
                                id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone', $member->phone) }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="fb"
                            class="col-md-4 text-md-right  text-sm font-medium text-gray-500">Facebook</label>
                        <div class="col-md-6">
                            <input
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-none dark:text-white"
                                id="fb" type="text" class="form-control @error('fb') is-invalid @enderror" name="fb"
                                value="{{ old('fb', $member->fb) }}">
                            @error('fb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="email"
                            class="col-md-4 text-md-right  text-sm font-medium text-gray-500">Email</label>
                        <div class="col-md-6">
                            <input
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-none dark:text-white"
                                id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $member->email) }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="membership_type" class="col-md-4 text-md-right text-sm font-medium text-gray-500">
                            Membership Type
                        </label>
                        <div class="col-md-6">
                            <select name="membership_type" id="membership_type"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-peak_1 dark:border-gray-600 dark:text-white @error('membership_type') is-invalid @enderror">
                                <option value="Regular" {{ old('membership_type', $member->membership_type) == 'Regular' ? 'selected' : '' }}>
                                    Regular</option>
                                <option value="Student" {{ old('membership_type', $member->membership_type) == 'Student' ? 'selected' : '' }}>
                                    Student</option>
                            </select>
                            @error('membership_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">

                        <div class="flex justify-end space-x-2">
                            <button @click="openeditmodal = true" class="  px-4 py-2 rounded-md">Cancel</button>
                            <button type="submit" class="  px-4 py-2 rounded-md ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>