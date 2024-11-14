<x-guest-layout>
    <div class="container">
        <h2>Scan QR Code</h2>

        <!-- Hidden input field to capture QR code data -->
        <textarea id="qrInput" class="form-control" rows="1"
            style="position: fixed; top: -100px; left: -100px; opacity: 0; pointer-events: none;"></textarea>

        <!-- Laravel Form -->
        <form action="{{ route('link.update', $member->id) }}" method="POST">
            @csrf
            <label for="id_number" class="block text-sm font-medium text-muted-foreground mb-2">
                Scan barcode to link user
            </label>
            <input type="text" name="id_number" id="id_number" maxlength="10"
                class="w-full p-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-ring mb-4"
                placeholder="Waiting for scan..." x-model="scannedValue" required readonly />

            <button type="submit"></button>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const qrInput = document.getElementById('qrInput');
        const idNumberInput = document.getElementById('id_number');
        const form = idNumberInput.closest('form');

        // Force focus on the hidden input when the page loads
        qrInput.focus();

        // Keep focus on the hidden input even if user clicks elsewhere
        document.addEventListener('click', function() {
            qrInput.focus();
        });

        // Prevent blur events on the hidden input
        qrInput.addEventListener('blur', function(e) {
            setTimeout(() => qrInput.focus(), 0);
        });

        // Handle the QR scanner input
        let scanBuffer = '';
        let scanTimeout;

        document.addEventListener('keydown', function(e) {
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