<!-- USING JSQR LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>

<!-- SCAN QR DEVICE TO SEARCH -->
<script>
function qrScanner() {
    return {
        buffer: '',
        lastKeyTime: 0,
        keyDelay: 50,
        isManualTyping: false,

        init() {
            document.getElementById('searchInput').addEventListener('focus', () => {
                this.isManualTyping = true;
            });

            document.getElementById('searchInput').addEventListener('blur', () => {
                this.isManualTyping = false;
            });

            document.addEventListener('keydown', (e) => {
                if (this.isManualTyping) return;

                const currentTime = new Date().getTime();
                const timeDiff = currentTime - this.lastKeyTime;

                if (timeDiff < this.keyDelay) {
                    // Only add the actual character, not the key name
                    if (e.key.length === 1) { // This ensures we only get actual characters
                        this.buffer += e.key;
                    }
                } else {
                    this.buffer = e.key.length === 1 ? e.key : '';
                }

                if (e.keyCode === 13) {
                    const searchInput = document.getElementById('searchInput');
                    searchInput.value = this.buffer;
                    document.querySelector('#searchForm button[type="submit"]').click();
                    this.buffer = '';
                }

                this.lastKeyTime = currentTime;
            });
        }
    }
}
</script>