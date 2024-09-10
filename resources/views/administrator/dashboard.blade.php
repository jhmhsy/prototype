<x-dash-layout>
    <div class="">
        <div class="flex flex-col h-screen bg-white">
            <!-- Header layout -->
            @include('administrator.includes.header')

            <div class="flex flex-1">

                <!-- Sidebar layout -->
                <aside id="default-sidebar"
                    class="hidden sm:block top-0 left-0 z-40 w-30 xl:w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                    aria-label=" Sidebar dark:bg-darkmode_light dark:text-white">
                    <div class="h-full px-3 py-4 overflow-y-auto dark:bg-darkmode_light dark:text-white">
                        @include('administrator.includes.sidenav')
                </aside>

                <!-------------------------- MAIN CONTENT ----------------------------->
                <main class="flex-1 p-6 dark:bg-darkmode_dark overflow-y-auto dark:text-white" @click="open = false">
                    <div id="main-content" class="flex-1 ">

                        <div id="dashboard-section" class="section-content hidden">
                            @include('administrator.includes.dashboard')
                        </div>
                        <div id="equipment-section" class="section-content hidden">
                            @include('administrator.includes.equipments')
                        </div>
                        <div id="events-section" class="section-content hidden">
                            @include('administrator.includes.events')
                        </div>
                        <div id="feedback-section" class="section-content hidden">
                            @include('administrator.includes.feedback')
                        </div>
                        <div id="help-section" class="section-content hidden">
                            @include('administrator.includes.help')
                        </div>
                        <div id="reservation-section" class="section-content hidden">
                            @include('administrator.includes.reservation')
                        </div>
                        <div id="users-section" class="section-content hidden">
                            @include('administrator.includes.users')
                        </div>

                    </div>
                </main>

            </div>
        </div>
    </div>
    </x-guest-layout>