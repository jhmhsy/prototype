<button
    {{ $attributes->merge(['class' => 'px-4 py-2 rounded-md transition duration-300 ease-in-out relative overflow-hidden w-full sm:w-auto rainbow-border']) }}>
    <span class="text relative z-10  animated-text">{{ $slot }}</span>
</button>
<style>
    .rainbow-border {
        transition: transform 0.3s ease-in-out;
        animation: spin 1.5s linear infinite;
        border-radius: 5px;
        color: black;
        background: #e5e7eb;
        border: 3px solid transparent;
        background-clip: padding-box, border-box;
        background-origin: padding-box, border-box;
        background-image: linear-gradient(#e5e7eb, #e5e7eb), conic-gradient(from var(--bg-angle) in oklch longer hue, oklch(1 0.37 0) 0 0);
    }

    @property --bg-angle {
        inherits: false;
        initial-value: 0deg;
        syntax: "<angle>";
    }
    .rainbow-border:hover {
        transform: scale(1.05); /* Scale on hover */
    }
    @keyframes spin {
        to {
            --bg-angle: 360deg;
        }
    }
    @keyframes textColorChange {
        0% {
            color: oklch(1 0.37 0);
        }
        20% {
            color: oklch(0.8 0.5 0.2);
        }
        40% {
            color: oklch(0.6 0.6 0.4);
        }
        60% {
            color: oklch(0.4 0.7 0.6);
        }
        80% {
            color: oklch(0.2 0.8 0.8);
        }
        100% {
            color: oklch(1 0.37 0);
        }
    }

    .animated-text {
        animation: textColorChange 3s linear infinite;
    }
</style>
