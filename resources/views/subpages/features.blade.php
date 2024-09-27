<x-guest-layout>
    <div class="bg-background text-foreground">
        <header class="flex items-center justify-between px-6 py-4 border-b">
            <div class="flex items-center">

                <x-forms.nav-link href="{{ route('welcome') }}"
                    class="text-sm font-medium hover:underline underline-offset-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </x-forms.nav-link>

                <h2 class="inline-block rounded-lg  bg-muted px-3 text-xl py-1 font-medium">Features</h2>
            </div>

        </header>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 p-6 ">
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 1" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Portable Blender</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Blend your favorite smoothies on the go with this compact and powerful blender.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 2" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Camping Stove</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Cook your meals with ease in the great outdoors with this compact and efficient camping stove.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 1" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Portable Blender</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Blend your favorite smoothies on the go with this compact and powerful blender.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 2" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Camping Stove</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Cook your meals with ease in the great outdoors with this compact and efficient camping stove.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 1" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Portable Blender</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Blend your favorite smoothies on the go with this compact and powerful blender.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>
            <div class="bg-card rounded-lg overflow-hidden shadow-lg group">
                <img src="/placeholder.svg" alt="Equipment 2" width="300" height="200"
                    class="w-full h-48 object-cover" style="aspect-ratio: 300 / 200; object-fit: cover;" />
                <div class="p-4">
                    <h3 class="text-lg font-bold">Acme Camping Stove</h3>
                    <p class="text-muted-foreground text-sm mt-1">
                        Cook your meals with ease in the great outdoors with this compact and efficient camping stove.
                    </p>
                    <x-forms.input-link class="inline-flex items-center gap-2 mt-4  hover:underline" href="#">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </x-forms.input-link>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
