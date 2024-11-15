@canany(['checkin-list', 'checkin-edit'])
    <x-dash-layout>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
        <style>
            #reader {
                width: 100% !important;
                border: 4px solid #ccc;
                border-radius: 8px;
                transition: border-color 0.3s ease;
                display: none;
                /* Hidden by default */
            }

            #reader video {
                width: 100% !important;
            }

            #reader.success {
                border-color: #22c55e;
            }

            #reader.error {
                border-color: #ef4444;
            }

            .scanner-controls {
                margin: 20px 0;
                display: flex;
                gap: 10px;
            }

            .last-result {
                margin-top: 10px;
                padding: 10px;
                background: #f8f9fa;
                border-radius: 4px;
                display: none;
            }

            .btn {
                font-weight: bold;
                padding: 8px 16px;
                border-radius: 4px;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }



            .btn-stop {
                background-color: #ef4444;
                color: white;
                display: none;
            }

            .btn-stop:hover {
                background-color: #dc2626;
            }

            /* Hide the QR Scanner's default button */
            #reader__dashboard_section_csr button {
                display: none !important;
            }
        </style>

        <div class="container mx-auto px-4 py-8" x-data="{ serviceFilter: 'all', statusFilter: 'current' }">
            <h1 class="text-3xl font-bold mb-6 dark:text-white">Member Check-in</h1>

            <div class="mb-8 bg-white dark:bg-peak_2 p-6 rounded-lg shadow-md">

                <div class="flex gap-5">


                    <!-- Realtime scanner -->
                    <div class="scanner-container">
                        <div class="scanner-controls">
                            <button id="startButton"
                                class="btn btn-start bg-slate-900 hover:bg-slate-700  text-white ">Start
                                Camera
                                Scanner</button>
                            <button id="stopButton" class="btn btn-stop">Close Scanner</button>
                        </div>

                        <div class="fixed m-auto" id="reader"></div>

                        <div id="lastResult" class="last-result">
                            <strong>Last Scan:</strong> <span id="lastResultText"></span>
                        </div>
                    </div>

                    <!-- upload qrcode -->
                    <form id="searchForm" action="{{ route('checkin.index') }}" method="GET" class="mb-4">
                        <input id="qrOutput" name="search" type="hidden">
                        <label for="qrInput" class="block text-sm font-medium text-gray-700 mb-2">Upload QR Code</label>
                        <input type="file" id="qrInput" accept="image/*" class="border block w-full text-sm text-gray-500
                                                            file:mr-4 file:py-2 file:px-4
                                                            file:rounded-full file:border-0
                                                            file:text-sm file:font-semibold
                                                            file:bg-blue-50 file:text-blue-700
                                                            hover:file:bg-blue-100">
                    </form>
                </div>


                <!-- manual search  -->
                <form id="searchForm" action="{{ route('checkin.index') }}" method="GET" class="mt-4">
                    <div class="relative">
                        <button type="submit"
                            class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span> <!-- For accessibility -->
                        </button>
                        <input type="text" name="search" id="searchInput" maxlength="255" placeholder="Search by ID Number"
                            value="{{ request('search') }}"
                            class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />

                    </div>
                </form>

                <div class="hidden" x-data="qrScanner()">
                    <input type="text" id="barcodeInput" name="search" x-model="scannedValue" x-ref="barcodeInput"
                        class="scan-input" placeholder="Barcode Input">
                </div>

            </div>

            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full ">
                    <thead class="bg-gray-50 dark:bg-peak_2">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                                Number</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            @can(['checkin-edit'])
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-peak_1">
                        @if($members->isEmpty())
                            <td colspan="8" class="text-center p-3 text-gray-500 mt-4">No results found</>
                        @else
                                @foreach ($members as $member)
                                        <tr x-data="{ open: false, showWarning: false }" :key="member . id" class="dark:text-white">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $member->id_number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $member->name }}</td>

                                            @can(['checkin-edit'])
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
                                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
                                                                    No subscriptions
                                                                </span>
                                                            @else

                                                                        @php
                                                                            $buttonClass = '';

                                                                            foreach ($member->services as $service) {
                                                                                if ($service->status === "Overdue") {
                                                                                    $buttonClass = "bg-red-500 hover:bg-red-600";
                                                                                    break;
                                                                                } elseif ($service->status === "Due") {
                                                                                    $buttonClass = "bg-orange-500 hover:bg-orange-600";
                                                                                }
                                                                            }


                                                                            if (!$buttonClass) {
                                                                                $buttonClass = "bg-green-500 hover:bg-green-600"; // Class for active or default
                                                                            }
                                                                        @endphp

                                                                        <button @click="open = true"
                                                                            class="{{ $buttonClass }} text-white font-bold py-1 px-3 rounded text-sm transition duration-300">
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
                                                                                onclick="this.disabled = true; this.innerText = 'Checking in. . .'; this.form.submit();"
                                                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                                                Proceed Anyway
                                                                            </button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Details Modal -->
                                                            <div style="display: none;" x-show="open"
                                                                class="fixed inset-0 bg-black bg-opacity-50 z-40 select-none"></div>
                                                            <div style="display: none;" x-show="open" @click.away="open = false"
                                                                class="modal fixed w-[90%] md:w-[60%] lg:w-[50%] xl:w-[55%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4 bg-white">
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $member->name }}'s Details
                                                                </h3>
                                                                <div class="mt-2 px-7 py-3">
                                                                    <p class="text-sm text-gray-500">
                                                                        <strong>ID Number: {{ $member->id_number }}</strong><br>
                                                                        Email: {{ $member->email }}<br>
                                                                        Phone: {{ $member->phone }}<br>
                                                                        Facebook: {{ $member->fb ?? 'N/A' }}<br>
                                                                        User ID: {{ $member->user_identifier }}
                                                                    </p>
                                                                    <div class="flex justify-between items-center mb-4">
                                                                        <h2 class="text-2xl font-bold">Services List</h2>
                                                                        <div class="space-x-2">
                                                                            <select x-model="serviceFilter" class="border p-2 rounded">
                                                                                <option value="all">All</option>
                                                                                <option value="service">Service</option>
                                                                                <option value="locker">Lockers</option>
                                                                                <option value="treadmill">Treadmill</option>
                                                                            </select>
                                                                            <select x-model="statusFilter" class="border p-2 rounded">
                                                                                <option value="current">Current</option>
                                                                                <option value="expired">Expired</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="overflow-auto h-64">
                                                                        <table class="table-fixed w-full border-collapse">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="px-4 py-2">Service</th>
                                                                                    <th class="px-4 py-2">Amount</th>
                                                                                    <th class="px-4 py-2">Months</th>
                                                                                    <th class="px-4 py-2">Start Date</th>
                                                                                    <th class="px-4 py-2">Due Date</th>
                                                                                    <th class="px-4 py-2">Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($member->services as $service)
                                                                                                                <template
                                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'service') && ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $service->status }}')) || (statusFilter === 'expired' && '{{ $service->status }}' === 'Expired'))">
                                                                                                                    <tr>
                                                                                                                        <td class="border px-4 py-2">{{ $service->service_type }}</td>
                                                                                                                        <td class="border px-4 py-2">₱{{ $service->amount }}</td>
                                                                                                                        <td class="border px-4 py-2">{{ $service->month }}</td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        @php
                                                                                                                            $statusClass = match ($service->status) {
                                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700',
                                                                                                                                'Due'
                                                                                                                                =>
                                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                                'text-gray-500',
                                                                                                                                default => '',
                                                                                                                        };@endphp
                                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                                            {{ $service->status }}
                                                                                                                        </td>

                                                                                                                    </tr>
                                                                                                                </template>
                                                                                @endforeach
                                                                                @foreach($member->lockers as $locker)
                                                                                                                <template
                                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'locker') && 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $locker->status }}')) || 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    (statusFilter === 'expired' && '{{ $locker->status }}' === 'Expired'))">
                                                                                                                    <tr>
                                                                                                                        <td class="border px-4 py-2">Locker #{{ $locker->locker_no }}
                                                                                                                        </td>
                                                                                                                        <td class="border px-4 py-2">₱{{ $locker->amount }}</td>
                                                                                                                        <td class="border px-4 py-2">{{ $locker->month }}</td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        @php
                                                                                                                            $statusClass = match ($locker->status) {
                                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700',
                                                                                                                                'Due'
                                                                                                                                =>
                                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                                'text-gray-500',
                                                                                                                                default => '',
                                                                                                                        };@endphp
                                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                                            {{ $locker->status }}
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </template>
                                                                                @endforeach
                                                                                @foreach($member->treadmills as $treadmill)
                                                                                                                <template
                                                                                                                    x-if="(serviceFilter === 'all' || serviceFilter === 'treadmill') && 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ((statusFilter === 'current' && ['Active', 'Inactive', 'Due', 'Overdue'].includes('{{ $treadmill->status }}')) || 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    (statusFilter === 'expired' && '{{ $treadmill->status }}' === 'Expired'))">
                                                                                                                    <tr>
                                                                                                                        <td class="border px-4 py-2">Treadmill</td>
                                                                                                                        <td class="border px-4 py-2">₱{{ $treadmill->amount }}</td>
                                                                                                                        <td class="border px-4 py-2">{{ $treadmill->month }}</td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($treadmill->start_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        <td class="border px-4 py-2">
                                                                                                                            {{ \Carbon\Carbon::parse($treadmill->due_date)->format('M j, Y') }}
                                                                                                                        </td>
                                                                                                                        @php
                                                                                                                            $statusClass = match ($treadmill->status) {
                                                                                                                                'Active' => 'text-green-600', 'Inactive' => 'text-blue-700',
                                                                                                                                'Due'
                                                                                                                                =>
                                                                                                                                'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                                                                                                                'text-gray-500',
                                                                                                                                default => '',
                                                                                                                        };@endphp
                                                                                                                        <td class="border px-4 py-2 font-bold {{ $statusClass }}">
                                                                                                                            {{ $treadmill->status }}
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </template>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
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
                                                                                    onclick="this.disabled = true; this.innerText = 'Checking in...'; this.form.submit();"
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
                                            @endcan
                                        </tr>
                                @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $members->links() }}
            </div>
        </div>
    </x-dash-layout>
@endcanany


<!-- USING JSQR LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>

<!-- UPLOAD TO SEARCH -->
<script>
    const qrInput = document.getElementById("qrInput");

    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                processQRCode(e.target.result);
            };
            reader.readAsDataURL(file);
        }
    }

    qrInput.addEventListener("change", handleImageUpload);

    function processQRCode(imageData) {
        const img = new Image();
        img.onload = function () {
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
    }
</script>


<!-- SCAN QR DEVICE TO SEARCH -->
<script>
    function qrScanner() {
        return {
            buffer: '',
            lastKeyTime: 0,
            keyDelay: 50,
            isManualTyping: false,

            init() {
                document.getElementById('searchInput').addEventListener('focus', () => {
                    this.isManualTyping = true;
                });

                document.getElementById('searchInput').addEventListener('blur', () => {
                    this.isManualTyping = false;
                });

                document.addEventListener('keydown', (e) => {
                    if (this.isManualTyping) return;

                    const currentTime = new Date().getTime();
                    const timeDiff = currentTime - this.lastKeyTime;

                    if (timeDiff < this.keyDelay) {
                        // Only add the actual character, not the key name
                        if (e.key.length === 1) { // This ensures we only get actual characters
                            this.buffer += e.key;
                        }
                    } else {
                        this.buffer = e.key.length === 1 ? e.key : '';
                    }

                    if (e.keyCode === 13) {
                        const searchInput = document.getElementById('searchInput');
                        searchInput.value = this.buffer;
                        document.querySelector('#searchForm button[type="submit"]').click();
                        this.buffer = '';
                    }

                    this.lastKeyTime = currentTime;
                });
            }
        }
    }
</script>


<!-- REAL TIME SCANNER TO SEARCH "INCOMPLETE" -->
<script>
    class QRScanner {
        constructor() {
            this.html5QrCode = null;
            this.isScanning = false;
            this.lastResult = '';
            this.scanCount = 0;

            // DOM elements
            this.reader = document.getElementById('reader');
            this.startButton = document.getElementById('startButton');
            this.stopButton = document.getElementById('stopButton');
            this.lastResultDiv = document.getElementById('lastResult');
            this.lastResultText = document.getElementById('lastResultText');

            // Bind methods
            this.startScanner = this.startScanner.bind(this);
            this.stopScanner = this.stopScanner.bind(this);
            this.onScanSuccess = this.onScanSuccess.bind(this);
            this.onScanError = this.onScanError.bind(this);

            // Initialize
            this.init();
        }

        init() {
            this.html5QrCode = new Html5Qrcode("reader");

            // Add event listeners
            this.startButton.addEventListener('click', this.startScanner);
            this.stopButton.addEventListener('click', this.stopScanner);
        }

        async checkCameraPermissions() {
            try {
                // Check if we're in a secure context
                if (!window.isSecureContext) {
                    throw new Error('Camera access requires a secure context (HTTPS or localhost)');
                }

                // Check if the browser supports getUserMedia
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    throw new Error('Your browser does not support camera access');
                }

                // Request camera permission explicitly
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                stream.getTracks().forEach(track => track.stop()); // Stop the stream after permission check
                return true;
            } catch (error) {
                console.error('Camera permission error:', error);
                this.showError(error.message);
                return false;
            }
        }

        showError(message) {
            // Create or update error message
            let errorDiv = document.getElementById('camera-error');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.id = 'camera-error';
                errorDiv.style.color = 'red';
                errorDiv.style.marginTop = '10px';
                this.reader.parentNode.insertBefore(errorDiv, this.reader.nextSibling);
            }
            errorDiv.textContent = message;

            // Style the reader to show error state
            this.reader.classList.add('error');
        }

        async startScanner() {
            try {
                // Check permissions first
                const hasPermission = await this.checkCameraPermissions();
                if (!hasPermission) {
                    return;
                }

                if (!this.html5QrCode) {
                    this.html5QrCode = new Html5Qrcode("reader");
                }

                this.isScanning = true;
                this.reader.style.display = 'block';
                this.startButton.style.display = 'none';
                this.stopButton.style.display = 'block';

                // Clear any previous error messages
                const errorDiv = document.getElementById('camera-error');
                if (errorDiv) {
                    errorDiv.remove();
                }

                const config = {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    },
                    aspectRatio: 1.0,
                    showTorchButtonIfSupported: true
                };

                await this.html5QrCode.start({
                    facingMode: "environment"
                },
                    config,
                    this.onScanSuccess,
                    this.onScanError
                );

                // Remove error styling if successful
                this.reader.classList.remove('error');
            } catch (err) {
                console.error("Camera access error:", err);
                this.showError(err.message || 'Failed to start camera');
            }
        }

        async stopScanner() {
            if (this.html5QrCode && this.isScanning) {
                try {
                    await this.html5QrCode.stop();
                    this.reader.classList.remove('success', 'error');
                    this.isScanning = false;
                    this.reader.style.display = 'none';
                    this.startButton.style.display = 'block';
                    this.stopButton.style.display = 'none';

                    // Clear error messages if any
                    const errorDiv = document.getElementById('camera-error');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                } catch (err) {
                    console.error("Error stopping scanner:", err);
                }
            }
        }

        async onScanSuccess(decodedText) {
            // Remove error state
            this.reader.classList.remove('error');
            this.reader.classList.add('success');

            if (this.lastResult !== decodedText) {
                this.lastResult = decodedText;
                this.scanCount++;

                // Show last result
                this.lastResultDiv.style.display = 'block';
                this.lastResultText.textContent = decodedText;

                // Update both search inputs if they exist
                const searchInputs = document.querySelectorAll('input[name="search"]');
                searchInputs.forEach(input => {
                    input.value = decodedText;
                });

                // Submit the form
                const form = document.querySelector('form');
                if (form) {
                    form.submit();
                }
            }

            // Reset border after 1 second
            setTimeout(() => {
                this.reader.classList.remove('success');
            }, 1000);
        }

        onScanError(errorMessage) {
            this.reader.classList.remove('success');
            this.reader.classList.add('error');

            // Continue scanning on error
            if (errorMessage !== 'QR code parse error, error = No QR code found') {
                console.log(`QR Error: ${errorMessage}`);
            }
        }
    }



    // Initialize scanner when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new QRScanner();
    });
</script>