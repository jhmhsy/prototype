<button @click="currentImage = '/images/public/background-1.jpg'; selectedButton = 1"
    :class="{ 'border-l-4 border-black dark:border-white': selectedButton === 1 }" class="text-left w-full px-4 py-1">
    <h2 class="sm:text-md md:text-xl lg:text-1xl xl:text-2xl font-bold">Personal Training</h2>
    <p class="sm:text-sm md:text-md lg:text-lg xl:text-xl">Get personalized training sessions with our expert trainers.
    </p>
</button>