import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'sans-serif'],
            },
            colors: {
                "dark": "#7d5a50",
                "darker": "#5e4139",
                "light": "#e6dfd7",
                "light2": "#fdf6f0"
            }
        },
    },
    plugins: [forms],
};
