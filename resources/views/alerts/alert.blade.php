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
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
    showClass: {
        popup: 'swal2-show',
        backdrop: 'swal2-backdrop-show',
        icon: 'swal2-icon-show'
    },
    hideClass: {
        popup: 'swal2-hide',
        backdrop: 'swal2-backdrop-hide',
        icon: 'swal2-icon-hide'
    }
});
Toast.fire({
    icon: "success",
    title: "{{ session('success') }}",
    showCloseButton: false,
    touchStartX: 0,
    touchEndX: 0
}).then((result) => {
    const popup = Swal.getPopup();
    popup.addEventListener('touchstart', (e) => {
        result.touchStartX = e.touches[0].clientX;
    });
    popup.addEventListener('touchend', (e) => {
        result.touchEndX = e.changedTouches[0].clientX;
        if (Math.abs(result.touchEndX - result.touchStartX) > 50) {
            Swal.close();
        }
    });
    popup.addEventListener('mousedown', (e) => {
        result.touchStartX = e.clientX;
    });
    popup.addEventListener('mouseup', (e) => {
        result.touchEndX = e.clientX;
        if (Math.abs(result.touchEndX - result.touchStartX) > 50) {
            Swal.close();
        }
    });
});
</script>
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