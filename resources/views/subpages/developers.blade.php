<x-guest-layout>
    <div class="flex h-screen flex-col bg-gradient-to-b from-secondary to-peak-4 text-white">
        <!-- Header Section -->
        <header>
            <x-homepage.header-section />
        </header>

        <!-- Main Content Section -->
        <main class="pt-15 flex flex-1 items-center justify-center px-8">
            <!-- Card Container -->
            <div class="max-w-7xl w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 p-8">
                <!-- Team Member Cards -->
                <div class="transform transition-all duration-300 hover:scale-105 hover:z-10">
                    <div
                        class="bg-peak-3 rounded-xl overflow-hidden shadow-2xl border border-peak-4 hover:border-peak-2 transition-colors">
                        <div class="relative aspect-[3/4]">
                            <img src={{ asset("/images/devs/alay.png") }} alt="AlAY" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                        <div class="p-4 text-center space-y-1">
                            <h3 class="text-xl font-bold text-white tracking-wide">Almaden, Alyssa H.</h3>
                            <p class="text-xs text-gray-300 italic">Research Coordinator/Front-End Engineer</p>
                        </div>
                    </div>
                </div>

                <div class="transform transition-all duration-300 hover:scale-105 hover:z-10">
                    <div
                        class="bg-peak-3 rounded-xl overflow-hidden shadow-2xl border border-peak-4 hover:border-peak-2 transition-colors">
                        <div class="relative aspect-[3/4]">
                            <img src={{ asset("/images/devs/dya.png") }} alt="Dya" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                        <div class="p-4 text-center space-y-1">
                            <h3 class="text-xl font-bold text-white tracking-wide">Azarcon, Diana</h3>
                            <p class="text-xs text-gray-300 italic">Research Lead/Back-End Engineer</p>
                        </div>
                    </div>
                </div>

                <div class="transform transition-all duration-300 hover:scale-105 hover:z-10">
                    <div
                        class="bg-peak-3 rounded-xl overflow-hidden shadow-2xl border border-peak-4 hover:border-peak-2 transition-colors">
                        <div class="relative aspect-[3/4]">
                            <img src={{ asset("/images/devs/henry.png") }} alt="Henry"
                                class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                        <div class="p-4 text-center space-y-1">
                            <h3 class="text-xl font-bold text-white tracking-wide">Mahusay, John Henry</h3>
                            <p class="text-xs text-gray-300 italic">Full-Stack Engineer</p>
                        </div>
                    </div>
                </div>

                <div class="transform transition-all duration-300 hover:scale-105 hover:z-10">
                    <div
                        class="bg-peak-3 rounded-xl overflow-hidden shadow-2xl border border-peak-4 hover:border-peak-2 transition-colors">
                        <div class="relative aspect-[3/4]">
                            <img src={{ asset("/images/devs/henry.png") }} alt="Henry"
                                class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                        <div class="p-4 text-center space-y-1">
                            <h3 class="text-xl font-bold text-white tracking-wide">Mahusay, John Henry</h3>
                            <p class="text-xs text-gray-300 italic">Project Manager/Full-Stack Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-guest-layout>