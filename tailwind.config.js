import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Explicitly disable dark mode
    safelist: [
        'polygon-1',
        'polygon-2',
        'polygon-1-wrapper',
        'polygon-2-wrapper',
    ],
    content: [
        "./src/**/*.{html,js,php}",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./storage/framework/views/*.php",
    ],
    theme: {
        transitionProperty: {
            'bg': 'background-color', // Add this line to define a custom transition for background color
        },
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
                raleway: ["Raleway", "sans-serif"],
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
                primary: "#ffffff",
                secondary: "#000000",

                "lemon-1": "#fcffcc",
                "lemon-2": "#f6ff4d",
                "lemon-base": "#fffd19",
                "lemon-4": "#919900",
                "lemon-5": "#27290d",

                peak_1: "#030c12",
                peak_2: "#081522",
                peak_3: "#050c17",
                peak_4: "#03090f",
                peak_5: "#020508",

                "peak-1": "#030c12",
                "peak-2": "#081522",
                "peak-3": "#050c17",
                "peak-4": "#03090f",
                "peak-5": "#020508",

                night_0: "#000000",
                night_1: "#0A0A0A",
                night_2: "#0E0F10",
                night_3: "#0E0F10",

                night: "#000000",
                "night-1": "#0A0A0A",
                "night-2": "#0E0F10",

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
    screens: {
      xs: '360px', // Add this line for the xs breakpoint
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        hanken: ['Hanken Grotesk', 'sans-serif'],
        roboto: ['Roboto', 'sans-serif'],
        opensans: ['Open Sans', 'sans-serif'],
        raleway: ['Raleway', 'sans-serif'],
        nunito: ['Nunito Sans', 'sans-serif'],
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
        72: '18rem',
        128: '32rem',
      },
      lineHeight: {
        20: '80px',
      },
      colors: {
        primary: '#ffffff',
        secondary: '#000000',

        'lemon-1': '#fcffcc',
        'lemon-2': '#f6ff4d',
        'lemon-base': '#fffd19',
        'lemon-4': '#919900',
        'lemon-5': '#27290d',

        peak_1: '#030c12',
        peak_2: '#081522',
        peak_3: '#050c17',
        peak_4: '#03090f',
        peak_5: '#020508',

        'peak-1': '#030c12',
        'peak-2': '#081522',
        'peak-3': '#050c17',
        'peak-4': '#03090f',
        'peak-5': '#020508',

        night_0: '#000000',
        night_1: '#0A0A0A',
        night_2: '#0E0F10',
        night_3: '#0E0F10',

        night: '#000000',
        'night-1': '#0A0A0A',
        'night-2': '#0E0F10',

        // custom color for default darkmode
        darkmode_dark: '#18191a', //darkmode dark
        darkmode_light: '#242526', //darkmode light
        darkmode_lighter: '#3a3b3c', // darkmode lighter
        darkmode_lighest: '#3b3d40', //darkmode lightest
        gray_1k: '#7a818c',

        //black,gray, white custom color for textP
        textwhite: '#ffffff',
        softgray: '#e6e6e6',
        subtlegray: '#b3b3b3',
        basegray: 'rgb(107, 114, 128)   ',
        shadowgray: '#4d4d4d',
        charcoalgray: '#555555',
        darkgray: '#1c1c1c',
        darkestgray: '#060606',

        coolblue: '#2563eb',
      },
      padding: {
        5: '1.5rem',
        15: '5rem',
        25: '10rem',
        45: '12rem',
      },
      margin: {
        13: '3.5rem',
        15: '5rem',
        25: '10rem',
      },
      spacing: {
        15: '5rem',
      },
      width: {
        55: '13rem',
      },
    },
  },

  plugins: [
    require('@tailwindcss/forms'), // Retain the forms plugin
    require('flowbite/plugin'),
  ],
  safelist: [
    // Background colors
    'bg-peak-5',
    'bg-yellow-500',
    'bg-green-500',

    // Text colors
    'text-primary',

    // Width and percentage classes
    'w-full',
    'w-[70%]',

    // Padding and margin classes
    'p-5',
    'p-10',
    'py-4',
    'pl-12',
    'sm:pl-24',
    'md:pl-16',
    'lg:pl-20',

    // Text sizes
    'text-5xl',
    'text-sm',
    'text-lg',
    'text-2xl',
    'md:text-1xl',
    'text-xs',
    'md:text-base',

    // Grid and responsive grid classes
    'grid',
    'grid-cols-1',
    'md:grid-cols-2',

    // Other utility classes
    'items-center',
    'justify-between',
    'space-y-1',
    'object-cover',
    'font-raleway',
    'font-bold',
    'uppercase',
    'inline-flex',
    'rounded-md',
    'border-white/70',
    'shadow-md',

    // Polygon classes (if they are custom)
    'polygon-2',
  ],
};
