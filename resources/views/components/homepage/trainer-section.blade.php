<div class="items-center w-full py-12 md:py-24 lg:py-32 relative bg-red-400 dark:bg-night_3">
    <div class="container w-[70%] bg-blue-500 p-5 m-auto">
        <div>
            <h1 class="text-5xl">Our Trainers</h1>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 justify-around p-5  bg-violet-500 ">
            <div class="polygon-1-wrapper relative">
                <div class="polygon-1 bg-lemon_base absolute bottom-0">
                    <div class="absolute w-[60%] h-[150%] t-[-40%] z-50 inset-1">
                        <img src="/images/public/trainer_1.png" alt="Trainer Image"
                            class="object-cover w-full h-full" />
                    </div>

                </div>
            </div>
            <div class="polygon-2 flex flex-col p-10  gap-5 bg-green-500">
                <div>
                    <h2 class="text-1xl">Dumb? Worry no more</h2>
                    <h1 class="text-4xl text-left font-bold">Book a Session with a Private Trainer</h1>
                    <p>#Zero2Hero</p>
                </div>
                <div>
                    <button class="p-2 rounded-lg border border-gray-500 hover:border-lemon_base">
                        Schedule Now
                    </button>
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
    clip-path: polygon(0 -30%, 100% -30%, 80% 100%, 0% 100%);
    position: relative;
    z-index: 10;
}

.polygon-2 {
    width: 100%;
    max-width: 500px;
    height: 300px;
    z-index: 10;
}
</style>