<div style="display:none;" style="display: none;" x-show="open"
    class="fixed select-none inset-0 bg-black opacity-50 z-40">
</div>
<!-- Member Details Modal -->
<div style="display:none;" x-show="open" @click.away="open = false"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
    class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[55%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white dark:bg-peak_2">

    <div class="mt-3 text-center">

        <div class="mt-2 px-7 py-3">
            <div class="flex gap-5 w-full">
                @if($member->qrcode)
                <div class="qr-code-container relative group w-24 h-24 rounded-lg transition-all">
                    @if($member->qrcode)
                    <img src="{{ Storage::url('qrcodes/' . $member->qrcode->qr_image_path) }}"
                        alt=" QR Code for {{ $member->name }}" class="w-24 h-24">
                    <!-- Download Icon Overlay -->
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        <button
                            onclick="downloadQrCode('{{ Storage::url('qrcodes/' . $member->qrcode->qr_image_path) }}', '{{ $member->id_number }}')"
                            class=" absolute inset-0 w-full h-full text-white font-bold flex items-center
                                                            justify-center transition-all">
                            <!-- SVG for Download Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-download" viewBox="0 0 16 16">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                            </svg>
                        </button>
                    </div>
                    @else
                    <p>No QR Code Available</p>
                    @endif
                </div>

                @else
                <div class="flex flex-col gap-2">
                    <div class="text-red-500">No QR code generated</div>

                    <form action="{{ route('members.generate-qrcode', $member) }}" method=" POST" class=" inline">
                        @csrf

                        <button type="submit"
                            class="border border-1 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded mt-2">
                            Generate Again?
                        </button>
                    </form>
                </div>
                @endif
                <div class="text-sm text-left text-gray-500 flex flex-col">

                    <div class="flex gap-5">
                        <h3 class="text-lg leading-6 font-medium text-black dark:text-white">
                            {{ $member->name }}'s
                            Details
                        </h3>
                        {{-- <div class="absolute top-2 right-2 w-3 h-3 {{ $statusColor }}
                        rounded-full" aria-label="{{ $status }} status" title="{{ $status }}">
                    </div>--}}

                    <button @click="membershipOption = true, open = false"
                        class="absolute top-2 right-2 w-3 h-3 {{ $bgColor }} rounded-full"
                        aria-label="{{ $status }} status" title="{{ $status }}" type=" button">
                    </button>
                </div>
                <p> <strong>ID Number: {{ $member->id_number }}</strong></p>
                <p>Phone: <span class="text-black dark:text-white">{{ $member->phone ?? 'N/A' }}</span><br>
                </p>
                <p>Facebook: <span class="text-black dark:text-white">{{ $member->fb ?? 'N/A' }}</span><br>
                </p>
                <p>Email: <span class="text-black dark:text-white">{{ $member->email }}</span><br>
                </p>
                <p>User ID: <span class="text-black dark:text-white">{{ $member->user_identifier }}</span>
                </p>

            </div>

        </div>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-black dark:text-white">Services List</h2>
            <div class="space-x-2 text-sm">
                <select x-model="serviceFilter" class="border p-2 rounded dark:bg-peak_2 dark:text-white">
                    <option value="all">All</option>
                    <option value="service">Service</option>
                    <option value="locker">Lockers</option>
                    <option value="treadmill">Treadmill</option>
                </select>
                <select x-model="statusFilter" class="border p-2 rounded dark:bg-peak_2 dark:text-white">
                    <option value="current">Current</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
        </div>

        <!-- the tabular table -->
        <div class="overflow-x-auto h-64 sm:h-80">
            @include ('administrator.members.table')
        </div>
    </div>


</div>


<div class="p-6">

    <div class="grid grid-cols-1 md:flex gap-5 justify-between items-center">
        <div class="grid grid-cols-3 space-x-2 text-md sm:text-sm">



            @can('subscription-extend')
            <button @click="extendOpen = true; open = false;"
                onclick="refreshDate({{ $member->id }}, 'services', 'service')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Subscription
            </button>
            @endcan

            @can('locker-extend')
            <button @click="lockerOption = true; open = false"
                onclick="refreshDate({{ $member->id }}, 'lockers', 'locker')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Locker
            </button>
            @endcan

            @can('treadmill-extend')
            <button @click="extendTreadmill = true; open = false"
                onclick="refreshDate({{ $member->id }}, 'treadmills', 'treadmill')"
                class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 px-4 py-2 rounded-lg">Treadmill
            </button>
            @endcan
        </div>
        <button @click="open = false"
            class="border border-gray-500 text-gray-500 hover:text-black hover:border-black dark:hover:text-white dark:hover:border-white px-4 py-2 rounded-lg">
            Close</button>
    </div>
</div>

</div>


@can('subscription-extend')
@include ('administrator.members.extend-service')
@endcan
@can('locker-extend')
@include ('administrator.members.extend-locker')
@endcan
@can('treadmill-extend')
@include ('administrator.members.extend-treadmill')
@endcan


@include ('administrator.members.membershipOption')