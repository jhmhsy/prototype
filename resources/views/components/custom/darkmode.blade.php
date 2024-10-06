{{-- v.1 (default) --}}
{{-- <div>
    <button id="toggleDarkMode" type="button" role="radio" aria-checked="true"
        class="dark:hidden text-shade_9 inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors hover:bg-muted hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground bg-transparent h-10"
        aria-label="Light mode" tabindex="-1" data-radix-collection-item="">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <circle cx="12" cy="12" r="4"></circle>
            <path d="M12 2v2"></path>
            <path d="M12 20v2"></path>
            <path d="m4.93 4.93 1.41 1.41"></path>
            <path d="m17.66 17.66 1.41 1.41"></path>
            <path d="M2 12h2"></path>
            <path d="M20 12h2"></path>
            <path d="m6.34 17.66-1.41 1.41"></path>
            <path d="m19.07 4.93-1.41 1.41"></path>
        </svg>
    </button>
    <button id="toggleLightMode" type="button" role="radio" aria-checked="false"
        class="hidden text-tint_1 dark:block items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors hover:bg-muted hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground bg-transparent h-10"
        aria-label="Dark mode" tabindex="-1" data-radix-collection-item="">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
        </svg>
    </button>
    <script>
        // Updates the visibility of the light and dark mode buttons
        function updateButtonVisibility(isDarkMode) {
            const lightModeButton = document.getElementById("toggleLightMode");
            const darkModeButton = document.getElementById("toggleDarkMode");

            if (isDarkMode) {
                lightModeButton.classList.remove("hidden");
                darkModeButton.classList.add("hidden");
            } else {
                lightModeButton.classList.add("hidden");
                darkModeButton.classList.remove("hidden");
            }
        }
        // Function to toggle dark mode
        function toggleDarkMode(event) {
            event.preventDefault(); // Prevent default action to avoid page reload
            const htmlElement = document.documentElement;
            const isDarkMode = htmlElement.classList.toggle("dark");
            localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
            updateButtonVisibility(isDarkMode); // Update button visibility based on mode
        }

        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem("darkMode");
            const isDarkMode = darkModePreference === "enabled";
            document.documentElement.classList.toggle("dark", isDarkMode);
            updateButtonVisibility(isDarkMode); // Updates button visibility on page load
        }
        // Add event listener to both buttons
        document
            .getElementById("toggleLightMode")
            ?.addEventListener("click", toggleDarkMode);
        document
            .getElementById("toggleDarkMode")
            ?.addEventListener("click", toggleDarkMode);

        // Apply dark mode preference on page load
        applyDarkModePreference();
    </script>
</div> --}}

{{-- v.2 (the cute one) --}}
{{--<div>
    <label class="ui-switch">
        <input type="checkbox" id="toggleDarkLightMode" name="light-switch"
            class="light-switch data-[state=on]:bg-accent data-[state=on]:text-accent-foreground">
        <div class="slider">
            <div class="circle"></div>
        </div>
        <style>
            /* switch settings 👇 */
            .ui-switch {
                /* switch */
                --switch-bg: rgb(135, 150, 165);
                --switch-width: 48px;
                --switch-height: 20px;
                /* circle */
                --circle-diameter: 32px;
                --circle-bg: rgb(232, 89, 15);
                --circle-inset: calc((var(--circle-diameter) - var(--switch-height)) / 2);
            }

            .ui-switch input {
                display: none;
            }

            .slider {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                width: var(--switch-width);
                height: var(--switch-height);
                background: var(--switch-bg);
                border-radius: 999px;
                position: relative;
                cursor: pointer;
            }

            .slider .circle {
                top: calc(var(--circle-inset) * -1);
                left: 0;
                width: var(--circle-diameter);
                height: var(--circle-diameter);
                position: absolute;
                background: var(--circle-bg);
                border-radius: inherit;
                background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjAiIHdpZHRoPSIyMCIgdmlld0JveD0iMCAwIDIwIDIwIj4KICAgIDxwYXRoIGZpbGw9IiNmZmYiCiAgICAgICAgZD0iTTkuMzA1IDEuNjY3VjMuNzVoMS4zODlWMS42NjdoLTEuMzl6bS00LjcwNyAxLjk1bC0uOTgyLjk4Mkw1LjA5IDYuMDcybC45ODItLjk4Mi0xLjQ3My0xLjQ3M3ptMTAuODAyIDBMMTMuOTI3IDUuMDlsLjk4Mi45ODIgMS40NzMtMS40NzMtLjk4Mi0uOTgyek0xMCA1LjEzOWE0Ljg3MiA0Ljg3MiAwIDAwLTQuODYyIDQuODZBNC44NzIgNC44NzIgMCAwMDEwIDE0Ljg2MiA0Ljg3MiA0Ljg3MiAwIDAwMTQuODYgMTAgNC44NzIgNC44NzIgMCAwMDEwIDUuMTM5em0wIDEuMzg5QTMuNDYyIDMuNDYyIDAgMDExMy40NzEgMTBhMy40NjIgMy40NjIgMCAwMS0zLjQ3MyAzLjQ3MkEzLjQ2MiAzLjQ2MiAwIDAxNi41MjcgMTAgMy40NjIgMy40NjIgMCAwMTEwIDYuNTI4ek0xLjY2NSA5LjMwNXYxLjM5aDIuMDgzdi0xLjM5SDEuNjY2em0xNC41ODMgMHYxLjM5aDIuMDg0di0xLjM5aC0yLjA4NHpNNS4wOSAxMy45MjhMMy42MTYgMTUuNGwuOTgyLjk4MiAxLjQ3My0xLjQ3My0uOTgyLS45ODJ6bTkuODIgMGwtLjk4Mi45ODIgMS40NzMgMS40NzMuOTgyLS45ODItMS40NzMtMS40NzN6TTkuMzA1IDE2LjI1djIuMDgzaDEuMzg5VjE2LjI1aC0xLjM5eiIgLz4KPC9zdmc+");
                background-repeat: no-repeat;
                background-position: center center;
                -webkit-transition: left 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                transition: left 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, -webkit-transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, 0.12);
                box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, 0.12);
                ;
            }

            .slider .circle::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.75);
                border-radius: inherit;
                -webkit-transition: all 500ms;
                transition: all 500ms;
                opacity: 0;
            }

            /* actions */
            .ui-switch input:checked+.slider .circle {
                left: calc(100% - var(--circle-diameter));
                background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjAiIHdpZHRoPSIyMCIgdmlld0JveD0iMCAwIDIwIDIwIj4KICAgIDxwYXRoIGZpbGw9IiNmZmYiCiAgICAgICAgZD0iTTQuMiAyLjVsLS43IDEuOC0xLjguNyAxLjguNy43IDEuOC42LTEuOEw2LjcgNWwtMS45LS43LS42LTEuOHptMTUgOC4zYTYuNyA2LjcgMCAxMS02LjYtNi42IDUuOCA1LjggMCAwMDYuNiA2LjZ6IiAvPgo8L3N2Zz4=");
                background-color: rgb(0, 56, 146);
            }

            .ui-switch input:active+.slider .circle::before {
                -webkit-transition: 0s;
                transition: 0s;
                opacity: 1;
                width: 0;
                height: 0;
            }
        </style>
    </label>
    <script>
        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem("dark-mode");
            const isDarkMode = darkModePreference === "true";
            document.documentElement.classList.toggle("dark", isDarkMode);
            document.getElementById('toggleDarkLightMode').checked = isDarkMode; // Sync checkbox with dark mode
        }

        document.getElementById('toggleDarkLightMode').addEventListener('change', function () {
            if (this.checked) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('dark-mode', true);
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('dark-mode', false);
            }
        });

        // Apply dark mode preference on load
        applyDarkModePreference();
    </script>
</div>--}}

{{-- v.3 this works somehow --}}
<div>
    <label class="dark-mode-toggle">
        <input type="checkbox" id="darkModeToggle" name="light-switch"
            class="light-switch data-[state=on]:bg-accent data-[state=on]:text-accent-foreground" tabindex="-1">
        <span class="toggle-slider"></span>
    </label>
    <style>
        /* Switch-button styles */
        .dark-mode-toggle {
            display: block;
            --width-of-switch: 3.5em;
            --height-of-switch: 2em;
            --size-of-icon: 1.4em;
            --slider-offset: 0.3em;
            position: relative;
            width: var(--width-of-switch);
            height: var(--height-of-switch);
        }

        .dark-mode-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #dcdcdc;
            transition: .4s;
            border-radius: 30px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: var(--size-of-icon);
            width: var(--size-of-icon);
            border-radius: 20px;
            left: var(--slider-offset);
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(40deg, #ff0080, #ff8c00 70%);
            transition: .4s;
        }

        input:checked + .toggle-slider {
            background-color: #303136;
        }

        input:checked + .toggle-slider:before {
            left: calc(100% - (var(--size-of-icon) + var(--slider-offset)));
            background: #303136;
            box-shadow: inset -3px -2px 5px -2px #8983f7, inset -10px -4px 0 0 #a3dafb;
        }
    </style>
    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');
        const htmlElement = document.documentElement;

        // Function to apply dark mode preference on page load
        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem("dark-mode");
            const isDarkMode = darkModePreference === "true";
            htmlElement.classList.toggle("dark", isDarkMode);
            darkModeToggle.checked = isDarkMode; // Sync checkbox with dark mode
        }

        // Function to toggle dark mode
        function toggleDarkMode() {
            const isDarkMode = htmlElement.classList.toggle('dark');
            localStorage.setItem('dark-mode', isDarkMode ? 'true' : 'false');
        }

        // Add event listener to checkbox
        darkModeToggle.addEventListener('change', toggleDarkMode);

        // Apply dark mode preference on page load
        document.addEventListener('DOMContentLoaded', applyDarkModePreference);
    </script>
</div>

{{-- v.4 simple --}}
{{--<div>
    <button title="Toggle Theme" onclick="theme()"
        class="
        w-12 
        h-6 
        rounded-full 
        p-1 
        bg-gray-400 
        dark:bg-gray-600 
        relative 
        transition-colors 
        duration-500 
        ease-in
        focus:outline-none 
        focus:ring-2 
        focus:ring-blue-700 
        dark:focus:ring-blue-600 
        focus:border-transparent">
        <div id="toggle"
            class="
            rounded-full 
            w-4 
            h-4 
            bg-blue-600 
            dark:bg-blue-500 
            relative 
            ml-0 
            dark:ml-6 
            pointer-events-none 
            transition-all 
            duration-300 
            ease-out
        ">
        </div>
    </button>

    <script>
        function theme(event) {
            console.log('theme')
            document.documentElement.classList.toggle('dark')
        }
    </script>

    <!-- imitate dark mode styles enabled -->
    <style>
        html.dark {
            --tw-bg-opacity: 1;
            background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
        }

        html.dark .dark\:ml-6 {
            margin-left: 1.5rem;
        }

        html.dark .dark\:bg-blue-500 {
            --tw-bg-opacity: 1;
            background-color: rgba(59, 130, 246, var(--tw-bg-opacity));
        }
    </style>
</div>--}}

{{-- v.5 (this is cute too T-T) --}}
{{--<div>
    <div class="checkbox-wrapper-5">
        <div class="check">
            <input id="check-5" type="checkbox">
            <label for="check-5"></label>
        </div>
    </div>
    <style>
        .checkbox-wrapper-5 .check {
            --size: 25px; /* Adjusted size */
            position: relative;
            background: linear-gradient(90deg, #f19af3, #f099b5);
            line-height: 0;
            perspective: 400px;
            font-size: var(--size);
        }

        .checkbox-wrapper-5 .check input[type="checkbox"],
        .checkbox-wrapper-5 .check label,
        .checkbox-wrapper-5 .check label::before,
        .checkbox-wrapper-5 .check label::after,
        .checkbox-wrapper-5 .check {
            appearance: none;
            display: inline-block;
            border-radius: var(--size);
            border: 0;
            transition: .35s ease-in-out;
            box-sizing: border-box;
            cursor: pointer;
        }

        .checkbox-wrapper-5 .check label {
            width: calc(2.2 * var(--size));
            height: var(--size);
            background: #d7d7d7;
            overflow: hidden;
        }

        .checkbox-wrapper-5 .check input[type="checkbox"] {
            position: absolute;
            z-index: 1;
            width: calc(.8 * var(--size));
            height: calc(.8 * var(--size));
            top: calc(.1 * var(--size));
            left: calc(.1 * var(--size));
            background: linear-gradient(45deg, #dedede, #ffffff);
            box-shadow: 0 6px 7px rgba(0, 0, 0, 0.3);
            outline: none;
            margin: 0;
        }

        .checkbox-wrapper-5 .check input[type="checkbox"]:checked {
            left: calc(1.3 * var(--size));
        }

        .checkbox-wrapper-5 .check input[type="checkbox"]:checked + label {
            background: transparent;
        }

        .checkbox-wrapper-5 .check label::before,
        .checkbox-wrapper-5 .check label::after {
            content: "· ·";
            position: absolute;
            overflow: hidden;
            left: calc(.15 * var(--size));
            top: calc(.5 * var(--size));
            height: var(--size);
            letter-spacing: calc(-0.04 * var(--size));
            color: #9b9b9b;
            font-family: "Times New Roman", serif;
            z-index: 2;
            font-size: calc(.6 * var(--size));
            border-radius: 0;
            transform-origin: 0 0 calc(-0.5 * var(--size));
            backface-visibility: hidden;
        }

        .checkbox-wrapper-5 .check label::after {
            content: "●";
            top: calc(.65 * var(--size));
            left: calc(.2 * var(--size));
            height: calc(.1 * var(--size));
            width: calc(.35 * var(--size));
            font-size: calc(.2 * var(--size));
            transform-origin: 0 0 calc(-0.4 * var(--size));
        }

        .checkbox-wrapper-5 .check input[type="checkbox"]:checked + label::before,
        .checkbox-wrapper-5 .check input[type="checkbox"]:checked + label::after {
            left: calc(1.55 * var(--size));
            top: calc(.4 * var(--size));
            line-height: calc(.1 * var(--size));
            transform: rotateY(360deg);
        }

        .checkbox-wrapper-5 .check input[type="checkbox"]:checked + label::after {
            height: calc(.16 * var(--size));
            top: calc(.55 * var(--size));
            left: calc(1.6 * var(--size));
            font-size: calc(.6 * var(--size));
            line-height: 0;
        }
    </style>
    <script>
        const checkbox = document.getElementById('check-5');
        const htmlElement = document.documentElement;

        // Apply dark mode preference on page load
        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem("dark-mode");
            const isDarkMode = darkModePreference === "true";
            htmlElement.classList.toggle("dark", isDarkMode);
            checkbox.checked = isDarkMode; // Sync checkbox with dark mode
        }

        // Function to toggle dark mode
        function toggleDarkMode() {
            const isDarkMode = htmlElement.classList.toggle('dark');
            localStorage.setItem('dark-mode', isDarkMode ? 'true' : 'false');
        }

        // Add event listener to checkbox
        checkbox.addEventListener('change', toggleDarkMode);

        // Apply dark mode preference on page load
        document.addEventListener('DOMContentLoaded', applyDarkModePreference);
    </script>
</div>--}}

{{-- v.6 (THIS ONE HAS ANIMATIONS T-T) --}}
{{--<div>
    <label class="switch">
        <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g fill="#ffd43b">
                    <circle r="5" cy="12" cx="12"></circle>
                    <path
                        d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z">
                    </path>
                </g>
            </svg></span>
        <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <path
                    d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z">
                </path>
            </svg></span>
        <input type="checkbox" class="input" id="darkModeToggle">
        <span class="slider"></span>
    </label>
    <style>
        .switch {
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 64px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #73C0FC;
            transition: .4s;
            border-radius: 30px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 30px;
            width: 30px;
            border-radius: 20px;
            left: 2px;
            bottom: 2px;
            z-index: 2;
            background-color: #e8e8e8;
            transition: .4s;
        }

        .sun svg {
            position: absolute;
            top: 6px;
            left: 36px;
            z-index: 1;
            width: 24px;
            height: 24px;
        }

        .moon svg {
            fill: #73C0FC;
            position: absolute;
            top: 5px;
            left: 5px;
            z-index: 1;
            width: 24px;
            height: 24px;
        }

        /* .switch:hover */
        .sun svg {
            animation: rotate 15s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* .switch:hover */
        .moon svg {
            animation: tilt 5s linear infinite;
        }

        @keyframes tilt {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(10deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .input:checked+.slider {
            background-color: #183153;
        }

        .input:focus+.slider {
            box-shadow: 0 0 1px #183153;
        }

        .input:checked+.slider:before {
            transform: translateX(30px);
        }
    </style>
    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');
        const htmlElement = document.documentElement;

        // Function to toggle dark mode
        function toggleDarkMode() {
            htmlElement.classList.toggle('dark');
            const isDarkMode = htmlElement.classList.contains('dark');
            localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
        }

        // Apply dark mode preference on page load
        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem('darkMode');
            const isDarkMode = darkModePreference === 'enabled';
            htmlElement.classList.toggle('dark', isDarkMode);
            darkModeToggle.checked = isDarkMode;
        }

        // Add event listener to checkbox
        darkModeToggle.addEventListener('change', toggleDarkMode);

        // Apply dark mode preference on page load
        document.addEventListener('DOMContentLoaded', applyDarkModePreference);
    </script>
</div>--}}

{{-- v.7 --}}
{{--<div>
    <label class="inline-flex items-center relative">
        <input class="peer hidden" id="toggle" type="checkbox" />
        <div
            class="relative w-[80px] h-[40px] bg-white peer-checked:bg-zinc-500 rounded-full 
                    after:absolute after:content-[''] after:w-[30px] after:h-[30px] 
                    after:bg-gradient-to-r from-orange-500 to-yellow-400 
                    peer-checked:after:from-zinc-900 peer-checked:after:to-zinc-900 
                    after:rounded-full after:top-[5px] after:left-[5px] 
                    active:after:w-[40px] peer-checked:after:left-[70px] 
                    peer-checked:after:translate-x-[-100%] shadow-sm duration-300 
                    after:duration-300 after:shadow-md">
        </div>
        <svg height="0" width="100" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
            xmlns="http://www.w3.org/2000/svg" class="fill-white peer-checked:opacity-60 absolute w-5 h-5 left-[10px]">
            <path
                d="M12,17c-2.76,0-5-2.24-5-5s2.24-5,5-5,5,2.24,5,5-2.24,5-5,5ZM13,0h-2V5h2V0Zm0,19h-2v5h2v-5ZM5,11H0v2H5v-2Zm19,0h-5v2h5v-2Zm-2.81-6.78l-1.41-1.41-3.54,3.54,1.41,1.41,3.54-3.54ZM7.76,17.66l-1.41-1.41-3.54,3.54,1.41,1.41,3.54-3.54Zm0-11.31l-3.54-3.54-1.41,1.41,3.54,3.54,1.41-1.41Zm13.44,13.44l-3.54-3.54-1.41,1.41,3.54,3.54,1.41-1.41Z">
            </path>
        </svg>
        <svg height="512" width="512" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
            xmlns="http://www.w3.org/2000/svg"
            class="fill-black opacity-60 peer-checked:opacity-70 peer-checked:fill-white absolute w-5 h-5 right-[10px]">
            <path
                d="M12.009,24A12.067,12.067,0,0,1,.075,10.725,12.121,12.121,0,0,1,10.1.152a13,13,0,0,1,5.03.206,2.5,2.5,0,0,1,1.8,1.8,2.47,2.47,0,0,1-.7,2.425c-4.559,4.168-4.165,10.645.807,14.412h0a2.5,2.5,0,0,1-.7,4.319A13.875,13.875,0,0,1,12.009,24Zm.074-22a10.776,10.776,0,0,0-1.675.127,10.1,10.1,0,0,0-8.344,8.8A9.928,9.928,0,0,0,4.581,18.7a10.473,10.473,0,0,0,11.093,2.734.5.5,0,0,0,.138-.856h0C9.883,16.1,9.417,8.087,14.865,3.124a.459.459,0,0,0,.127-.465.491.491,0,0,0-.356-.362A10.68,10.68,0,0,0,12.083,2ZM20.5,12a1,1,0,0,1-.97-.757l-.358-1.43L17.74,9.428a1,1,0,0,1,.035-1.94l1.4-.325.351-1.406a1,1,0,0,1,1.94,0l.355,1.418,1.418.355a1,1,0,0,1,0,1.94l-1.418.355-.355,1.418A1,1,0,0,1,20.5,12ZM16,14a1,1,0,0,0,2,0A1,1,0,0,0,16,14Zm6,4a1,1,0,0,0,2,0A1,1,0,0,0,22,18Z">
            </path>
        </svg>
    </label>
    <script>
        // Check for dark mode preference in localStorage
        const toggleInput = document.querySelector('#toggle');
        const isDarkMode = localStorage.getItem('darkMode') === 'true';

        // Set the initial toggle state and theme based on localStorage
        if (isDarkMode) {
            toggleInput.checked = true;
            document.body.classList.add('dark');
        }

        // Add event listener for the toggle input
        toggleInput.addEventListener('change', () => {
            if (toggleInput.checked) {
                // Apply dark mode styles
                document.body.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            } else {
                // Remove dark mode styles
                document.body.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            }
        });
    </script>
    <style>
        body.dark {
            background-color: #121212;
            color: #ffffff;
        }
    </style>
</div>--}}

{{-- v.8 (too big but too cute :<) --}}
{{--<div>
    <div class="toggle-container">
        <input class="toggle-input" id="toggle" type="checkbox" />
        <label class="toggle-label" for="toggle">
            <div class="face">
                <div class="eye left-eye"></div>
                <div class="toggle-switch"></div>
                <div class="eye right-eye"></div>
                <div class="smile"></div>
            </div>
        </label>
    </div>
    <style>
        .toggle-container {
            position: relative;
            width: 120px;
            /* Adjusted width */
            height: 60px;
            /* Adjusted height */
        }

        .toggle-input {
            display: none;
        }

        .toggle-label {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            /* Updated to match container */
            height: 40px;
            /* Adjusted height */
            background: #ff4c4c;
            /* Default background */
            border-radius: 20px;
            /* Adjusted border radius */
            box-shadow: 0 4px #b93737;
            /* Adjusted shadow */
            transition: background 0.3s ease-in-out;
            cursor: pointer;
            padding: 0 8px;
            /* Adjusted padding */
        }

        .face {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }

        .eye {
            position: relative;
            width: 8px;
            /* Adjusted width */
            height: 8px;
            /* Adjusted height */
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease-in-out;
        }

        .smile {
            position: absolute;
            bottom: 20px;
            /* Adjusted position */
            left: 50%;
            width: 30px;
            /* Adjusted width */
            height: 15px;
            /* Adjusted height */
            border: 2px solid transparent;
            border-radius: 50%;
            transform: translateX(-50%);
            transition: all 0.3s ease-in-out;
        }

        .toggle-switch {
            position: relative;
            width: 28px;
            /* Adjusted width */
            height: 14px;
            /* Adjusted height */
            background: white;
            border-radius: 7px;
            /* Adjusted border radius */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
            margin: 0 8px;
            /* Adjusted margin */
            z-index: 1;
        }

        .toggle-switch:before {
            content: "";
            position: absolute;
            width: 12px;
            /* Adjusted width */
            height: 12px;
            /* Adjusted height */
            background: #ff4c4c;
            border-radius: 50%;
            transition: all 0.3s ease-in-out;
            top: 50%;
            left: 2px;
            /* Adjusted position */
            transform: translateY(-50%);
        }

        .toggle-input:checked+.toggle-label .toggle-switch:before {
            background: #28a745;
            left: 14px;
            /* Adjusted position */
        }

        .toggle-input:checked+.toggle-label .smile {
            border-bottom-color: #fff;
            border-top: none;
            bottom: 8px;
            /* Adjusted position */
        }

        .toggle-input:not(:checked)+.toggle-label .smile {
            border-top-color: #fff;
            border-bottom: none;
            bottom: 0;
        }

        .toggle-input:checked+.toggle-label {
            background: #ced10a;
            box-shadow: 0 4px #74c027;
            /* Adjusted shadow */
        }

        .toggle-input:not(:checked)+.toggle-label {
            background: #252422;
            /* Default background for dark mode */
            box-shadow: 0 4px #484d48;
            /* Adjusted shadow */
        }

        .toggle-label:hover .eye {
            width: 12px;
            /* Adjusted width */
            height: 12px;
            /* Adjusted height */
        }

        @keyframes blink {

            0%,
            90%,
            100% {
                height: 8px;
                /* Adjusted height */
            }

            95% {
                height: 2px;
            }
        }

        .left-eye {
            animation: blink 3s infinite;
        }

        .right-eye {
            animation: blink 3s infinite;
        }

        /* Dark Mode Styles */
        body.dark .toggle-input:not(:checked)+.toggle-label {
            background: #1c1c1c;
            /* Dark background */
        }
    </style>
    <script>
        // Check for dark mode preference in localStorage
        const toggleInput = document.querySelector('#toggle');
        const isDarkMode = localStorage.getItem('darkMode') === 'true';

        // Set the initial toggle state and theme based on localStorage
        if (isDarkMode) {
            toggleInput.checked = true;
            document.body.classList.add('dark');
        }

        // Add event listener for the toggle input
        toggleInput.addEventListener('change', () => {
            if (toggleInput.checked) {
                // Apply dark mode styles
                document.body.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            } else {
                // Remove dark mode styles
                document.body.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            }
        });
    </script>
</div>--}}

{{-- v.9 (the jump doe T-T) --}}
{{--<div>
    <label class="switch">
        <input type="checkbox" id="darkModeToggle" />
        <span class="slider">
            <span class="circle">
                <span class="shine shine-1"></span>
                <span class="shine shine-2"></span>
                <span class="shine shine-3"></span>
                <span class="shine shine-4"></span>
                <span class="shine shine-5"></span>
                <span class="shine shine-6"></span>
                <span class="shine shine-7"></span>
                <span class="shine shine-8"></span>
                <span class="moon"></span>
            </span>
        </span>
    </label>

    <style>
        .switch {
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 3.5em;
            height: 2em;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #333;
            transition: 0.4s;
            border-radius: 30px;
            overflow: hidden;
        }

        .circle {
            position: absolute;
            content: "";
            height: 1.4em;
            width: 1.4em;
            border-radius: 20px;
            left: 0.3em;
            bottom: 0.3em;
            background-color: #fff000;
            transform: rotate(360deg) translateX(0);
            transition: 0.4s;
        }

        .switch input:checked+.slider .circle {
            transform: rotate(0deg) translateX(1.5em) !important;
        }

        .switch input:checked+.slider .circle .shine {
            transform: translate(0%, 0%) !important;
        }

        .switch input:checked+.slider .circle .moon {
            left: -10%;
            opacity: 1;
            transform: translateY(-60%);
        }

        .moon {
            position: absolute;
            left: -100%;
            top: 50%;
            opacity: 0;
            background-color: #333;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 99999px;
            transform: translateY(-50%);
            transition: all 0.4s;
        }

        .shine {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0.25rem;
            height: 0.25rem;
            background-color: #fff000;
            border-radius: 1rem;
            transition: all 0.4s;
        }

        .shine-1 {
            transform: translate(-50%, -375%);
        }

        .shine-2 {
            transform: translate(175%, -275%);
        }

        .shine-3 {
            transform: translate(275%, -50%);
        }

        .shine-4 {
            transform: translate(175%, 175%);
        }

        .shine-5 {
            transform: translate(-50%, 275%);
        }

        .shine-6 {
            transform: translate(-275%, 175%);
        }

        .shine-7 {
            transform: translate(-375%, -50%);
        }

        .shine-8 {
            transform: translate(-275%, -275%);
        }
    </style>

    <script>
        function applyDarkModePreference() {
            const darkModePreference = localStorage.getItem("darkMode");
            const isDarkMode = darkModePreference === "enabled";
            document.documentElement.classList.toggle("dark", isDarkMode);
            updateButtonVisibility(isDarkMode); // Updates button visibility on page load

            // Set the checkbox state based on the preference
            document.getElementById("darkModeToggle").checked = isDarkMode;
        }

        function toggleDarkMode() {
            const isChecked = document.getElementById("darkModeToggle").checked;
            const darkModePreference = isChecked ? "enabled" : "disabled";
            localStorage.setItem("darkMode", darkModePreference);
            applyDarkModePreference(); // Apply the change
        }

        // Event listener for checkbox toggle
        document.getElementById("darkModeToggle").addEventListener("change", toggleDarkMode);

        // Call the function on page load
        window.onload = applyDarkModePreference;
    </script>
</div>--}}

