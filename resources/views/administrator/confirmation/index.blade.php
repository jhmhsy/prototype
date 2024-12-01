@can('confirmation-list')
<x-dash-layout title="Roles">
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text:black dark:text-gray-300 dark:bg-peak-3 border dark:border-white/10 rounded-lg"
        x-data="{ openeditmodal: null, openshowmodal: null, opencreatemodal: null }">

        <div class="flex flex-col gap-2">
            <div class="flex flex-row">
                <h1 class="text-2xl font-bold mb-6">Confirmations</h1>
            </div>

            <div class="rounded-lg" data-v0-t="card">
                <div class="p-2">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full text-sm mb-3">
                            <thead class="text-black dark:text-gray-500">
                                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle">Owner</th>
                                    <th class="h-12 px-4 text-left align-middle">Type</th>
                                    <th class="h-12 px-4 text-left align-middle">Status</th>
                                    <th class="h-12 px-4 text-left align-middle">Amount</th>
                                    <th class="h-12 px-4 text-left align-middle">Duration</th>
                                    <th class="h-12 px-4 text-left align-middle">Purpose</th>
                                    <th class="h-12 text-center align-middle font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingMembers as $member)
                                <tr
                                    class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $member->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $member->membership_type }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $member->membershipDuration->status ?? 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $member->amount }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $member->membershipDuration->start_date ?? 'N/A' }} -
                                        {{ $member->membershipDuration->due_date ?? 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left text-amber-700">
                                        Member Pending for Deletion
                                    </td>
                                    <td class="px-4 align-middle">
                                        <div class="action-dropdown flex items-center justify-center">
                                            <button
                                                class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                </svg>
                                            </button>
                                            <div
                                                class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                <div class="py-1">
                                                    <form action="{{ route('member.approve', $member->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="w-4 h-4 mr-3">
                                                                <path
                                                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('member.disapprove', $member->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="w-4 h-4 mr-3"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                            </svg>
                                                            Disapprove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach



                                @foreach($pendingServices as $service)
                                <tr
                                    class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $service->member->name}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $service->service_type }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $service->status }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $service->amount }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left">
                                        {{ $service->start_date }} - {{ $service->due_date }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left text-amber-700">
                                        Service Pending for Cancelation
                                    </td>
                                    <td class="px-4 align-middle">
                                        <div class="action-dropdown flex items-center justify-center">
                                            <button
                                                class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                </svg>
                                            </button>
                                            <div
                                                class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                <div class="py-1">
                                                    <form action="{{ route('services.approve', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="w-4 h-4 mr-3">
                                                                <path
                                                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('services.disapprove', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="w-4 h-4 mr-3"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                            </svg>
                                                            Disapprove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach($pendingLockers as $locker)
                                <tr
                                    class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                    <td class="whitespace-nowrap px-4 text-left">{{ $locker->member->name}}</td>
                                    <td class="whitespace-nowrap px-4 text-left">Locker No#{{ $locker->locker_no }}</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $locker->status }}</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $locker->amount }}</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $locker->start_date }} -
                                        {{ $locker->due_date }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left text-amber-700">Locker Pending for
                                        Cancelation
                                    </td>
                                    <td class="px-4 align-middle">
                                        <div class="action-dropdown flex items-center justify-center">
                                            <button
                                                class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                </svg>
                                            </button>
                                            <div
                                                class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                <div class="py-1">
                                                    <form action="{{ route('locker.approve', $locker->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="w-4 h-4 mr-3">
                                                                <path
                                                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('locker.disapprove', $locker->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="w-4 h-4 mr-3"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                            </svg>
                                                            Disapprove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach($pendingTreadmills as $treadmill)
                                <tr
                                    class="transition-colors py-10 {{ $loop->iteration % 2 == 0 ? 'bg-gray-100 dark:bg-peak_2' : '' }}">
                                    <td class="whitespace-nowrap px-4 text-left">{{ $treadmill->member->name}}</td>
                                    <td class="whitespace-nowrap px-4 text-left">Treadmill</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $treadmill->status }}</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $treadmill->amount }}</td>
                                    <td class="whitespace-nowrap px-4 text-left">{{ $treadmill->start_date }} -
                                        {{ $treadmill->due_date }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 text-left text-amber-700">Treadmill Pending for
                                        Cancelation
                                    </td>
                                    <td class="px-4 align-middle">
                                        <div class="action-dropdown flex items-center justify-center">
                                            <button
                                                class="dropdown-button p-1 rounded-md hover:bg-gray-100 dark:hover:bg-peak_3 transition-colors relative">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white font-bold"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                </svg>
                                            </button>
                                            <div
                                                class="action-dropdown-menu fixed bg-white dark:bg-peak_2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 w-48 hidden">
                                                <div class="py-1">
                                                    <form action="{{ route('treadmill.approve', $treadmill->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="w-4 h-4 mr-3">
                                                                <path
                                                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('treadmill.disapprove', $treadmill->id) }}"
                                                        methomethod="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full group flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-peak_3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="w-4 h-4 mr-3"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                            </svg>
                                                            Disapprove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>
@endcan