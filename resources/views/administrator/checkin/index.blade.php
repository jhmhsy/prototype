<x-dash-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Member Check-in</h1>

        <div class="mb-8 bg-white p-6 rounded-lg shadow-md">
            <form id="searchForm" action="{{ route('checkin.index') }}" method="GET" class="mb-4">
                <input id="qrOutput" name="search" type="hidden">
                <label for="qrInput" class="block text-sm font-medium text-gray-700 mb-2">Upload QR Code</label>
                <input type="file" id="qrInput" accept="image/*" class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100">
            </form>

            <form action="{{ route('checkin.index') }}" method="GET" class="mt-4">
                <div class="flex">
                    <input type="text" name="search"
                        class="flex-grow rounded-l-md border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        placeholder="Search by ID Number" value="{{ request('search') }}">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-md transition duration-300">Search</button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            Number</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($members as $member)
                    <tr x-data="{ open: false, showWarning: false }">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->id_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                            $alreadyCheckedIn = \App\Models\CheckinRecord::where('user_id', $member->id)
                            ->whereDate('checkin_date', \Carbon\Carbon::now()->toDateString())
                            ->exists();
                            @endphp

                            @if ($alreadyCheckedIn)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                User has checked in
                            </span>
                            @elseif (!$member->hasSubscriptions)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                No subscriptions
                            </span>
                            @else
                            <button @click="open = true"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
                                Check-in
                            </button>
                            @endif
                        </td>
                        <td>
                            <!-- Warning Modal -->
                            <div x-show="showWarning" style="display: none;"
                                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full mx-4"
                                    @click.away="showWarning = false">
                                    <h3 class="text-xl font-bold mb-4">Warning</h3>
                                    <p class="mb-4">This user has overdue subscriptions. Do you want to proceed with
                                        check-in?</p>
                                    <div class="flex justify-end space-x-4">
                                        <button @click="showWarning = false"
                                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                            Cancel
                                        </button>
                                        <form action="{{ route('checkin.store', $member) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="force_checkin" value="1">
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                Check in anyway
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Details Modal -->
                            <div style="display: none;" x-show="open"
                                class="fixed inset-0 bg-black bg-opacity-50 z-40 select-none"></div>
                            <div style="display: none;" x-show="open" @click.away="open = false"
                                class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white rounded shadow-lg w-[90%] md:w-[60%] lg:w-[40%] xl:w-[35%]">
                                <h3 class="text-lg font-medium">{{ $member->name }}'s Details</h3>
                                <div class="mt-2">
                                    <p>
                                        <strong>ID Number: {{ $member->id_number }}</strong><br>
                                        Email: {{ $member->email }}<br>
                                        Phone: {{ $member->phone }}<br>
                                        Facebook: {{ $member->fb ?? 'N/A' }}<br>
                                        User ID: {{ $member->user_identifier }}
                                    </p>
                                    <h4 class="font-semibold mt-4">Services</h4>
                                    <table class="min-w-full mt-2">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">Start Date</th>
                                                <th class="px-4 py-2">Due Date</th>
                                                <th class="px-4 py-2">Amount</th>
                                                <th class="px-4 py-2">Service</th>
                                                <th class="px-4 py-2">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($member->services as $service)
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                                                </td>
                                                <td class="border px-4 py-2">
                                                    {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                                                </td>
                                                <td class="border px-4 py-2">${{ $service->amount }}</td>
                                                <td class="border px-4 py-2">{{ $service->service_type }}</td>
                                                @php
                                                $statusClass = match ($service->status) {
                                                'Active' => 'text-green-600',
                                                'Inactive' => 'text-blue-700',
                                                'Due' => 'text-orange-500',
                                                'Overdue' => 'text-red-700',
                                                'Expired' => 'text-gray-500',
                                                default => '',
                                                };
                                                @endphp

                                                <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                    {{ $service->status }}
                                                </td>


                                            </tr>
                                            @endforeach
                                            @foreach($member->lockers as $locker)
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                                </td>
                                                <td class="border px-4 py-2">
                                                    {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                                </td>
                                                <td class="border px-4 py-2">${{ $locker->amount }}</td>
                                                <td class="border px-4 py-2">Locker #{{ $locker->locker_no }}</td>
                                                <td class="border px-4 py-2">{{ $locker->status }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex gap-3">
                                    @if (!$alreadyCheckedIn)
                                    @if ($member->hasOverdueSubscription)
                                    <button @click="open = false; showWarning = true"
                                        class="mt-4 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-300">
                                        Check-in (Warning)
                                    </button>
                                    @elseif ($member->hasValidSubscription)
                                    <form action="{{ route('checkin.store', $member) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">
                                            Check-in
                                        </button>
                                    </form>
                                    @endif
                                    @endif
                                    <button @click="open = false"
                                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $members->links() }}
        </div>
    </div>
</x-dash-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>
<script>
const qrInput = document.getElementById("qrInput");

function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            processQRCode(e.target.result);
        };
        reader.readAsDataURL(file);
    }
}

qrInput.addEventListener("change", handleImageUpload);

function processQRCode(imageData) {
    const img = new Image();
    img.onload = function() {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        canvas.width = img.width;
        canvas.height = img.height;
        context.drawImage(img, 0, 0, img.width, img.height);
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);

        if (code) {
            document.getElementById("qrOutput").value = code.data;
            document.getElementById("searchForm").submit();
        } else {
            console.log("No QR code found.");
        }
    };
    img.src = imageData;
} <
/script