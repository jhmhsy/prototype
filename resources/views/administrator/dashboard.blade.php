<x-app-layout>
    <div class="">
        <div class="flex flex-col h-screen bg-white">
            @include('administrator.includes.adminBaseHeader')

            <div class="flex flex-1">
                @include('administrator.includes.adminBaseSidenav')

                <!-------------------------- MAIN CONTENT ----------------------------->
                <main class="flex-1 p-6 dark:bg-darkmode_dark dark:text-white">
                    <div id="main-content" class="flex-1 ">

                        <div id="dashboard-section" class="section-content hidden">
                            @include('administrator.includes.adminDashboard')
                        </div>
                        <div id="equipment-section" class="section-content hidden">
                            @include('administrator.includes.adminEquipments')
                        </div>
                        <div id="events-section" class="section-content hidden">
                            @include('administrator.includes.adminEvents')
                        </div>
                        <div id="feedback-section" class="section-content hidden">
                            @include('administrator.includes.adminFeedback')
                        </div>
                        <div id="help-section" class="section-content hidden">
                            @include('administrator.includes.adminHelp')
                        </div>
                        <div id="reservation-section" class="section-content hidden">
                            @include('administrator.includes.adminReservation')
                        </div>
                        <div id="users-section" class="section-content hidden">
                            @include('administrator.includes.adminUsers')
                        </div>

                    </div>

                    <main>

                    </main>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>