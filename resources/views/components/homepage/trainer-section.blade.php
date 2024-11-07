<div class="items-center w-full py-4 bg-peak-5 text-primary">
    <div class="container w-[70%] p-5 m-auto">
        <div>
            <h1 class="text-5xl font-raleway uppercase animate-fade-in">Schedule Trainers</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 p-5 w-full justify-between">
            <div class="polygon-1-wrapper relative animate-slide-in-left">
                <div class="polygon-1 bg-lemon-base absolute bottom-0">
                    <div class="absolute w-[60%] h-[150%] t-[-40%] z-50 inset-1">
                        <img src="/images/public/trainer_1.png" alt="Trainer Image" class="object-cover w-full h-full" />
                    </div>
                </div>
            </div>
            <div class="polygon-2 flex flex-col p-10 gap-5 bg-green-500 pr-10 animate-slide-in-right">
                <div class="ml-5 space-y-1">
                    <div>
                        <h2 class="text-sm md:text-lg animate-fade-in">Don't know here to start? Worry no more</h2>
                        <h1 class="text-2xl md:text-1xl text-left font-bold animate-fade-in">Book a Session with a Private Trainer</h1>
                        <p class="text-xs md:text-base animate-fade-in">#Zero2Hero</p>
                    </div>
                    <div>
                        <x-custom.primary-button class="animate-bounce">Schedule Now</x-custom.primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slide-in-left {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}

@keyframes slide-in-right {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-30px); }
    60% { transform: translateY(-15px); }
}

.animate-fade-in {
    animation: fade-in 1s ease-in-out;
}

.animate-slide-in-left {
    animation: slide-in-left 1s ease-out;
}

.animate-slide-in-right {
    animation: slide-in-right 1s ease-out;
}

.animate-bounce {
    animation: bounce 2s infinite;
}

.polygon-1-wrapper {
    width: 100%;
    max-width: 500px;
    height: 300px;
    overflow: visible;
}

.polygon-1 {
    width: 100%;
    height: 300px;
    clip-path: polygon(0 0, 100% 0, 85% 100%, 0% 100%);
    position: relative;
    z-index: 5;
}

.polygon-2 {
    width: 100%;
    max-width: 500px;
    height: 300px;
    z-index: 5;
    clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
}

/* Reapply animations when .reanimated class is added */
.reanimated.animate-fade-in {
    animation: fade-in 1s ease-in-out;
}

.reanimated.animate-slide-in-left {
    animation: slide-in-left 1s ease-out;
}

.reanimated.animate-slide-in-right {
    animation: slide-in-right 1s ease-out;
}

.reanimated.animate-bounce {
    animation: bounce 2s infinite;
}

/* Define exit animations */
.exit-animation.animate-fade-in {
    animation: fade-out 1s ease-in-out;
}

.exit-animation.animate-slide-in-left {
    animation: slide-out-left 1s ease-out;
}

.exit-animation.animate-slide-in-right {
    animation: slide-out-right 1s ease-out;
}

.exit-animation.animate-bounce {
    animation: bounce-out 2s infinite;
}

/* Define keyframes for exit animations */
@keyframes fade-out {
    from { opacity: 1; }
    to { opacity: 0; }
}

@keyframes slide-out-left {
    from { transform: translateX(0); }
    to { transform: translateX(-100%); }
}

@keyframes slide-out-right {
    from { transform: translateX(0); }
    to { transform: translateX(100%); }
}

@keyframes bounce-out {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(30px); }
    60% { transform: translateY(15px); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.animate-fade-in, .animate-slide-in-left, .animate-slide-in-right, .animate-bounce');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add entrance animation class
                entry.target.classList.add('reanimated');
                entry.target.classList.remove('exit-animation'); // Remove exit animation class if present
            } else {
                // Add exit animation class
                entry.target.classList.add('exit-animation');
                entry.target.classList.remove('reanimated'); // Remove entrance animation class
            }
        });
    }, { threshold: 0.1 });

    elements.forEach(element => {
        observer.observe(element);
    });
});
</script>
