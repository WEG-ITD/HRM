const mix = require('laravel-mix');
const path = require('path');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .disableNotifications();
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            '@': path.resolve(__dirname, 'resources/js/'),
            '@models': path.resolve(__dirname, 'resources/js/models/'),
            '@services': path.resolve(__dirname, 'resources/js/services/'),
            '@sections': path.resolve(__dirname, 'resources/js/sections/'),
            '@components': path.resolve(__dirname, 'resources/js/components/'),
        },
    },
})
