const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    darkMode: 'class', // media
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './src/**/*.{html,js}',
    ],
    daisyui: {
        themes: ["emerald", "business"],
    },
    theme: {
        screens: {
            xs: "574px",
            ...defaultTheme.screens,
        },
        fontFamily: {
            diatype: ['diatype-variable','sans'],
        },
        extend: {
            scrollbar: ['rounded']
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwind-scrollbar'),
        require("daisyui"),
    ],
};
