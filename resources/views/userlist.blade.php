<x-guest-layout>
    <div class="container mx-auto" x-data="{ openLink: null }" x-init="barcodeScanner().init()">
        <h2 class="text-xl font-bold mb-4">Members List</h2>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">ID Number</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $member->id_number ?? 'Unlinked' }}</td>
                        <td class="px-4 py-2">{{ $member->name }}</td>
                        <td class="px-4 py-2">{{ $member->email }}</td>
                        <td class="px-4 py-2">
                            @if($member->id_number)
                                <button class="bg-gray-300 text-gray-700 cursor-not-allowed px-4 py-2 rounded-lg" disabled>
                                    Already Linked
                                </button>
                            @else
                                <a href="{{ route('linkuser', $member->id) }}"
                                    class="text-white bg-blue-500 hover:bg-blue-700 rounded px-3 py-1">
                                    Link
                                </a>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</x-guest-layout>