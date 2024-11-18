<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Services</title>
    @vite('resources/css/app.css')
    <!-- Include Tailwind CSS -->
</head>

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
        <form action="{{ route('update.id_number') }}" method="POST" class="inline-block">
            @csrf
            <label for="id_number" class="block text-gray-700 font-bold mb-2">Enter New ID Number</label>
            <input type="text" name="id_number" id="id_number"
                class="border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 p-2 mb-2"
                placeholder="Enter ID Number">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>
        </form>
    </div>
    @endif

</body>

</html>

<script>
function barcodeScanner() {
    return {
        scannedValue: '',
        buffer: '',
        debugLog: '',
        lastKeyTime: 0,
        keyDelay: 50,
        collecting: false,
        keyCount: 0,

        init() {
            // Track when user starts typing manually
            document.getElementById('searchInput').addEventListener('focus', () => {
                this.isTypingManually = true;
            });

            document.getElementById('searchInput').addEventListener('blur', () => {
                this.isTypingManually = false;
            });

            // Handle keydown events
            document.addEventListener('keydown', (e) => {
                const currentTime = new Date().getTime();
                const timeDiff = currentTime - this.lastKeyTime;

                // If it's rapid typing (like from a scanner) and not manual typing
                if (timeDiff < this.keyDelay && !this.isTypingManually) {
                    this.collecting = true;
                }
                // Start new scan if sufficient time has passed
                else if (timeDiff > 500) {
                    // Only start collecting if it's not manual typing
                    if (!this.isTypingManually) {
                        this.buffer = '';
                        this.keyCount = 0;
                        this.collecting = true;
                    }
                }

                // Only collect if we're in scanning mode
                if (this.collecting) {
                    // Handle special cases
                    if (e.keyCode === 13) { // Enter key
                        this.finalizeScan();
                        e.preventDefault();
                        return;
                    }

                    // Add to buffer based on keyCode rather than key value
                    const char = this.mapKeyCodeToChar(e.keyCode, e.shiftKey);
                    if (char) {
                        this.buffer += char;
                        this.keyCount++;
                        e.preventDefault(); // Prevent key from being typed into input
                    }
                }

                this.lastKeyTime = currentTime;
            });
        },

        mapKeyCodeToChar(keyCode, isShift) {
            // Common URL characters mapping
            const keyMap = {
                190: '.', // Period
                191: '/', // Forward slash
                186: ':', // Colon
                189: '-', // Hyphen
                // Add numbers
                48: '0',
                49: '1',
                50: '2',
                51: '3',
                52: '4',
                53: '5',
                54: '6',
                55: '7',
                56: '8',
                57: '9',
                // Add letters (lowercase)
                65: 'a',
                66: 'b',
                67: 'c',
                68: 'd',
                69: 'e',
                70: 'f',
                71: 'g',
                72: 'h',
                73: 'i',
                74: 'j',
                75: 'k',
                76: 'l',
                77: 'm',
                78: 'n',
                79: 'o',
                80: 'p',
                81: 'q',
                82: 'r',
                83: 's',
                84: 't',
                85: 'u',
                86: 'v',
                87: 'w',
                88: 'x',
                89: 'y',
                90: 'z'
            };

            let char = keyMap[keyCode];
            if (char && isShift) {
                // Handle shift modifications for special characters
                if (char === '/') return '?';
                if (char === '.') return '>';
                // Convert to uppercase if it's a letter
                return char.toUpperCase();
            }
            return char || '';
        },

        finalizeScan() {
            if (this.buffer.length > 0) {
                // Clean up common scanning artifacts
                let cleaned = this.buffer
                    .replace(/^[>:]+/, '')
                    .replace(/[<>]+$/, '')
                    .trim();

                // Add http:// if it looks like a URL without protocol
                if (cleaned.match(/^[a-zA-Z0-9-]+\.[a-zA-Z]{2,}/)) {
                    cleaned = 'http://' + cleaned;
                }

                this.scannedValue = cleaned;

                // Get the search form and set the value
                const form = document.getElementById('searchForm');
                const searchInput = form.querySelector('input[name="search"]');
                if (searchInput) {
                    searchInput.value = cleaned;
                }

                // Submit form with fetch to avoid page reload
                fetch(form.action + '?search=' + encodeURIComponent(cleaned))
                    .then(response => response.text())
                    .then(html => {
                        // Create a temporary container
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;

                        // Update only the table body content
                        const currentTable = document.querySelector('.overflow-x-auto tbody');
                        const newTable = tempDiv.querySelector('.overflow-x-auto tbody');
                        if (currentTable && newTable) {
                            currentTable.innerHTML = newTable.innerHTML;

                            // Find the first row and initialize Alpine component
                            const firstRow = currentTable.querySelector('tr');
                            if (firstRow) {
                                // Initialize Alpine data for the row
                                if (!firstRow.__x) {
                                    Alpine.initTree(firstRow);
                                }

                                // Set the open state to true
                                firstRow.__x.$data.open = true;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error during fetch:', error);
                    });
            }
            this.collecting = false;
            this.buffer = '';
        },

        clearDebug() {
            this.debugLog = '';
        }
    }
}

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