<div class="w-full py-12 md:py-24 lg:py-32 text-center bg-white dark:bg-night_3">
    <div class="container mx-auto px-4 md:px-6">
        <div class="h-[500px] w-[80%] mx-auto">
            <div class="flex flex-col gap-3 items-center">
                <div class="text-center">
                    <h1 class="text-5xl">TOP NOTCH EQUIPMENTS</h1>
                    <h2 class="text-2xl">Cleaned & Carefully Maintained</h2>
                </div>
                <div class="w-full">
                    <div class="splide w-full">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($equipments as $equipment)
                                <li class="splide__slide" data-set="primary">
                                    <div class="equipment-card">
                                        <div class="equipment-image relative h-[300px] overflow-hidden">
                                            @if(is_array($equipment->images) && count($equipment->images) > 0)
                                            <!-- Background image -->
                                            <img src="{{ asset(Storage::url($equipment->images[0])) }}"
                                                alt="{{ $equipment->name }}"
                                                class="absolute inset-0 w-full h-full object-cover blur-lg z-0">
                                            <!-- Primary image (fixed height) -->
                                            <img src="{{ asset(Storage::url($equipment->images[0])) }}"
                                                alt="{{ $equipment->name }}" loading="eager"
                                                class="relative z-10 h-full mx-auto object-contain">

                                            <div class="image-counter relative z-10">
                                                {{ count($equipment->images) }}
                                                {{ Str::plural('image', count($equipment->images)) }}
                                            </div>
                                            @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                                                loading="eager" class="relative z-10 h-full mx-auto object-contain">
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
    </div>
</div>