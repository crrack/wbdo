const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'light-blue': colors.lightBlue,
                'warm-gray': colors.warmGray,
                'blue-gray': colors.blueGray,
                cyan: colors.cyan,
            },
            extend: {
                fontFamily: {
                    sans: ['Nunito'],
                },
            },
        },
        screens: {
            'xs': '460px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px'
        },
    },
    
    variants: {},
    plugins: [require('@tailwindcss/line-clamp'), require('@tailwindcss/typography')],
}