const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        backgroundColor: theme => ({
            ...theme('colors'),
            'primary': '#15202B',
        }),
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },


    plugins: [require('@tailwindcss/forms')],
    output: {
        chunkFilename: 'js/[name].js?id=[chunkhash]',
      }
};
