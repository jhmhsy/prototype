<div style="display:none;" x-show="sidebarOpen" @click.away="closeSidebar"
    x-transition:enter-start="opacity-0 transform -translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform -translate-x-full">

    <aside id="separator-sidebar"
        class="fixed md:relative top-0 left-0 z-40 w-80 h-screen bg-white transition-transform translate-x-0 sm:block "
        aria-label="Sidebar">

        <div class="h-screen px-3 py-4 overflow-y-auto flex flex-col justify-between bg-gray-50 dark:bg-peak_2">

            <ul class="space-y-2 overflow-y-auto font-medium pr-2">
                <li class="flex pb-5">
                    <button @click="toggleSidebar" class=" sm:hidden p-2 mr-4 focus:outline-none">
                        <svg style="display:none;" x-show="!sidebarOpen" class="w-6 h-6" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>

                        <svg style="display:none;" x-show="sidebarOpen" class="w-6 h-6" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </button>
                    <div class="flex flex-row mr-13 items-center">
                        <a href="{{ route('welcome') }}" class="logo">
                            <img src="{{ asset('images/logo.png') }}" width="85" height="85" alt="logo">

                        </a>
                        <span class="block ml-3 text-xl font-bold dark:text-white">Dashboard</span>
                    </div>
                </li>

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ OVERVIEW ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany(['overview-list'])
                            <li>
                                <a href="{{ route('administrator.overview') }}" class="flex items-center p-2 rounded-lg group 
                                                                            {{ request()->routeIs('administrator.overview')
                    ? 'bg-gray-300 group dark:bg-gray-700 dark:text-white'
                    : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }}
                                                                            transition-colors duration-300">
                                    <svg class="flex-shrink-0 w-4 h-4 transition duration-75" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path
                                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                                    </svg>
                                    <span class="ms-3 text-sm ">Overview</span>
                                </a>
                            </li>
                @endcanany

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ SERVICE & ASSET OVERVIEW ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @can('asset-list')
                    <li>
                        <a href="{{ route('administrator.asset') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.asset') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <span class="ms-3 text-sm">Services & Asset</span>
                        </a>
                    </li>
                @endcan

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ MEMBER CONTROL ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany([
                        'member-create',
                        'member-list',
                        'member-view',
                        'member-services',
                        'member-edit',
                        'member-membership-renew',
                        'member-delete',
                        'subscription-create',
                        'subscription-extend',
                        'subscription-end',
                        'locker-create',
                        'locker-extend',
                        'locker-end',
                        'treadmill-create',
                        'treadmill-extend',
                        'treadmill-end',
                        'checkin-log-list'
                    ])

                                <li
                                    x-data="{ open: {{ request()->routeIs('members.create') || request()->routeIs('members.index') || request()->routeIs('checkin.history') ? 'true' : 'false' }} }">
                                    <button type="button"
                                        class="flex items-center w-full p-2 text-base 
                                                                                            text-gray-500 dark:text-gray-500 
                                                                                            hover:bg-gray-300 hover:text-black 
                                                                                            dark:hover:bg-gray-700 dark:hover:text-white transition-colors duration-300 rounded-lg group"
                                        @click="open = !open" aria-controls="dropdown-example">

                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2"
                                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-sm">
                                            Member Controls</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>

                                    <ul style="display:none;" x-show="open" x-transition class="py-2 space-y-2">

                                        @canany([
                                                'member-list',
                                                'member-view',
                                                'member-services',
                                                'member-edit',
                                                'member-membership-renew',
                                                'member-delete',
                                                'subscription-extend',
                                                'subscription-end',
                                                'locker-extend',
                                                'locker-end',
                                                'treadmill-extend',
                                                'treadmill-end'
                                            ])
                                                            <li>
                                                                <a href="{{ route('members.index') }}"
                                                                    class="flex items-center w-full p-2  dark:hover:text-white {{ request()->routeIs('members.index') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700' }} text-sm pl-11 transition-colors duration-300 rounded-lg group">
                                                                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                                                                    </svg>

                                                                    <span class="ms-3 text-sm">Member Overview</span></a>
                                                            </li>
                                        @endcanany

                                        @canany(['member-create', 'subscription-create', 'locker-create', 'treadmill-create'])
                                            <li>
                                                <a href="{{ route('members.create') }}"
                                                    class="flex items-center w-full p-2  dark:hover:text-white {{ request()->routeIs('members.create') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700' }} text-sm pl-11 transition-colors duration-300 rounded-lg group">
                                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                                    </svg>
                                                    <span class="ms-3 text-sm">Add Member</span>
                                                </a>
                                            </li>
                                        @endcanany

                                        @canany(['checkin-log-list'])
                                            <li>

                                                <a href="{{ route('checkin.history') }}"
                                                    class="flex items-center w-full p-2  dark:hover:text-white {{ request()->routeIs('checkin.history') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700' }} text-sm pl-11 transition-colors duration-300 rounded-lg group">
                                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ms-3 text-sm">Check-in Log</span>
                                                </a>
                                            </li>
                                        @endcanany

                                    </ul>
                                </li>
                @endcanany

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ CONFIRMATION ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @can('confirmation-list')
                    <li>
                        <a href="{{ route('confirmation.index') }}"
                            class="flex items-center p-2 rounded-lg group text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white {{ request()->routeIs('confirmation.index') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : '' }} transition-colors duration-300">
                            <div class="relative flex items-center">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                                </svg>

                            </div>
                            <div class="flex-1 ms-3 flex items-center">
                                <span
                                    class="text-sm {{ request()->routeIs('confirmation.index') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : '' }}">Confirmations</span>
                                @if ($totalPendings > 0)
                                    <span
                                        class="ml-2 inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red-500 rounded-full">
                                        {{ $totalPendings }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    </li>
                @endcan

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ PRICE ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany(['price-view', 'price-edit'])
                    <li>
                        <a href="{{ route('price.index') }}"
                            class="flex items-center p-2 rounded-lg group {{ request()->routeIs('price.index') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <!-- Added transition classes -->

                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Price</span>
                        </a>

                    </li>
                @endcanany

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ PRODUCT SALES ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->

                @can('productsales-list')
                    <li>
                        <a href="{{ route('administrator.productsales') }}" class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('administrator.productsales') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500  hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }}
                    transition-colors duration-300">
                            <!-- Added transition classes -->

                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Product Sales</span>
                        </a>

                    </li>
                @endcan



                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ RESERVATION ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->

                {{--
                <!-- TEMPORARY THE GYM DONT USE THIS OR WE ARE TIRED IMPLEMENTING THIS -->

                @canany(['reservation-list'])
                <li x-data="{ open: {{ request()->routeIs('administrator.unifiedview')
                    || request()->routeIs('administrator.active')
                    || request()->routeIs('administrator.pending')
                    || request()->routeIs('administrator.suspended')
                    || request()->routeIs('administrator.history') ? 'true' : 'false' }} }">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            text-gray-500 dark:text-gray-500 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white transition-colors duration-300 rounded-lg group"
                        @click="open = !open" aria-controls="dropdown-example">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4">
                            <path
                                d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z">
                            </path>
                            <path d="M13 5v2"></path>
                            <path d="M13 17v2"></path>
                            <path d="M13 11v2"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-sm">Reservation</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul style="display:none;" x-show="open" x-transition class="py-2 space-y-2">
                        <li>
                            <a href="{{ route('administrator.unifiedview') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ request()->routeIs('administrator.unifiedview') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} pl-11 transition-colors duration-300 rounded-lg group">
                                Unified View</a>
                        </li>

                        <li>
                            <a href="{{ route('administrator.active') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ request()->routeIs('administrator.active') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} pl-11 transition-colors duration-300 rounded-lg group">
                                Active Reservation</a>
                        </li>

                        <li>
                            <a href="{{ route('administrator.pending') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ request()->routeIs('administrator.pending') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} pl-11 transition-colors duration-300 rounded-lg group">
                                Awaiting Confirmation</a>
                        </li>
                        <li>
                            <a href="{{ route('administrator.suspended') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ request()->routeIs('administrator.suspended') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} pl-11 transition-colors duration-300 rounded-lg group">
                                Suspended Canceled</a>
                        </li>
                        <li>
                            <a href="{{ route('administrator.history') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-700 dark:hover:text-white 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ request()->routeIs('administrator.history') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} pl-11 transition duration-75 rounded-lg group">
                                Reservation History </a>
                        </li>
                    </ul>
                </li>
                @endcanany

                --}}

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ EQUIPMENTS ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                <!-- @canany(['equipment-list', 'equipment-view', 'equipment-create', 'equipment-edit', 'equipment-delete'])
                <li>
                    <a href="{{ route('administrator.equipments') }}"
                        class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.equipments') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                        <svg class="w-4 h-4 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            transform="rotate(0)">
                            <path d="M20.3873 7.1575L11.9999 12L3.60913 7.14978" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12 12V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M11 2.57735C11.6188 2.22008 12.3812 2.22008 13 2.57735L19.6603 6.42265C20.2791 6.77992 20.6603 7.44017 20.6603 8.1547V15.8453C20.6603 16.5598 20.2791 17.2201 19.6603 17.5774L13 21.4226C12.3812 21.7799 11.6188 21.7799 11 21.4226L4.33975 17.5774C3.72094 17.2201 3.33975 16.5598 3.33975 15.8453V8.1547C3.33975 7.44017 3.72094 6.77992 4.33975 6.42265L11 2.57735Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M8.5 4.5L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>

                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">Equipments</span>
                    </a>
                </li>
                @endcanany -->

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ EVENTS ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany(['event-list', 'event-view', 'event-create', 'event-edit', 'event-delete'])
                    <li>
                        <a href="{{ route('administrator.events') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.events') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-4 h-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Events</span>
                        </a>
                    </li>
                @endcanany

                {{-- TEMPORARY HIDDEN BECAUSE GYM DONT USE THIS
                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ TICKETS ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                <li x-data="{ open: {{ request()->routeIs('administrator.tickets') || request()->routeIs('ticket.scan') || request()->routeIs('ticket.transaction') || request()->routeIs('ticket.scanticket') ? 'true' : 'false' }}
                }">
                    <button type="button" class="flex items-center w-full p-2 text-base 
text-gray-500 dark:text-gray-500 
hover:bg-gray-300 hover:text-black 
dark:hover:bg-gray-700 dark:hover:text-white  rounded-lg group transition-colors duration-300" @click="open = !open"
                        aria-controls="dropdown-example">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4 5a2 2 0 0 0-2 2v2.5a1 1 0 0 0 1 1 1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-sm">Tickets</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul style="display:none;" x-show="open" x-transition class="py-2 space-y-2">
                        <li>
                            <a href="{{ route('administrator.tickets') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
dark:hover:bg-gray-700 dark:hover:text-white 
{{ request()->routeIs('administrator.tickets') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} transition-colors duration-300 pl-11 rounded-lg group">
                                Ticket Overview</a>
                        </li>

                        <li>
                            <a href="{{ route('ticket.scan') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
dark:hover:bg-gray-700 dark:hover:text-white 
{{ request()->routeIs('ticket.scan') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} transition-colors duration-300 pl-11 rounded-lg group">
                                Ticket Scanner</a>
                        </li>
                        <li>
                            <a href="{{ route('ticket.transaction') }}"
                                class="flex items-center w-full p-2 text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black 
dark:hover:bg-gray-700 dark:hover:text-white 
{{ request()->routeIs('ticket.transaction') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white text-sm' : 'text-sm' }} transition-colors duration-300 pl-11 rounded-lg group">
                                Transaction History</a>
                        </li>

                    </ul>
                </li> --}}

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ USERS ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany(['user-list', 'user-view', 'user-create', 'user-edit', 'user-delete'])
                    <li>
                        <a href="{{ route('administrator.users') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.users') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <svg class="flex-shrink-0 w-4 h-4 transition duration-75" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Users</span>
                        </a>
                    </li>
                @endcanany
                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ ROLES ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->

                @canany(['role-list', 'role-view', 'role-create', 'role-edit', 'role-delete'])
                    <li>
                        <a href="{{ route('administrator.roles') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.roles') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 8v8m0-8h8M8 8H6a2 2 0 1 1 2-2v2Zm0 8h8m-8 0H6a2 2 0 1 0 2 2v-2Zm8 0V8m0 8h2a2 2 0 1 1-2 2v-2Zm0-8h2a2 2 0 1 0-2-2v2Z" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Roles</span>
                            {{-- <span
                                class="inline-flex items-center text-green-500 hover:text-green-700 justify-center px-2 ms-3 text-xs font-medium  rounded-full">
                                Super Admin</span> --}}

                        </a>
                    </li>
                @endcanany
                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ FEEDBACK ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                {{--
                @canany(['feedback-list'])
                <li>
                    <a href="{{ route('administrator.feedback') }}" class="flex items-center p-2 rounded-lg group
                {{ request()->routeIs('administrator.feedback') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }}
                transition-colors duration-300">
                        <!-- Added transition classes -->

                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">Feedback</span>
                    </a>

                </li>
                @endcanany
                --}}

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ HELP ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                <!-- @canany(['help-list'])
                    <li>
                        <a href="{{ route('administrator.help') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.help') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.008-3.018a1.502 1.502 0 0 1 2.522 1.159v.024a1.44 1.44 0 0 1-1.493 1.418 1 1 0 0 0-1.037.999V14a1 1 0 1 0 2 0v-.539a3.44 3.44 0 0 0 2.529-3.256 3.502 3.502 0 0 0-7-.255 1 1 0 0 0 2 .076c.014-.398.187-.774.48-1.044Zm.982 7.026a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2h-.01Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Help</span>
                        </a>
                    </li>
                @endcanany -->

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ DAILY SALES ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @can('dailysales-list')
                    <li>
                        <a href="{{ route('administrator.dailysales') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.dailysales') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">

                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">Daily Sales</span>
                        </a>
                    </li>
                @endcan

                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ FAQs ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                @canany(['faq-list', 'faq-view', 'faq-edit', 'faq-create', 'faq-delete'])
                    <li>
                        <a href="{{ route('administrator.FAQs') }}"
                            class="flex items-center p-2 rounded-lg group  {{ request()->routeIs('administrator.FAQs') ? 'bg-gray-300 text-black dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-500 hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors duration-300">

                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm">FAQs</span>
                        </a>
                    </li>
                @endcanany
            </ul>

            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-300  dark:border-gray-700">
                <!--︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼ LOGOUT ︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼︼  -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a :href="route('logout')"
                            class="flex items-center p-2 rounded-lg group text-gray-500 dark:text-gray-500 hover:bg-red-400 hover:text-black dark:hover:bg-red-700 dark:hover:text-white cursor-pointer transition-colors duration-300"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">

                            <svg class="w-6 h-6" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.75 9.874C11.75 10.2882 12.0858 10.624 12.5 10.624C12.9142 10.624 13.25 10.2882 13.25 9.874H11.75ZM13.25 4C13.25 3.58579 12.9142 3.25 12.5 3.25C12.0858 3.25 11.75 3.58579 11.75 4H13.25ZM9.81082 6.66156C10.1878 6.48991 10.3542 6.04515 10.1826 5.66818C10.0109 5.29121 9.56615 5.12478 9.18918 5.29644L9.81082 6.66156ZM5.5 12.16L4.7499 12.1561L4.75005 12.1687L5.5 12.16ZM12.5 19L12.5086 18.25C12.5029 18.25 12.4971 18.25 12.4914 18.25L12.5 19ZM19.5 12.16L20.2501 12.1687L20.25 12.1561L19.5 12.16ZM15.8108 5.29644C15.4338 5.12478 14.9891 5.29121 14.8174 5.66818C14.6458 6.04515 14.8122 6.48991 15.1892 6.66156L15.8108 5.29644ZM13.25 9.874V4H11.75V9.874H13.25ZM9.18918 5.29644C6.49843 6.52171 4.7655 9.19951 4.75001 12.1561L6.24999 12.1639C6.26242 9.79237 7.65246 7.6444 9.81082 6.66156L9.18918 5.29644ZM4.75005 12.1687C4.79935 16.4046 8.27278 19.7986 12.5086 19.75L12.4914 18.25C9.08384 18.2892 6.28961 15.5588 6.24995 12.1513L4.75005 12.1687ZM12.4914 19.75C16.7272 19.7986 20.2007 16.4046 20.2499 12.1687L18.7501 12.1513C18.7104 15.5588 15.9162 18.2892 12.5086 18.25L12.4914 19.75ZM20.25 12.1561C20.2345 9.19951 18.5016 6.52171 15.8108 5.29644L15.1892 6.66156C17.3475 7.6444 18.7376 9.79237 18.75 12.1639L20.25 12.1561Z"
                                    fill="currentColor">
                                </path>

                            </svg>

                            <span class="ms-2 text-sm">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

</div>