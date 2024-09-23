import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Explicitly disable dark mode
    content: [
        "./src/**/*.{html,js,php}",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                hanken: ["Hanken Grotesk", "sans-serif"],
            },

            colors: {
                main: "#0a998f",
                tint_1: "#e7f5f4",
                tint_2: "#ceebe9",
                tint_3: "#b6e0dd",
                tint_4: "#9dd6d2",
                tint_5: "#85ccc7",
                tint_6: "#6cc2bc",
                tint_7: "#54b8b1",
                tint_8: "#3bada5",
                tint_9: "#22a39a",
                shade_1: "#098a81",
                shade_2: "#087a72",
                shade_3: "#076b64",
                shade_4: "#065c56",
                shade_5: "#065c56",
                shade_6: "#450e5e",
                shade_7: "#032e2b",
                shade_8: "#021f1d",
                shade_9: "#010f0e",
                primary: "#ffffff",
                secondary: "#000000",
                complementary: "#eacc22",

                primary: "#ffffff",
                secondary: "#e4e6eb",
                thirdy: "#b0b3b8",
                darkmode_lessdark: "#3b3d40",
                darkmode_dark: "#18191a",
                darkmode_light: "#242526",
                darkmode_lighter: "#3a3b3c",
                black: "#000000",
                gray_1k: "#7a818c",
                textblack: "#18191a",
                textwhite: "#e4e6eb",
                coolblue: "#2563eb",
            },
            padding: {
                5: "1.5rem",
                15: "5rem",
                25: "10rem",
                45: "12rem",
            },
            margin: {
                13: "3.5rem",
                15: "5rem",
                25: "10rem",
            },
            spacing: {
                15: "5rem",
            },
            width: {
                55: "13rem",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"), // Retain the forms plugin
        require("flowbite/plugin"),

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
