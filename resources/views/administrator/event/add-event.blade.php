<div style="display:none;" x-show="createmodal" class="fixed select-none inset-0 bg-black/25 z-40">
</div>

<div style="display:none;" x-show="createmodal" @click.away="createmodal = false"
    class="fixed z-50 w-[99%] sm:w-[80%] md:w-[70%] lg:w-[50%] xl:w-[40%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">

    <div class="bg-white dark:bg-peak_2 rounded-lg shadow-xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 sm:p-8">
            <div class="space-y-2 mb-6">
                <h3 class="text-2xl font-bold dark:text-white">New Event</h3>
                <p class="text-sm text-gray-500">What is this new event?</p>
            </div>

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_token" value="{{ session('form_token') }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="name">
                            Event Name
                        </label>
                        <input
                            class="w-full h-11 px-4 rounded-lg border dark:border-none dark:bg-peak_1 text-sm focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                            type="text" name="name" id="name" required maxlength="50"
                            placeholder="e.g International party" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="location">
                            Location
                        </label>
                        <select
                            class="w-full h-11 px-4 rounded-lg border dark:border-none dark:bg-peak_1 text-sm focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror"
                            id="location" name="location" required>
                            <option value="" disabled {{ old('location') ? '' : 'selected' }}>Select Location</option>
                            <option value="backdoor" {{ old('location') == 'backdoor' ? 'selected' : '' }}>Backdoor
                            </option>
                            <option value="studio" {{ old('location') == 'studio' ? 'selected' : '' }}>Studio</option>
                            <option value="stage" {{ old('location') == 'stage' ? 'selected' : '' }}>Stage</option>
                        </select>
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2 mt-6">
                    <label class="text-sm font-medium text-gray-500" for="details">
                        Details
                    </label>
                    <textarea
                        class="w-full min-h-[120px] px-4 py-3 rounded-lg border dark:border-none dark:bg-peak_1 text-sm focus:ring-2 focus:ring-blue-500 @error('details') border-red-500 @enderror"
                        name="details" id="details" required maxlength="300" placeholder="We do party beitch"
                        rows="4">{{ old('details') }}</textarea>
                    @error('details')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="date">
                            Date
                        </label>
                        <input type="date" id="date" name="date" required value="{{ old('date') }}"
                            class="w-full h-11 px-4 rounded-lg border dark:border-none dark:bg-peak_1 text-sm focus:ring-2 focus:ring-blue-500 @error('date') border-red-500 @enderror">
                        @error('date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="time">
                            Time
                        </label>
                        <select id="time" name="time" required
                            class="w-full h-11 px-4 rounded-lg border dark:border-none dark:bg-peak_1 text-sm focus:ring-2 focus:ring-blue-500 @error('time') border-red-500 @enderror">
                            <option value="" disabled {{ old('time') ? '' : 'selected' }}>Select an hour</option>
                            @for ($i = 7; $i < 21; $i++) @php    $timeValue = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00';
                                $displayTime = ($i > 12 ? $i - 12 : $i) . ' ' . ($i >= 12 ? 'pm' : 'am');
                            @endphp
                                                        <option value="{{ $timeValue }}" {{ old('time') == $timeValue ? 'selected' : '' }}>
                                                            {{ $displayTime }}
                                                        </option>
                            @endfor
                        </select>
                        @error('time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="w-full mt-8 px-6 py-3 text-sm font-medium text-black bg-white border-2 rounded-lg hover:bg-darkgray hover:text-white transition-colors duration-200">
                    Add Event
                </button>
            </form>
        </div>
    </div>
</div>