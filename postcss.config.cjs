const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const purgecss = require('@fullhuman/postcss-purgecss');

const purgecssOptions = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/css/**/*.css',
        './node_modules/flowbite/**/*.js',
    ],
    safelist: [
        'xs', 'sm', 'md', 'lg', 'xl', '2xl', // Safelist your custom breakpoints
        'main', 'primary', 'secondary', 'complementary', // Safelist any color classes you may conditionally apply
        'textwhite', 'textblack', 'coolblue', // Example of text color classes to safelist
        /^tint_/, /^shade_/, // Safelisting classes based on patterns
        // Add more here if needed
    ],
    defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
};

module.exports = {
    plugins: [
        tailwindcss,
        autoprefixer,
        process.env.NODE_ENV === 'production' ? purgecss(purgecssOptions) : null,
    ].filter(Boolean), // This removes any null values
};
