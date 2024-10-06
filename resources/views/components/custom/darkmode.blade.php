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
<div>
    <label class="switch-button">
        <input type="checkbox" id="toggleDarkLightMode">
        <span class="slider-button"></span>
    </label>
</div>

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

<script>
    // Function to toggle between dark and light mode
    // Save the user's preference for dark mode in localStorage
    const toggleSwitch = document.getElementById('toggleDarkLightMode');

    // Check if dark mode was previously enabled in localStorage
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark'); // Apply dark mode class
        toggleSwitch.checked = true; // Set the switch to checked (dark mode)
    }

    toggleSwitch.addEventListener('change', function() {
        if (toggleSwitch.checked) {
            // Enable dark mode
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            // Disable dark mode (switch to light mode)
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });
</script>
