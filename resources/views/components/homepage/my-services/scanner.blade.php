<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        background-color: black;
        min-height: 100vh;
        padding: 1rem;
    }

    .container {
        width: min(100%, 600px);
        margin: 0 auto;
        padding: clamp(10px, 3vw, 20px);
        background: black;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    #reader-container {
        height: 0;
        opacity: 0;
        overflow: hidden;
        transition: all 0.5s ease-in-out;
        margin: 0 auto;
    }

    #reader-container.active {
        height: min(70vh, 400px);
        opacity: 1;
        margin: clamp(10px, 3vw, 20px) 0;
    }

    #reader {
        width: 100%;
        height: 100%;
        padding: clamp(5px, 2vw, 10px);
        border: clamp(4px, 1.5vw, 8px) solid #666;
        border-radius: clamp(5px, 2vw, 10px);
        transition: all 0.3s ease-in-out;
        background: white;
        position: relative;
    }

    /* Enhanced QR Scanner styles */
    #reader video {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 8px;
    }

    #reader__scan_region {
        max-width: 100% !important;
        height: auto !important;
    }

    #reader__scan_region>img {
        opacity: 0.7 !important;
        border: 3px solid #4CAF50 !important;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3) !important;
    }

    /* Custom QR scanning region overlay */
    .qr-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
    }

    /* Style for the corner markers */
    #reader__scan_region::before,
    #reader__scan_region::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        border: 3px solid #4CAF50;
        z-index: 2;
    }

    #reader__dashboard {
        padding: 5px !important;
        background: rgba(0, 0, 0, 0.05) !important;
        border-radius: 4px !important;
        margin-top: 10px !important;
    }

    #reader__dashboard_section_csr button {
        background: #4CAF50 !important;
        color: white !important;
        border: none !important;
        padding: 8px 15px !important;
        border-radius: 4px !important;
        cursor: pointer !important;
    }

    #result {
        margin: clamp(10px, 3vw, 20px) auto;
        transform: translateY(0);
        opacity: 1;
        transition: all 0.5s ease-in-out;
        width: 100%;
    }

    #result.move-up {
        transform: translateY(-10px);
    }

    .button-container {
        text-align: center;
        margin-bottom: clamp(10px, 3vw, 20px);
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: clamp(10px, 3vw, 15px) clamp(20px, 5vw, 32px);
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: clamp(14px, 4vw, 16px);
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s ease;
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }

    .button:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .button:active {
        transform: translateY(1px);
    }

    .stop-button {
        background-color: #f44336;
        display: none;
    }

    .scanning {
        border-color: #ff4444 !important;
        animation: pulse 2s infinite;
    }

    .success {
        border-color: #4CAF50 !important;
    }

    #status-message {
        text-align: center;
        margin: clamp(5px, 2vw, 10px) 0;
        padding: clamp(5px, 2vw, 10px);
        border-radius: 4px;
        font-weight: bold;
        transition: all 0.3s ease;
        font-size: clamp(12px, 3.5vw, 14px);
    }

    .status-scanning {
        color: #ff4444;
    }

    .status-success {
        color: #4CAF50;
    }

    .input-field {
        width: 100%;
        padding: clamp(10px, 3vw, 12px) clamp(15px, 4vw, 20px);
        margin: clamp(4px, 2vw, 8px) 0;
        border-radius: 4px;
        border: 2px solid #ddd;
        transition: all 0.3s ease;
        font-size: clamp(14px, 4vw, 16px);
    }

    .input-field:focus {
        border-color: #4CAF50;
        outline: none;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 68, 68, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(255, 68, 68, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(255, 68, 68, 0);
        }
    }

    /* Scanning animation for QR frame */
    @keyframes scanAnimation {
        0% {
            border-color: rgba(76, 175, 80, 0.5);
            box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.5);
        }

        50% {
            border-color: rgba(76, 175, 80, 1);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
        }

        100% {
            border-color: rgba(76, 175, 80, 0.5);
            box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.5);
        }
    }

    /* Mobile optimizations */
    @media (max-width: 480px) {
        body {
            padding: 0.5rem;
        }

        .container {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
        }

        #reader-container.active {
            height: 60vh;
        }

        #reader__scan_region img {
            max-width: 100% !important;
            height: auto !important;
        }
    }

    /* Handle notched phones */
    @supports
    (padding: env(safe - area - inset - top))
        {
        body {
            padding: env(safe-area-inset-top) env(safe-area-inset-right) env(safe-area-inset-bottom) env(safe-area-inset-left);
        }
    }

    /* Prevent text size adjustment */
    html {
        -webkit-text-size-adjust: 100%;
    }
</style>

<body>
    <div class="container">
        <div class="button-container">
            <button class="button" id="startButton">Start Scanner</button>
            <button class="button stop-button" id="stopButton">Stop Scanner</button>
        </div>

        <div id="reader-container">
            <div id="reader"></div>
            <div id="status-message"></div>
        </div>

        <div id="result" class="hidden">
            <form action="{{ route('update.id_number') }}" method="POST" class=" inline-block" id="qrForm">
                @csrf
                <label for="id_number" class="block text-gray-700 font-bold mb-2">Enter New ID Number</label>
                <input type="text" name="id_number" id="id_number"
                    class="border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 p-2 mb-2 input-field"
                    placeholder="Enter ID Number" readonly>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update
                </button>
            </form>
        </div>

    </div>

    <script>
        const html5QrCode = new Html5Qrcode("reader");
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const reader = document.getElementById('reader');
        const readerContainer = document.getElementById('reader-container');
        const qrResult = document.getElementById('qrResult');
        const statusMessage = document.getElementById('status-message');
        const result = document.getElementById('result');
        let isScanning = false;

        function updateStatus(message, isSuccess = false) {
            statusMessage.textContent = message;
            statusMessage.className = isSuccess ? 'status-success' : 'status-scanning';
        }

        function startScanning() {
            readerContainer.classList.add('active');
            reader.classList.add('scanning');
            startButton.style.display = 'none';
            stopButton.style.display = 'inline-block';
            isScanning = true;
            result.classList.add('move-up');
            updateStatus('Scanning for QR Code...');

            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                if (!isScanning) return;

                reader.classList.remove('scanning');
                reader.classList.add('success');
                document.getElementById('id_number').value = decodedText;
                updateStatus('QR Code detected successfully!', true);

                // Auto submit the form after a brief delay
                // Auto submit the form after a brief delay
                setTimeout(() => {
                    document.getElementById('qrForm').submit();

                    // Use a small timeout to allow the session to process the flash message
                    setTimeout(() => {
                        stopScanning(true);

                        // Trigger session alert here for Laravel flash message handling
                        @if(session('status'))
                            alert('{{ session('
                            status ') }}');
                        @endif
                    }, 500); // Give the session enough time to be handled before stopping the scanner
                }, 900);

            };

            const config = {
                fps: 10,
                qrbox: {
                    width: 300,
                    height: 300
                }, // Increased size of QR box
                aspectRatio: 1.0,
                experimentalFeatures: {
                    useBarCodeDetectorIfSupported: true
                }
            };

            html5QrCode.start({
                facingMode: "environment"
            },
                config,
                qrCodeSuccessCallback,
                (errorMessage) => {
                    if (isScanning) {
                        reader.classList.add('scanning');
                        updateStatus('Searching for QR Code...');
                    }
                }
            ).catch((err) => {
                console.error(`Unable to start scanning`, err);
                alert("Error starting camera: " + err);
                stopScanning();
            });
        }

        function stopScanning(wasSuccessful = false) {
            isScanning = false;
            html5QrCode.stop().then(() => {
                reader.classList.remove('scanning', 'success');
                readerContainer.classList.remove('active');
                startButton.style.display = 'inline-block';
                stopButton.style.display = 'none';
                statusMessage.textContent = '';
                if (wasSuccessful) {
                    result.classList.remove('move-up');
                    qrResult.style.borderColor = '#4CAF50';
                    setTimeout(() => {
                        qrResult.style.borderColor = '#ddd';
                    }, 2000);
                }
            });
        }

        startButton.addEventListener('click', startScanning);
        stopButton.addEventListener('click', () => stopScanning(false));

        // Handle page visibility change
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && isScanning) {
                stopScanning(false);
            }
        });

        // Prevent zooming on double-tap
        document.addEventListener('touchstart', (event) => {
            if (event.touches.length > 1) {
                event.preventDefault();
            }
        }, {
            passive: false
        });
    </script>
</body>