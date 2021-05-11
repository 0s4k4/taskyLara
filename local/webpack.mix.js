const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix secure_asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/secure_assets/js/app.js', 'public/js')
   .sass('resources/secure_assets/sass/app.scss', 'public/css');
