<!-- @if(session('success'))
<script>
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});
Toast.fire({
    icon: "success",
    title: "{{ session('success') }}"
});
</script>
@endif -->

@if(session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            showCloseButton: true,
            customClass: {
                closeButton: 'swal2-close-button',
                popup: 'swal2-popup-custom',
                container: 'swal2-container-custom'
            },
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;

                // Get the popup element
                const popup = Swal.getPopup();
                let touchstartX = 0;
                let touchendX = 0;
                let mousestartX = 0;
                let mouseendX = 0;
                let isDragging = false;
                let startingPoint = 0;

                // Touch events for mobile
                popup.addEventListener('touchstart', function (e) {
                    touchstartX = e.changedTouches[0].screenX;
                    startingPoint = popup.style.transform ? parseInt(popup.style.transform.replace(
                        'translateX(', '')) : 0;
                    isDragging = true;
                }, false);

                popup.addEventListener('touchmove', function (e) {
                    if (isDragging) {
                        const currentX = e.changedTouches[0].screenX;
                        const diff = currentX - touchstartX;
                        popup.style.transform = `translateX(${diff}px)`;
                        popup.style.transition = 'none';
                    }
                }, false);

                popup.addEventListener('touchend', function (e) {
                    touchendX = e.changedTouches[0].screenX;
                    const swipeDistance = touchendX - touchstartX;

                    if (Math.abs(swipeDistance) > 100) { // Threshold of 100px for swipe
                        // Determine direction and animate accordingly
                        const direction = swipeDistance > 0 ? 1 : -1;
                        popup.style.transform = `translateX(${direction * window.innerWidth}px)`;
                        popup.style.transition = 'transform 0.3s ease-out';
                        setTimeout(() => Swal.close(), 300);
                    } else {
                        // Reset position if swipe wasn't far enough
                        popup.style.transform = 'translateX(0)';
                        popup.style.transition = 'transform 0.3s ease-out';
                    }
                    isDragging = false;
                }, false);

                // Mouse events for desktop
                popup.addEventListener('mousedown', function (e) {
                    mousestartX = e.clientX;
                    startingPoint = popup.style.transform ? parseInt(popup.style.transform.replace(
                        'translateX(', '')) : 0;
                    isDragging = true;
                });

                popup.addEventListener('mousemove', function (e) {
                    if (isDragging) {
                        const diff = e.clientX - mousestartX;
                        popup.style.transform = `translateX(${diff}px)`;
                        popup.style.transition = 'none';
                    }
                });

                popup.addEventListener('mouseup', function (e) {
                    mouseendX = e.clientX;
                    const swipeDistance = mouseendX - mousestartX;

                    if (Math.abs(swipeDistance) > 100) {
                        const direction = swipeDistance > 0 ? 1 : -1;
                        popup.style.transform = `translateX(${direction * window.innerWidth}px)`;
                        popup.style.transition = 'transform 0.3s ease-out';
                        setTimeout(() => Swal.close(), 300);
                    } else {
                        popup.style.transform = 'translateX(0)';
                        popup.style.transition = 'transform 0.3s ease-out';
                    }
                    isDragging = false;
                });

                // Cancel dragging if mouse leaves the popup
                popup.addEventListener('mouseleave', function () {
                    if (isDragging) {
                        popup.style.transform = 'translateX(0)';
                        popup.style.transition = 'transform 0.3s ease-out';
                        isDragging = false;
                    }
                });
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
    </script>

    <style>
        .swal2-popup-custom {
            font-size: 0.875rem !important;
            padding: 0.5rem 1rem !important;
            width: auto !important;
            max-width: 90vw !important;
            min-width: 280px !important;
            touch-action: pan-x !important;
            /* Enable horizontal touch actions */
            user-select: none !important;
            /* Prevent text selection while dragging */
        }

        .swal2-close-button {
            position: absolute !important;
            right: 8px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            padding: 0 !important;
            width: 1.2em !important;
            height: 1.2em !important;
            color: rgba(0, 0, 0, 0.45) !important;
            transition: color 0.1s ease-out !important;
            z-index: 1 !important;
        }

        .swal2-close-button:hover {
            color: rgba(0, 0, 0, 0.75) !important;
        }

        @media screen and (max-width: 480px) {
            .swal2-popup-custom {
                font-size: 0.8rem !important;
                padding: 0.4rem 0.8rem !important;
                margin: 0.5rem !important;
            }

            .swal2-close-button {
                right: 4px !important;
                width: 1em !important;
                height: 1em !important;
            }
        }

        .swal2-container-custom {
            padding: 0.5rem !important;
        }
    </style>
@endif

@if(session('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "{{ session('error') }}"
        });
    </script>
@endif





@if(session('status'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('status') }}"
        });
    </script>
@endif