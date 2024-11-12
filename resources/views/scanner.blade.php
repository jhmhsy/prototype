<!DOCTYPE html>
<html>

<head>
    <title>QR Scanner</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .scanner-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        #reader {
            width: 100%;
            background: white;
            border-radius: 8px;
        }

        .controls {
            margin: 20px 0;
            display: flex;
            gap: 10px;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .history {
            margin-top: 20px;
        }

        .history-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .hardware-scanner {
            margin: 20px 0;
            padding: 15px;
            background: #f0f0f0;
            border-radius: 8px;
        }

        .hardware-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .debug-info {
            margin-top: 20px;
            padding: 10px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            font-family: monospace;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <d iv x-data="scanner()" class="scanner-container">
        <div class="controls">
            <button @click="startScanner" x-show="!isScanning">Start Camera Scanner</button>
            <button @click="stopScanner" x-show="isScanning">Stop Scanner</button>
            <input type="file" @change="handleFileSelect($event)" accept="image/*">
        </div>

        <div id="reader"></div>

        <div class="hardware-scanner">
            <h3>Hardware Scanner Input</h3>
            <input type="text" x-ref="hardwareInput" x-model="hardwareBuffer" class="hardware-input"
                placeholder="Focus here and scan with your hardware scanner..." readonly>
        </div>

        <div x-show="debugMode" class="debug-info">
            <h4>Debug Information</h4>
            <div x-text="debugLog"></div>
            <button @click="clearDebug">Clear Debug Log</button>
        </div>

        <div x-show="error" class="error" x-text="error"></div>

        <div x-show="currentResult" class="result">
            <h3>Last Scanned Result:</h3>
            <p x-text="currentResult"></p>
            <template x-if="isValidUrl(currentResult)">
                <a :href="currentResult" target="_blank">Open Link</a>
            </template>
        </div>

        <div class="history">
            <h3>Scan History</h3>
            <template x-for="(item, index) in scanHistory" :key="index">
                <div class="history-item">
                    <span x-text="item.result"></span>
                    <small x-text="item.timestamp"></small>
                </div>
            </template>
        </div>
    </d>

    <script>
        function scanner() {
            return {
                html5QrCode: null,
                isScanning: false,
                currentResult: '',
                error: '',
                scanHistory: [],
                hardwareBuffer: '',
                lastKeyTime: 0,
                keyDelay: 50,
                collecting: false,
                debugMode: false,
                debugLog: '',

                init() {
                    this.html5QrCode = new Html5Qrcode("reader");
                    this.initializeHardwareScanner();
                },

                initializeHardwareScanner() {
                    let codeBuffer = '';
                    let lastInputTime = Date.now();
                    const SCANNER_TIMEOUT = 100; // Time window for scanner input in milliseconds

                    document.addEventListener('keypress', (e) => {
                        const currentTime = Date.now();

                        // If too much time has passed, start a new scan
                        if (currentTime - lastInputTime > SCANNER_TIMEOUT) {
                            codeBuffer = '';
                        }

                        // Update the last input time
                        lastInputTime = currentTime;

                        // Add character to buffer
                        if (e.key !== 'Enter') {
                            codeBuffer += e.key;
                        } else {
                            // Process the complete scan when Enter is pressed
                            this.processCompleteScan(codeBuffer);
                            codeBuffer = '';
                            e.preventDefault();
                        }
                    });
                },

                mapKeyCodeToChar(keyCode, isShift) {
                    const keyMap = {
                        190: '.', // Period
                        191: '/', // Forward slash
                        186: ':', // Colon
                        189: '-', // Hyphen
                        // Numbers
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
                        // Letters
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
                        if (char === '/') return '?';
                        if (char === '.') return '>';
                        return char.toUpperCase();
                    }
                    return char || '';
                },
                processCompleteScan(rawScan) {
                    if (!rawScan) return;

                    // Clean and process the scanned data
                    let processedScan = this.cleanScanData(rawScan);

                    // Handle the scan through the main success handler
                    this.onScanSuccess(processedScan);
                },

                cleanScanData(raw) {
                    // Remove any common prefixes/suffixes added by scanners
                    let cleaned = raw
                        .replace(/[\u0000-\u001F\u007F-\u009F]/g, '') // Remove control characters
                        .replace(/^[\r\n\t\s]+|[\r\n\t\s]+$/g, '') // Remove leading/trailing whitespace
                        .replace(/^[>:\[\]\(\)]+/, '') // Remove leading scanner artifacts
                        .replace(/[<>\[\]\(\)]+$/, '') // Remove trailing scanner artifacts
                        .trim();

                    // If it looks like a URL but missing protocol, add it
                    if (cleaned.match(/^(youtube\.com|youtu\.be)/i)) {
                        cleaned = 'https://' + cleaned;
                    }

                    // Handle YouTube short URLs
                    if (cleaned.match(/^youtu\.be\//i)) {
                        cleaned = 'https://' + cleaned;
                    }

                    return cleaned;
                },

                async onScanSuccess(decodedText) {
                    // Prevent duplicate scans
                    if (this.currentResult === decodedText) return;

                    // Process potential YouTube URLs
                    if (decodedText.includes('youtu.be/') || decodedText.includes('youtube.com/')) {
                        try {
                            const url = new URL(decodedText);
                            if (!url.protocol) {
                                decodedText = 'https://' + decodedText;
                            }
                        } catch (e) {
                            // If URL parsing fails, try adding https://
                            if (!decodedText.startsWith('http')) {
                                decodedText = 'https://' + decodedText;
                            }
                        }
                    }

                    this.currentResult = decodedText;
                    this.error = '';

                    // Add to history
                    this.scanHistory.unshift({
                        result: decodedText,
                        timestamp: new Date().toLocaleTimeString()
                    });

                    // Keep history manageable
                    if (this.scanHistory.length > 10) {
                        this.scanHistory.pop();
                    }

                    // Send to server
                    await this.sendToServer(decodedText);
                },

                processHardwareScan() {
                    if (this.hardwareBuffer.length > 0) {
                        // Clean up scanning artifacts
                        let cleaned = this.hardwareBuffer
                            .replace(/^[>:]+/, '') // Remove leading >: characters
                            .replace(/[<>]+$/, '') // Remove trailing <> characters
                            .trim();

                        // Add protocol if it looks like a URL
                        if (cleaned.match(/^[a-zA-Z0-9-]+\.[a-zA-Z]{2,}/)) {
                            cleaned = 'http://' + cleaned;
                        }

                        this.onScanSuccess(cleaned);
                    }
                    this.collecting = false;
                    this.hardwareBuffer = '';
                },

                async startScanner() {
                    try {
                        this.error = '';
                        this.isScanning = true;

                        await this.html5QrCode.start({
                            facingMode: "environment"
                        }, {
                            fps: 10,
                            qrbox: {
                                width: 250,
                                height: 250
                            },
                        },
                            this.onScanSuccess.bind(this),
                            this.onScanError.bind(this)
                        );
                    } catch (err) {
                        this.error = "Camera access error: " + err.message;
                        this.isScanning = false;
                    }
                },

                async stopScanner() {
                    try {
                        await this.html5QrCode.stop();
                        this.isScanning = false;
                    } catch (err) {
                        this.error = "Error stopping scanner: " + err.message;
                    }
                },

                async handleFileSelect(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    try {
                        this.error = '';
                        const result = await this.html5QrCode.scanFile(file, true);
                        this.onScanSuccess(result);
                    } catch (err) {
                        this.error = "Error scanning file: " + err.message;
                    }
                },

                async onScanSuccess(decodedText) {
                    // Prevent duplicate scans
                    if (this.currentResult === decodedText) return;

                    this.currentResult = decodedText;
                    this.error = '';

                    // Add to history
                    this.scanHistory.unshift({
                        result: decodedText,
                        timestamp: new Date().toLocaleTimeString()
                    });

                    // Keep history manageable
                    if (this.scanHistory.length > 10) {
                        this.scanHistory.pop();
                    }

                    // Send to server
                    await this.sendToServer(decodedText);
                },

                onScanError(error) {
                    // Only show error if it's not a routine scanning error
                    if (error !== 'QR code parse error, error = No QR code found') {
                        this.error = error;
                    }
                },

                async sendToServer(result) {
                    try {
                        const response = await fetch('/api/scan', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                result
                            })
                        });

                        if (!response.ok) throw new Error('Server error');

                        const data = await response.json();
                        if (!data.success) throw new Error(data.message);

                    } catch (err) {
                        this.error = "Server error: " + err.message;
                    }
                },

                isValidUrl(str) {
                    try {
                        new URL(str);
                        return true;
                    } catch {
                        return false;
                    }
                },

                clearDebug() {
                    this.debugLog = '';
                }
            }
        }
    </script>
</body>

</html>