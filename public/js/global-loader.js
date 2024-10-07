document.addEventListener("alpine:init", () => {
    Alpine.data("globalLoader", (minLoadTime = 1000) => ({
        isLoading: true,

        init() {
            const startTime = Date.now();
            const checkLoadStatus = () => {
                if (document.readyState === "complete") {
                    const elapsedTime = Date.now() - startTime;
                    if (elapsedTime < minLoadTime) {
                        setTimeout(() => {
                            this.isLoading = false;
                        }, minLoadTime - elapsedTime);
                    } else {
                        this.isLoading = false;
                    }
                } else {
                    setTimeout(checkLoadStatus, 100);
                }
            };
            checkLoadStatus();
        },
    }));
});
