<header>
    <div class=" flex items-center justify-between px-6 py-4 border-b border-border 
        dark:bg-darkmode_light dark:text-white dark:border-b-white/50">

        <!-- dumbelss logo -->
        <div class="flex flex-row">
            <a href="/">
                <x-inputs.application-logo />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="fixed left-1/3 transform z-20">
            <nav class=" flex gap-4 sm:gap-6">
                <div class="flex justify-evenly items-center text-center">

                    <div class="hidden space-x-8 space-between sm:-my-px sm:ms-10 xl:block ">
                        @include('navigations.homenav',['default' => true])
                    </div>
                </div>
            </nav>
        </div>


        <div class="flex items-center gap-4">
            <!-- Darkmode button icon -->
            <div role="group" dir="ltr" class="flex items-center justify-center gap-1" tabindex="0"
                style="outline: none;">
                <x-custom.input-darkmode>
                </x-custom.input-darkmode>
            </div>

            <!-- login / register  -->
            <div class="hidden sm:block">
                @include('navigations.login-dropdown', ['row' => true])
            </div>

            <!-- settings hidden, shows only after login and onmobile responsive -->
            <div class="hidden sm:block">
                @include('navigations.settings-dropdown',['dropdown' => true])
            </div>

            <!-- Responsive for home navigation -->
            @include('layouts.nav-burger', ['showburgerHome' => true])
        </div>


    </div>
</header>