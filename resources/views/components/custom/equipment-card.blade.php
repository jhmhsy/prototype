<div class="bg-card rounded-lg overflow-hidden shadow-lg group flex flex-col justify-between space-y-4">
    <div>
        <img src="https://dummyimage.com/250/000/fff" alt="equipment" width="300" height="200" class="w-full h-48 object-cover"
            style="aspect-ratio: 300 / 200; object-fit: cover;" />
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
    <div class="flex items-center justify-center pb-4"> 
        <x-forms.input-link class="rounded-md px-5 py-3 bg-main text-tint_1 inline-flex items-center gap-3 hover:underline"> 
            <span>Learn More</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <!-- Increased icon size -->
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
            </svg>
        </x-forms.input-link>
    </div>
</div>
