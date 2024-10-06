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
</div> --}}
{{-- <div>
    <label class="switch-button">
        <input type="checkbox" id="toggleDarkLightMode" name="light-switch"
            class="light-switch data-[state=on]:bg-accent data-[state=on]:text-accent-foreground">
        <span class="slider-button"></span>
    </label>
    <style>
        /* Switch-button styles you provided */
        .switch-button {
            display: block;
            --width-of-switch: 3.5em;
            --height-of-switch: 2em;
            --size-of-icon: 1.4em;
            --slider-offset: 0.3em;
            position: relative;
            width: var(--width-of-switch);
            height: var(--height-of-switch);
        }

        .switch-button input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider-button {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f4f4f5;
            transition: .4s;
            border-radius: 30px;
        }

        .slider-button:before {
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

        input:checked+.slider-button {
            background-color: #303136;
        }

        input:checked+.slider-button:before {
            left: calc(100% - (var(--size-of-icon) + var(--slider-offset)));
            background: #303136;
            box-shadow: inset -3px -2px 5px -2px #8983f7, inset -10px -4px 0 0 #a3dafb;
        }
    </style>
</div> --}}
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
    // Function to toggle between dark and light mode
    // Save the user's preference for dark mode in localStorage
    const lightSwitches = document.querySelectorAll('.light-switch');
    if (lightSwitches.length > 0) {
        lightSwitches.forEach((lightSwitch, i) => {
            if (localStorage.getItem('dark-mode') === 'true') {
                lightSwitch.checked = true;
            }
            lightSwitch.addEventListener('change', () => {
                const {
                    checked
                } = lightSwitch;
                lightSwitches.forEach((el, n) => {
                    if (n !== i) {
                        el.checked = checked;
                    }
                });
                if (lightSwitch.checked) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('dark-mode', true);
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('dark-mode', false);
                }
            });
        });
    }
</script>
