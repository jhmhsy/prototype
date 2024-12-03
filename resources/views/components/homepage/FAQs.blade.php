<div class="bg-peak-5 text-primary items-center w-full">
    <!-- Set parent to full width -->
    <div class="container flex flex-col items-center justify-center gap-4 px-4 md:px-6 w-[70%] mx-auto my-4">
        <div class="text-center mt-5">
            <h1 class="font-bold text-4xl">Have questions? We've got answers!</h1>
        </div>
        <div class="space-y-4 w-full">
            <details class="border border-gray-800  rounded-md p-4 w-full">
                <summary class="cursor-pointer text-gray-400">Where is Gym One Located?</summary>
                <p class="text-sm italic pl-4">2nd floor of E.D.R Hardware and Construction Supply in Ilaya, Poblacion
                    Danao City, Cebu</p>
                @include('gym-map')
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 items-center mx-auto gap-3 py-3">
                    <img src="{{ asset('/images/public/previews1.jpg') }}" alt="location"
                        class="w-full max-w-xs mx-auto">
                    <img src="{{ asset('/images/public/previews2.jpg') }}" alt="location"
                        class="w-full max-w-xs mx-auto">
                    <img src="{{ asset('/images/public/previews3.jpg') }}" alt="location"
                        class="w-full max-w-xs mx-auto">
                </div>


            </details>
            </details>

            @foreach ($questions as $question)
            <details class="border border-gray-800 rounded-md p-4 w-full">
                <summary class="cursor-pointer text-gray-400">{{ $question->question }}</summary>
                <p class="text-sm italic pl-4">{{ $question->answer }}</p>
                <p class="text-sm italic pl-4">{{ $question->extra_answer ? $question->extra_answer : '' }}</p>
            </details>
            @endforeach

        </div>
        <div class="mt-2 contents-left flex items-center gap-2">
            <p class="text-gray-400">Still have questions?</p>
            <x-custom.secondary-button>
                <a href="https://www.facebook.com/profile.php?id=61567209182726" target="_blank">Contact us</a>
            </x-custom.secondary-button>
        </div>
    </div>

</div>