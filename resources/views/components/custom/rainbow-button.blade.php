<button {{ $attributes->merge(['class' => "px-4 py-2 rounded-md transition duration-300 ease-in-out relative overflow-hidden w-full sm:w-auto rainbow-button"])}} >
    <span class="rainbow-button-text relative z-10">{{ $slot }}</span>
</button>
<style>
    @keyframes rainbow-background {
        0% {
            background-color: red;
            color: black;
        }

        16% {
            background-color: orange;
            color: black;
        }

        33% {
            background-color: yellow;
            color: black;
        }

        50% {
            background-color: green;
            color: white;
        }

        66% {
            background-color: blue;
            color: white;
        }

        83% {
            background-color: indigo;
            color: white;
        }

        100% {
            background-color: violet;
            color: black;
        }
    }

    .rainbow-button {
        border: 2px solid;
        animation: rainbow-border 5s linear infinite, rainbow-background 5s linear infinite;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: bold;
        color: black;
        border-radius: 0.375rem;
        transition: transform 0.2s;
    }

    .rainbow-button:hover {
        transform: scale(1.05);
    }
    .rainbow-button.clicked {
    border-color: red;
    animation: rainbow-background 5s linear infinite;
    }

</style>
