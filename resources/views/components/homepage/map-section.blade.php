<div class="grid items-center justify-center w-full gap-4 px-4 text-center md:px-6 m-auto dark:bg-black">
    <section class="min-w-[70vw]">
        <div class="flex flex-col p-6">
            <div class="text-center mt-12">
                <h1 class=" font-bold text-4xl">Easy to locate, hard to leave—experience it yourself</h1>
            </div>
            <div class="mb-4">
                {{-- Using vw (viewport width) unit to ensure exact 70% screen width --}}
                <div class="m-auto w-[70vw]">
                    @include('gym-map')
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3 w-[80%] h-[30%] bg-white dark:bg-night_3 p-10 m-auto ">
                <div class="flex items-center justify-center h-full content-start">
                    <button class="p-2 bg-blue-500 text-white rounded">Join Now</button>
                </div>
                <div class="flex items-center justify-center h-full">
                    <blockquote class="text-muted-foreground text-center italic">
                        "I will let my mom know about this gym, I'm so happy I discovered it!"
                    </blockquote>
                </div>
            </div>



        </div>
    </section>
</div>