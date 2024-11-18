<x-guest-layout>



    <body class="bg-gray-100 p-4">
        <h1 class="text-2xl font-bold mb-6">Member Services</h1>

        @if ($member)
        <table class="table-auto border-collapse w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">id_number</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Services</th>
                    <th class="p-3 text-left">Lockers</th>
                    <th class="p-3 text-left">Treadmills</th>
                    <th class="p-3 text-left">QR Code</th>
                    <th class="p-3 text-left">Membership Duration</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">{{ $member->id_number }}</td>
                    <td class="p-3">{{ $member->name }}</td>
                    <td class="p-3">
                        @foreach ($member->services as $service)
                        <div>
                            <strong>Type:</strong> {{ $service->service_type }}<br>
                            <strong>Status:</strong> {{ $service->status }}
                        </div>
                        @endforeach
                    </td>
                    <td class="p-3">
                        @foreach ($member->lockers as $locker)
                        <div>
                            <strong>Locker No:</strong> {{ $locker->locker_no }}<br>
                            <strong>Due Date:</strong> {{ $locker->due_date }}
                        </div>
                        @endforeach
                    </td>
                    <td class="p-3">
                        @foreach ($member->treadmills as $treadmill)
                        <div>
                            <strong>Start Date:</strong> {{ $treadmill->start_date }}<br>
                            <strong>Status:</strong> {{ $treadmill->status }}
                        </div>
                        @endforeach
                    </td>
                    <td class="p-3">
                        @if ($member->qrcode)
                        <img src="{{ $member->qrcode->url }}" alt="QR Code" class="h-12">
                        @else
                        N/A
                        @endif
                    </td>
                    <td class="p-3">
                        @if ($member->membershipDuration)
                        <div>
                            <strong>Duration:</strong> {{ $member->membershipDuration->duration }}<br>
                            <strong>Start Date:</strong> {{ $member->membershipDuration->start_date }}
                        </div>
                        @else
                        N/A
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <div class="text-center mt-6">
            <p class="text-red-500 mb-4">No data found for this user.</p>
            <p class="text-red-500 mb-4">Link now by scanner your Provided QRCODE to view your services</p>
            @include ('components.homepage.my-services.scanner')
        </div>
        @endif

    </body>
</x-guest-layout>