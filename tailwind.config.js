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
        screens: {
            xs: "360px", // Add this line for the xs breakpoint
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                hanken: ["Hanken Grotesk", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
                opensans: ["Open Sans", "sans-serif"],
                bebas: ["Bebas Neue", "sans-serif"],
                nunito: ["Nunito Sans", "sans-serif"],
            },
            fontWeight: {
                thin: 100,
                extraLight: 200,
                light: 300,
                normal: 400,
                medium: 500,
                bold: 700,
                extraBold: 800,
                black: 900,
            },
            height: {
                72: "18rem",
                128: "32rem",
            },
            lineHeight: {
                20: "80px",
            },
            colors: {
                //custom green color shades
                main: "#1c7e95",
                tint_1: "#e8f2f4",
                tint_2: "#d2e5ea",
                tint_3: "#bbd8df",
                tint_4: "#a4cbd5",
                tint_5: "#8ebfca",
                tint_6: "#77b2bf",
                tint_7: "#60a5b5",
                tint_8: "#4998aa",
                tint_9: "#338ba0",
                shade_1: "#197186",
                shade_2: "#166577",
                shade_3: "#145868",
                shade_4: "#114c59",
                shade_5: "#0e3f4b",
                shade_6: "#0b323c",
                shade_7: "#08262d",
                shade_8: "#06191e",
                shade_9: "#030d0f",
                primary: "#ffffff",
                secondary: "#000000",
                complementary: "#fffd19",

                lemon_1: "#fcffcc",
                lemon_2: "#f6ff4d",
                lemon_base: "#fffd19",
                lemon_4: "#919900",
                lemon_5: "#27290d",

                peak_1: "#030c12",
                peak_2: "#081522",
                peak_3: "#050c17",
                peak_4: "#03090f",
                peak_5: "#020508",

                night_1: "black",
                night_2: "#0A0A0A",
                night_3: "#0E0F10",

                // custom color for default darkmode
                darkmode_dark: "#18191a", //darkmode dark
                darkmode_light: "#242526", //darkmode light
                darkmode_lighter: "#3a3b3c", // darkmode lighter
                darkmode_lighest: "#3b3d40", //darkmode lightest
                gray_1k: "#7a818c",

                //black,gray, white custom color for textP
                textwhite: "#ffffff",
                softgray: "#e6e6e6",
                subtlegray: "#b3b3b3",
                basegray: "rgb(107, 114, 128)   ",
                shadowgray: "#4d4d4d",
                charcoalgray: "#555555",
                darkgray: "#1c1c1c",
                darkestgray: "#060606",

                textblack: "#000000",

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
