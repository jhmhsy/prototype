<div class="w-full  bg-white dark:bg-night_3 p-10 h-[500px] justify-center ">
    <div class=" m-auto flex flex-col gap-3">
        <div class="flex flex-col">
            <h1 class="text-5xl mx-auto">TOP NOTCH EQUIPMENTS</h1>
            <h2 class="text-2xl mx-auto">Cleaned & Carefully Maintained</h2>
        </div>
        <div class="w-[80%] m-auto">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        {{-- Primary Set --}}
                        @foreach($equipments as $equipment)
                        <li class="splide__slide" data-set="primary">
                            <div class="equipment-card">
                                <div class="equipment-image relative h-[300px]  overflow-hidden">
                                    @if(is_array($equipment->images) && count($equipment->images) > 0)
                                    <!-- Background Image with Blur -->
                                    <img src="{{ Storage::url($equipment->images[0]) }}" alt="{{ $equipment->name }}"
                                        class=" absolute inset-0 w-full h-full object-cover blur-lg z-0">

                                    <!-- Foreground Image -->
                                    <img src="{{ Storage::url($equipment->images[0]) }}" alt="{{ $equipment->name }}"
                                        loading=" eager"
                                        class="relative z-10 h-full m-auto w-auto max-w-none mx-auto object-cover">

                                    <div class="image-counter relative z-10">
                                        {{ count($equipment->images) }}
                                        {{ Str::plural('image', count($equipment->images)) }}
                                    </div>
                                    @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                                        loading="eager"
                                        class="relative z-10 h-full w-auto max-w-none mx-auto object-cover">
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>