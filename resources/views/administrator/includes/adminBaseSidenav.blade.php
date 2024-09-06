<div>

    <!-- Default Design -->
    <aside id="default-sidebar" class="hidden sm:block top-0 left-0 z-40 w-30 xl:w-64 h-screen transition-transform -translate-x-full 
        sm:translate-x-0" aria-label=" Sidebar dark:bg-darkmode_light dark:text-white">
        <div class="h-full px-3 py-4 overflow-y-auto dark:bg-darkmode_light dark:text-white">
            <ul class=" space-y-2 font-medium">
                <!--------------------------- DASHBOARD BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="dashboard" onclick="showSection('dashboard')"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                            <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                            <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                            <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                        </svg>
                        <span class="hidden lg:block ms-3">Dashboard</span>
                    </a>
                </li>
                <!--------------------------- EQUIPMENTS BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="equipment" onclick="showSection('equipment')"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <path
                                d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z">
                            </path>
                            <circle cx="12" cy="13" r="3"></circle>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Equipment</span>
                    </a>
                </li>
                <!--------------------------- RESERVATION BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="reservation" onclick="showSection('reservation')"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <path
                                d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z">
                            </path>
                            <path d="M13 5v2"></path>
                            <path d="M13 17v2"></path>
                            <path d="M13 11v2"></path>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Reservation</span>
                    </a>
                </li>
                <!--------------------------- EVENTS BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="events" onclick="showSection('events')"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Events</span>
                    </a>
                </li>
                <!--------------------------- FEEDBACK BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="feedback" onclick="showSection('feedback')"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <polyline points="9 17 4 12 9 7"></polyline>
                            <path d="M20 18v-2a4 4 0 0 0-4-4H4"></path>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Feedback</span>
                    </a>
                </li>
                <!--------------------------- USERS BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="users" onclick="showSection('users')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                        dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <!--------------------------- HELP BUTTON --------------------------------->
                <li>
                    <a href="#" data-section="help" onclick="showSection('help')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                        dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <path d="M11 12h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 14"></path>
                            <path
                                d="m7 18 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9">
                            </path>
                            <path d="m2 13 6 6"></path>
                        </svg>
                        <span class="hidden lg:block flex-1 ms-3 whitespace-nowrap">Help</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>





</div>