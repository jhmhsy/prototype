<x-dash-layout>
    <div class="container">
        <h1>Member Check-in</h1>

        <form id="searchForm" action="{{ route('checkin.index') }}" method="GET" class="mb-4">
            <input id="qrOutput" name="search" type="hidden"> <!-- Hidden input for the QR code output -->
            <input type="file" id="qrInput" accept="image/*"> <!-- Input for uploading QR code image -->
        </form>

        <form action="{{ route('checkin.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by ID Number"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id_number }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        @php
                                            // Check if the member has already checked in today
                                            $alreadyCheckedIn = \App\Models\CheckinRecord::where('user_id', $member->id)
                                                ->whereDate('checkin_date', \Carbon\Carbon::now()->toDateString())
                                                ->exists();
                                        @endphp
                                        @if ($alreadyCheckedIn)
                                            <span class="text-danger">User has checked in.</span>
                                        @else
                                            <form action="{{ route('checkin.store', $member) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success" {{ $alreadyCheckedIn ? 'disabled' : '' }}>
                                                    Check-in
                                                </button>
                                            </form>
                                        @endif



                                    </td>
                                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $members->links() }}
    </div>
</x-dash-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>
<script>
    const qrInput = document.getElementById("qrInput");

    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                processQRCode(e.target.result); // Process the QR code from the uploaded image
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
                // Set the decoded data into the hidden input
                document.getElementById("qrOutput").value = code.data; // Hidden input

                // Automatically submit the form to the controller
                document.getElementById("searchForm").submit();
            } else {
                console.log("No QR code found."); // Log if no QR code is found
            }
        };
        img.src = imageData;
    }
</script>