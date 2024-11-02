<section
    class="relative min-h-screen w-full px-4 sm:px-10 flex flex-col items-center justify-center sm:justify-between dark:bg-night_1 gap-15">
    <div class="w-full mt-40 grid grid-cols-2 items-center justify-center px-4 sm:px-15 py-10 sm:py-0 space-y-3">
        <div class="md:text-left space-y-3 z-10 ">
            <div class="flex gap-2">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter text-left">
                    GYM ONE
                </h1>
                <p>BEST FOR LESS</p>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl tracking-tighter">Begin now or never!</h2>
            <x-custom.paragraph :dark="true" class="max-w-full sm:max-w-[900px] sm:text-xl md:text-lg lg:text-xl">
                Top-notch Equipments Combined with Affordable Prices
            </x-custom.paragraph>

        </div>
        <div class=" h-[100%]"> </div>
    </div>
    <div class="w-full mt-1 flex items-center justify-center px-4 sm:px-15 py-10 sm:py-0 space-y-3">
        <div class="w-[70%] relative" style="padding-top: 40%; max-height: 40vh;">


            <video class="absolute top-0 left-0 w-full h-full object-cover bg-red-500" controls>
                <source src="{{ asset('videos/promo-clip.mp4') }}" type="video/mp4">
                <p>Debug Info: Video path is: {{ asset('videos/promo-clip.mp4') }}</p>
                Your browser does not support the video tag.
            </video>
        </div>
    </div>


</section>

<section
    class="relative min-h-screen w-full px-4 sm:px-10 flex flex-col items-center justify-center sm:justify-between dark:bg-night_1 gap-15">
    <div class="grid grid-cols-2 gap-5 w-[70%] mt-20">
        <div class="w-full  flex flex-col p-5">
            <h1 class="text-3xl text-left">Lorem Ipsum</h1>
            <h3 class=" text-left">eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                velit.</h3>
            <h1 class="text-3xl text-left">Ipsum Lorem</h1>
        </div>

        <div class="w-full flex items-center justify-center">
            <!-- First Layer with Background Image -->
            <div class="w-[70%] h-[356px] border border-white overflow-visible"
                style="background-image: url('{{ asset('images/public/person_1.jpg') }}'); background-size: cover; background-position: center;">
                <!-- Second Layer with Background Image -->
                <div class="relative w-[90%] h-[250px] top-[75%] left-[15%] border border-white"
                    style="background-image: url('{{ asset('images/public/person_2.jpg') }}'); background-size: cover; background-position: center;">
                    <!-- Third Layer with Background Image -->
                    <div class="relative w-[90%] h-[250px] bottom-[25%] right-[70%] border border-white"
                        style="background-image: url('{{ asset('images/public/person_3.jpg') }}'); background-size: cover; background-position: center;">
                        <!-- Content inside the third div, if needed -->
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.querySelector('video');
    const source = document.querySelector('video source');

    console.log('Video path:', source.src);

    video.addEventListener('error', function(e) {
        console.error('Error loading video:', e);
        console.log('Video error code:', video.error.code);
        console.log('Video error message:', video.error.message);
    });
});
</script>