<!DOCTYPE html>
<html>

<head>
    <title>QR Scanner</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
            padding: 1rem;
        }

        .container {
            width: min(95%, 600px);
            margin: 0 auto;
            padding: clamp(10px, 3vw, 20px);
            background: white;
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

        /* Hide default QR scanner elements that might cause overflow */
        #reader video {
            max-width: 100% !important;
            height: auto !important;
        }

        #reader__scan_region {
            max-width: 100% !important;
            height: auto !important;
        }

        #reader__dashboard {
            padding: 5px !important;
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

        /* Specific mobile optimizations */
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

        /* Prevent text size adjustment on orientation change */
        html {
            -webkit-text-size-adjust: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="button-container">
            <button class="button" id="startButton">Start Scanner</button>
            <button class="button stop-button" id="stopButton" hidden>Stop Scanner</button>
        </div>

        <div id="reader-container">
            <div id="reader"></div>
            <div id="status-message"></div>
        </div>

        <div id="result">
            <input type="text" id="qrResult" class="input-field" placeholder="QR Code Result" readonly>
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
            startButton.style.display = 'none'; // Hide start button
            stopButton.style.display = 'inline-block'; // Show stop button
            isScanning = true;
            result.classList.add('move-up');
            updateStatus('Scanning for QR Code...');

            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                if (!isScanning) return;

                reader.classList.remove('scanning');
                reader.classList.add('success');
                qrResult.value = decodedText;
                updateStatus('QR Code detected successfully!', true);

                setTimeout(() => {
                    stopScanning(true);
                }, 900);
            };

            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
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
                startButton.style.display = 'inline-block'; // Show start button
                stopButton.style.display = 'none'; // Hide stop button
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

</html>