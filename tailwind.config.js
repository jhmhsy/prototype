import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Explicitly disable dark mode
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primary: "#ffffff",
                secondary: "#e4e6eb",
                thirdy: "#b0b3b8",
                darkmode_dark: "#18191a",
                darkmode_light: "#242526",
                darkmode_lighter: "#3a3b3c",
                black: "#000000",

                textblack: "#18191a",
                textwhite: "#e4e6eb",

                coolblue: "#2563eb",
            },
            padding: {
                45: "12rem",
                25: "10rem",
            },
            margin: {
                25: "10rem",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"), // Retain the forms plugin
        function ({ addUtilities }) {
            addUtilities(
                {
                    ".no-spinner": {
                        /* Hide spinner controls for Webkit browsers (e.g., Chrome, Safari) */
                        "-webkit-appearance": "none",
                        margin: "0",

                        /* Hide spinner controls for Firefox */
                        "-moz-appearance": "textfield",
                        appearance: "none",
                    },
                    ".no-spinner::-webkit-inner-spin-button": {
                        "-webkit-appearance": "none",
                    },
                    ".no-spinner::-webkit-outer-spin-button": {
                        "-webkit-appearance": "none",
                    },
                },
                ["responsive", "hover"]
            );
        },
    ],
};
