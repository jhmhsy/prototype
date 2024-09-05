<sidenav class="flex flex-col items-start gap-4 p-6 border-r border-border dark:bg-darkmode_light dark:text-white">

    <!--------------------------- DASHBOARD BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="dashboard" onclick="showSection('dashboard')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <rect width="7" height="9" x="3" y="3" rx="1"></rect>
            <rect width="7" height="5" x="14" y="3" rx="1"></rect>
            <rect width="7" height="9" x="14" y="12" rx="1"></rect>
            <rect width="7" height="5" x="3" y="16" rx="1"></rect>
        </svg>
        <span>Dashboard</span>
    </a>

    <!--------------------------- EQUIPMENTS BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="equipment" onclick="showSection('equipment')">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z">
            </path>
            <circle cx="12" cy="13" r="3"></circle>
        </svg>
        <span>Equipment</span>
    </a>

    <!--------------------------- RESERVATION BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="reservation" onclick="showSection('reservation')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path
                d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z">
            </path>
            <path d="M13 5v2"></path>
            <path d="M13 17v2"></path>
            <path d="M13 11v2"></path>
        </svg>
        <span>Reservation</span>
    </a>

    <!--------------------------- EVENTS BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="events" onclick="showSection('events')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M8 2v4"></path>
            <path d="M16 2v4"></path>
            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
            <path d="M3 10h18"></path>
        </svg>
        <span>Events</span>
    </a>

    <!--------------------------- FEEDBACK BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="feedback" onclick="showSection('feedback')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <polyline points="9 17 4 12 9 7"></polyline>
            <path d="M20 18v-2a4 4 0 0 0-4-4H4"></path>
        </svg>
        <span>Feedback</span>
    </a>

    <!--------------------------- USERS BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="users" onclick="showSection('users')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <span>Users</span>
    </a>

    <!--------------------------- HELP BUTTON --------------------------------->
    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 font-medium  hover:bg-thirdy hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
        href="#" data-section="help" onclick="showSection('help')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M11 12h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 14"></path>
            <path d="m7 18 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9">
            </path>
            <path d="m2 13 6 6"></path>
        </svg>
        <span>Help</span>
    </a>



</sidenav>