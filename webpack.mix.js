const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/easy_background.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])
    .postCss('resources/css/style_login.css', 'public/css')
    .postCss('resources/css/style_reg.css', 'public/css')
    .postCss('resources/css/Login.css', 'public/css')
    .postCss('resources/css/Account-client.css', 'public/css')
    .postCss('resources/css/Account-realtor.css', 'public/css')
    .postCss('resources/css/Blog-Template.css', 'public/css')
    .postCss('resources/css/Buy.css', 'public/css')
    .postCss('resources/css/Main.css', 'public/css')
    .postCss('resources/css/Post-Template.css', 'public/css')
    .postCss('resources/css/Registration.css', 'public/css')
    .postCss('resources/css/Sell.css', 'public/css')
    .copy('resources/images', 'public/images')
    ;
