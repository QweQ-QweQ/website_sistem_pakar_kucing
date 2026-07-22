const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');

module.exports = {
    content: [
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#40B7FF',   // tombol utama
                secondary: '#90D5FF', // hover / border
                hover: '#4e9bca',
                bg: '#E0F3FF',        // background utama
                card: '#fcf9f9',     // card
                textmain: '#1F2933',  // teks utama
                textsoft: '#4B5563',  // teks sekunder
                success: '#4ADE80',
                warning: '#F59E0B',

            },
        },
    },
    plugins: [forms],
};
