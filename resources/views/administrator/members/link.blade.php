<x-guest-layout>
    <div class="">

        <div
            class="flex flex-col items-center justify-center min-h-screen bg-blue-100 dark:bg-blue-900 text-blue-900 dark:text-blue-100">

            @if(session('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg  dark:text-red-400 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only ">Info</span>
                    <div>
                        <span class=" font-medium">Alert</span> {{ session('error') }}
                    </div>
                </div>
            @endif

            <h1 class="text-4xl font-bold mb-8">Personalized Linking QR for {{$member->name}}</h1>
            <h5>Scan a Qrcode now</h5>
            <div
                class="flex items-center justify-center w-64 h-32 bg-blue-200 dark:bg-blue-800 border border-blue-300 dark:border-blue-700 rounded-lg shadow-lg">
                <!-- Hidden input field to capture QR code data -->
                <textarea id="qrInput" class="hidden form-control" rows="1"></textarea>

                <!-- Laravel Form -->
                <form action="{{ route('link.update', $member->id) }}" method="POST">
                    @csrf
                    <input type="text" name="id_number" id="id_number" maxlength="10"
                        class="hidden w-full p-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-ring mb-4"
                        x-model="scannedValue" required readonly />
                    <button type="submit"></button>
                </form>

                <div class="flex items-center gap-3">

                    @if(session('error'))
                        <!-- Error Notification -->
                        <svg class="animate-spin h-5 w-5 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span class="text-lg text-red-800 font-medium">Please Scan Again ...</span>


                    @else

                            <!-- Spinning Icon -->
                            <svg class="animate-spin h-5 w-5 text-blue-600 dark:text-blue-400"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="text-lg font-medium">Waiting for Scanner ...</span>
                        </div>
                    @endif
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const qrInput = document.getElementById('qrInput');
            const idNumberInput = document.getElementById('id_number');
            const form = idNumberInput.closest('form');

            // Force focus on the hidden input when the page loads
            qrInput.focus();

            // Keep focus on the hidden input even if user clicks elsewhere
            document.addEventListener('click', function () {
                qrInput.focus();
            });

            // Prevent blur events on the hidden input
            qrInput.addEventListener('blur', function (e) {
                setTimeout(() => qrInput.focus(), 0);
            });

            // Handle the QR scanner input
            let scanBuffer = '';
            let scanTimeout;

            document.addEventListener('keydown', function (e) {
                // Append the character to our buffer
                scanBuffer += e.key;

                // Clear the timeout if it exists
                if (scanTimeout) {
                    clearTimeout(scanTimeout);
                }

                // Set a new timeout - if no new characters come in within 50ms, process the scan
                scanTimeout = setTimeout(() => {
                    // Filter out any function keys or special characters
                    const cleanData = scanBuffer
                        .replace(/Enter/g, '')
                        .replace(/Shift/g, '')
                        .trim();

                    if (cleanData) {
                        // Update the form input with the scanned data
                        idNumberInput.value = cleanData;

                        // If the scanner sends an Enter key, submit the form
                        if (scanBuffer.includes('Enter')) {
                            form.submit();
                        }

                        // Clear the buffer
                        scanBuffer = '';

                        // Trigger custom event
                        const scanEvent = new CustomEvent('qrScanned', {
                            detail: {
                                data: cleanData
                            }
                        });
                        document.dispatchEvent(scanEvent);
                    }
                }, 50);
            });
        });
    </script>
</x-guest-layout>