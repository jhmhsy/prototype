<x-dash-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white dark:bg-peak_2 shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-black dark:text-white mb-6">Export Options</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="export-card">
                    <a href="{{ route('export.members') }}"
                        class="block bg-green-400 hover:bg-green-500 active:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-400 text-center">
                        Download Excel
                    </a>
                    <p class="text-sm text-gray-500  mt-2 text-center">Export all member data to excel</p>
                </div>

                <div class="export-card">
                    <a href="{{ route('export.services') }}"
                        class="block bg-green-400 hover:bg-green-500 active:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-400 text-center">
                        Download Services Data
                    </a>
                    <p class="text-sm text-gray-500 mt-2 text-center">Export all locker to excel</p>
                </div>

                <div class="export-card">
                    <a href="{{ route('export.lockers') }}"
                        class="block bg-green-400 hover:bg-green-500 active:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-400 text-center">
                        Download Lockers Data
                    </a>
                    <p class="text-sm text-gray-500 mt-2 text-center">Export all treadmill data to excel</p>
                </div>

                <div class="export-card">
                    <a href="{{ route('export.treadmills') }}"
                        class="block bg-green-400 hover:bg-green-500 active:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-400 text-center">
                        Download Treadmills Data
                    </a>
                    <p class="text-sm text-gray-500 mt-2 text-center">Export all services data to excel</p>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>