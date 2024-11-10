<div class="items-center w-full py-4 bg-peak-5 text-primary">
    <div class="container w-[70%] p-5 m-auto">
        <div>
            <h1 class="text-5xl font-raleway uppercase">Schedule Trainers</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 p-5 w-full justify-between">
            <div class="polygon-1-wrapper relative">
                <div class="polygon-1 bg-lemon-base absolute bottom-0">
                    <div class="absolute flex flex-start w-[75%] h-[150%] t-[-40%] z-50 inset-0">
                        <img src="/images/public/trainer_1.png" alt="Trainer Image" class="object-cover w-full h-full" />
                    </div>
                </div>
            </div>
            <div class="polygon-2 flex flex-col p-10 gap-5 bg-green-500 pr-10">
                <div class="ml-5 space-y-1">
                    <div>
                        <h2 class="text-sm md:text-lg">Don't know here to start? Worry no more</h2>
                        <h1 class="text-2xl md:text-1xl text-left font-bold">Book a Session with a Private Trainer</h1>
                        <p class="text-xs md:text-base">#Zero2Hero</p>
                    </div>
                    <div>
                        <x-custom.primary-button class="animate__animated animate__pulse animate__infinite">Schedule Now</x-custom.primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
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
</style>

