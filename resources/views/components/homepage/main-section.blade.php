<section
    class="relative min-h-screen w-full dark:border-white/10 px-4 sm:px-10 stars flex items-center justify-center sm:justify-between">

    <div
        class="w-full mt-13 flex flex-col md:flex-row items-center justify-center px-4 sm:px-15 py-10 sm:py-0 space-y-3">
        <div class="text-white text-center md:text-left space-y-3 z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter">
                Elevate Your Fitness Journey
            </h1>
            <x-custom.paragraph :dark="true"
                class="max-w-full sm:max-w-[900px] text-white  sm:text-xl md:text-lg lg:text-xl ">
                Our gym reservation system makes it easy to book your sessions, manage your membership, and
                stay on top of your fitness goals.
            </x-custom.paragraph>
            <div class="items-center">
                <div class="flex flex-col md:flex-row items-center gap-2 ">
                    <x-custom.secondary-button type="button"
                        onclick="window.location.href = '{{ route('ticket.show') }}'" class="border">
                        Book Now
                    </x-custom.secondary-button>
                    <x-custom.secondary-button type="button" onclick="window.location.href = '#equipment-section'"
                        :active="request()->routeIs('reservation')" class=" border">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                        <p>Learn More</p>
                    </x-custom.secondary-button>
                </div>
            </div>
        </div>
        <div class="container flex justify-center px-2 sm:px-4 md:px-6">

            <!-- responsiveness manual hahaha  -->
            <!-- shows on pc -->
            <img class="rounded-xl hidden lg:block w-full z-10"
                src="https://img.freepik.com/free-photo/low-angle-view-unrecognizable-muscular-build-man-preparing-lifting-barbell-health-club_637285-2497.jpg?t=st=1727743360~exp=1727746960~hmac=7e0bf7885ab8fcd6befaf8eea6232011cdfce301515c9d57d0ca7bd5c9ade0b1&w=740"
                alt="man-with-barbel" />

            <!-- shows on mobile -->
            <img alt="Background image" class="absolute lg:hidden inset-0 z-0 object-cover"
                src="https://img.freepik.com/free-photo/low-angle-view-unrecognizable-muscular-build-man-preparing-lifting-barbell-health-club_637285-2497.jpg?t=st=1727743360~exp=1727746960~hmac=7e0bf7885ab8fcd6befaf8eea6232011cdfce301515c9d57d0ca7bd5c9ade0b1&w=740"
                style="width: 100vw; height: 100vh; min-width: 100%; min-height: 100%; left: 0; top: 0; object-fit: cover;" />

        </div>
    </div>
    <div class="animateee">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <style>
                .path-0 {
                    animation: pathAnim-0 4s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;
                }

                @keyframes pathAnim-0 {
                    0% {
                        d: path("M 0,600 L 0,150 C 81.02392344497608,191.17703349282294 162.04784688995215,232.35406698564591 260,223 C 357.95215311004785,213.64593301435409 472.83253588516743,153.76076555023923 573,152 C 673.1674641148326,150.23923444976077 758.6220095693781,206.6028708133972 845,267 C 931.3779904306219,327.3971291866028 1018.6794258373207,391.82775119617224 1118,423 C 1217.3205741626793,454.17224880382776 1328.6602870813397,452.0861244019139 1440,450 L 1440,600 L 0,600 Z");
                    }

                    25% {
                        d: path("M 0,600 L 0,150 C 84.03827751196172,143.27272727272728 168.07655502392345,136.54545454545456 277,162 C 385.92344497607655,187.45454545454544 519.7320574162679,245.09090909090907 617,290 C 714.2679425837321,334.90909090909093 774.9952153110048,367.0909090909091 866,371 C 957.0047846889952,374.9090909090909 1078.287081339713,350.54545454545456 1179,359 C 1279.712918660287,367.45454545454544 1359.8564593301435,408.72727272727275 1440,450 L 1440,600 L 0,600 Z");
                    }

                    50% {
                        d: path("M 0,600 L 0,150 C 73.41626794258374,144.45933014354068 146.8325358851675,138.91866028708134 237,137 C 327.1674641148325,135.08133971291866 434.0861244019138,136.78468899521533 553,165 C 671.9138755980862,193.21531100478467 802.8229665071771,247.94258373205736 906,288 C 1009.1770334928229,328.05741626794264 1084.622009569378,353.444976076555 1169,378 C 1253.377990430622,402.555023923445 1346.688995215311,426.2775119617225 1440,450 L 1440,600 L 0,600 Z");
                    }

                    75% {
                        d: path("M 0,600 L 0,150 C 114.8133971291866,147.45454545454544 229.6267942583732,144.9090909090909 327,141 C 424.3732057416268,137.0909090909091 504.3062200956938,131.8181818181818 582,161 C 659.6937799043062,190.1818181818182 735.1483253588518,253.8181818181818 836,297 C 936.8516746411482,340.1818181818182 1063.1004784688996,362.90909090909093 1168,385 C 1272.8995215311004,407.09090909090907 1356.4497607655503,428.5454545454545 1440,450 L 1440,600 L 0,600 Z");
                    }

                    100% {
                        d: path("M 0,600 L 0,150 C 81.02392344497608,191.17703349282294 162.04784688995215,232.35406698564591 260,223 C 357.95215311004785,213.64593301435409 472.83253588516743,153.76076555023923 573,152 C 673.1674641148326,150.23923444976077 758.6220095693781,206.6028708133972 845,267 C 931.3779904306219,327.3971291866028 1018.6794258373207,391.82775119617224 1118,423 C 1217.3205741626793,454.17224880382776 1328.6602870813397,452.0861244019139 1440,450 L 1440,600 L 0,600 Z");
                    }
                }
            </style>
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#F78DA7"></stop>
                    <stop offset="95%" stop-color="#8ED1FC"></stop>
                </linearGradient>
            </defs>
            <path
                d="M 0,600 L 0,150 C 81.02392344497608,191.17703349282294 162.04784688995215,232.35406698564591 260,223 C 357.95215311004785,213.64593301435409 472.83253588516743,153.76076555023923 573,152 C 673.1674641148326,150.23923444976077 758.6220095693781,206.6028708133972 845,267 C 931.3779904306219,327.3971291866028 1018.6794258373207,391.82775119617224 1118,423 C 1217.3205741626793,454.17224880382776 1328.6602870813397,452.0861244019139 1440,450 L 1440,600 L 0,600 Z"
                stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53"
                class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            <style>
                .path-1 {
                    animation: pathAnim-1 4s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;
                }

                @keyframes pathAnim-1 {
                    0% {
                        d: path("M 0,600 L 0,350 C 126.66985645933013,361.12918660287085 253.33971291866027,372.25837320574163 336,364 C 418.66028708133973,355.74162679425837 457.311004784689,328.0956937799043 556,352 C 654.688995215311,375.9043062200957 813.4162679425838,451.35885167464113 910,481 C 1006.5837320574162,510.64114832535887 1041.023923444976,494.46889952153117 1119,515 C 1196.976076555024,535.5311004784688 1318.488038277512,592.7655502392345 1440,650 L 1440,600 L 0,600 Z");
                    }

                    25% {
                        d: path("M 0,600 L 0,350 C 86,378.26794258373207 172,406.53588516746413 278,414 C 384,421.46411483253587 510,408.1244019138756 602,408 C 694,407.8755980861244 752,420.96650717703346 833,455 C 914,489.03349282296654 1018,544.0095693779905 1123,580 C 1228,615.9904306220095 1334,632.9952153110048 1440,650 L 1440,600 L 0,600 Z");
                    }

                    50% {
                        d: path("M 0,600 L 0,350 C 118.03827751196172,318.29665071770336 236.07655502392345,286.5933014354067 335,324 C 433.92344497607655,361.4066985645933 513.7320574162679,467.92344497607655 609,495 C 704.2679425837321,522.0765550239234 814.9952153110047,469.71291866028713 911,455 C 1007.0047846889953,440.28708133971287 1088.287081339713,463.22488038277515 1174,502 C 1259.712918660287,540.7751196172248 1349.8564593301435,595.3875598086124 1440,650 L 1440,600 L 0,600 Z");
                    }

                    75% {
                        d: path("M 0,600 L 0,350 C 76.39234449760767,320.38277511961724 152.78468899521533,290.76555023923447 246,308 C 339.21531100478467,325.23444976076553 449.2535885167464,389.3205741626794 542,413 C 634.7464114832536,436.6794258373206 710.2009569377991,419.95215311004785 819,446 C 927.7990430622009,472.04784688995215 1069.9425837320575,540.8708133971292 1179,582 C 1288.0574162679425,623.1291866028708 1364.0287081339711,636.5645933014355 1440,650 L 1440,600 L 0,600 Z");
                    }

                    100% {
                        d: path("M 0,600 L 0,350 C 126.66985645933013,361.12918660287085 253.33971291866027,372.25837320574163 336,364 C 418.66028708133973,355.74162679425837 457.311004784689,328.0956937799043 556,352 C 654.688995215311,375.9043062200957 813.4162679425838,451.35885167464113 910,481 C 1006.5837320574162,510.64114832535887 1041.023923444976,494.46889952153117 1119,515 C 1196.976076555024,535.5311004784688 1318.488038277512,592.7655502392345 1440,650 L 1440,600 L 0,600 Z");
                    }
                }
            </style>
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#F78DA7"></stop>
                    <stop offset="95%" stop-color="#8ED1FC"></stop>
                </linearGradient>
            </defs>
            <path
                d="M 0,600 L 0,350 C 126.66985645933013,361.12918660287085 253.33971291866027,372.25837320574163 336,364 C 418.66028708133973,355.74162679425837 457.311004784689,328.0956937799043 556,352 C 654.688995215311,375.9043062200957 813.4162679425838,451.35885167464113 910,481 C 1006.5837320574162,510.64114832535887 1041.023923444976,494.46889952153117 1119,515 C 1196.976076555024,535.5311004784688 1318.488038277512,592.7655502392345 1440,650 L 1440,600 L 0,600 Z"
                stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
        </svg>
    </div>
</section>
