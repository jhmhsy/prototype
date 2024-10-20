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
                    <tr>
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
                            @else
                            <form action="{{ route('checkin.store', $member) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded text-sm transition duration-300"
                                    {{ $alreadyCheckedIn ? 'disabled' : '' }}>
                                    Check-in
                                </button>
                            </form>
                            @endif
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
}
</script>