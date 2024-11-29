<x-guest-layout class="bg-black">
    <header id="header-section" class="transition-transform duration-150 ease-in-out  dark:bg-black">
        @include ('components.homepage.header-section')
    </header>

    <main class=" pt-24 p-6 bg-black h-[100vh]">

        <!-- if auth is a SuperAdmin - doesnt need a services -->
        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
        <div ss="text-center mt-6">
            <p class="text-white text-2xl mb-4">"Administrative users do not require a QR code."</p>
        </div>

        @else
        @if ($member)
        <h1 class="text-2xl font-bold mb-6 text-yellow-300 ">Member <span class="text-white">Services</span></h1>

        <body class="bg-background text-foreground min-h-screen flex items-start justify-center p-4 w-full">
            <div class="flex flex-col md:flex-row w-full max-w-[95%] mx-auto space-y-4 md:space-y-0 md:space-x-4">
                <!-- User Information Card -->
                <div class="w-full md:w-[30%] p-6 bg-card text-card-foreground rounded-lg shadow-md">

                    <h2 class="text-2xl font-bold mb-4 text-white">User Information</h2>
                    <div class="space-y-4 text-gray-500">
                        <div>
                            <label class="block text-sm font-medium text-muted-foreground">Name</label>
                            <p class="text-white">{{ $member->name ?? 'N\A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-muted-foreground">Email</label>
                            <p class="text-white">{{ $member->email ?? 'N\A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-muted-foreground">Facebook</label>
                            <p class="text-white">{{ $member->fb ?? 'N\A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-muted-foreground">Membership</label>
                            <p class="text-white">{{ $member->membership_type ?? 'N\A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-muted-foreground">Membership Duration</label>
                            <p class="text-white">
                                @if ($member->membershipDuration)
                                {{ \Carbon\Carbon::parse($member->membershipDuration->start_date)->format('M j, Y') }}
                                -
                                {{ \Carbon\Carbon::parse($member->membershipDuration->due_date)->format('M j, Y') }}
                                @else
                            <p class="text-white">duration here</p>
                            @endif
                            </p>


                        </div>
                    </div>
                </div>

                <!-- Service Details Card -->
                <div class="w-full md:w-[70%] p-6 bg-card text-card-foreground rounded-lg shadow-md">


                    <h2 class="text-2xl font-bold mb-4 text-md text-white">Service Details</h2>
                    <div class="overflow-x-auto relative">
                        <div class="overflow-y-auto max-h-[500px]">
                            <table class="w-full text-left border-collapse min-w-[800px]">
                                <thead class="sticky top-0 bg-card z-10 text-sm">
                                    <tr class="text-gray-500">
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Service Type
                                        </th>
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Amount
                                        </th>
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Months
                                        </th>
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Start date
                                        </th>
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Due date
                                        </th>
                                        <th
                                            class="border-b border-gray-500 py-3 px-4 text-sm font-medium text-muted-foreground">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member->services as $service)
                                    <tr class="hover:bg-muted/50 transition-colors text-white">
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ $service->service_type }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            ₱{{ $service->amount }}</td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ $service->month }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($service->start_date)->format('M j, Y') }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($service->due_date)->format('M j, Y') }}
                                        </td>
                                        @php
                                        $statusClass = match ($service->status) {
                                        'Active' => 'text-green-600', 'Pre-paid' => 'text-blue-700', 'Due'
                                        => 'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                        'text-gray-500', default => '',
                                        };
                                        @endphp
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm {{ $statusClass }}">
                                            {{ $service->status }}
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach($member->lockers as $locker)
                                    <tr class="hover:bg-muted/50 transition-colors text-white">
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            Locker #{{ $locker->locker_no }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            ₱{{ $locker->amount }}</td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ $locker->month }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($locker->start_date)->format('M j, Y') }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($locker->due_date)->format('M j, Y') }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm {{ match ($locker->status) {
                                                    'Active' => 'text-green-600',
                                                    'Pre-paid' => 'text-blue-700',
                                                    'Due' => 'text-orange-500',
                                                    'Overdue' => 'text-red-700',
                                                    'Expired' => 'text-gray-500',
                                                    default => '',
                                                } }}">
                                            {{ $locker->status }}
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach($member->treadmills as $treadmill)
                                    <tr class="hover:bg-muted/50 transition-colors text-white">
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            Treadmill
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ $treadmill->amount }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ $treadmill->month }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($treadmill->start_date)->format('M j, Y') }}
                                        </td>
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm">
                                            {{ \Carbon\Carbon::parse($treadmill->due_date)->format('M j, Y') }}
                                        </td>
                                        @php
                                        $statusClass = match ($treadmill->status) {
                                        'Active' => 'text-green-600', 'Pre-paid' => 'text-blue-700',
                                        'Due'
                                        =>
                                        'text-orange-500', 'Overdue' => 'text-red-700', 'Expired' =>
                                        'text-gray-500',
                                        default => '',
                                        };
                                        @endphp
                                        <td class="border-b border-gray-500 py-3 px-4  text-sm {{ $statusClass }}">
                                            {{ $treadmill->status }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        @else
        <div class="text-center mt-6">
            <p class="text-white text-2xl mb-4">Not Linked Yet.</p>
            <p class="text-white mb-4"><span class="text-green-500">✓ </span> Ensure the email you gave to the staff
                matches the one registered to this account
            </p>

            <p class="text-gray-500 mb-4">or
            </p>


            <p class="text-gray-300 text-sm mb-4">Link now by scanning your provided QR code to view your services.</p>
            @include ('components.homepage.my-services.scanner')
        </div>
        @endif
        @endif




    </main>
</x-guest-layout>