const mix = require('laravel-mix');

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
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
        'public/css/slick.min.css',
        'public/css/slick-theme.min.css',
        'public/css/simplePagination.css',
        /* 'public/css/fontawesome.min.css', */
        /* 'public/css/custom.css', */
    ],'public/css/style.css')
    .scripts([
        'public/js/analytics.js',
        'public/js/jquery.min.js',
        'public/js/bootstrap.bundle.min.js',
        'public/js/jquery.easing.min.js',
        'public/js/slick.min.js',
        'public/js/jquery.simplePagination.js',
        'public/js/osahan.min.js',
        'public/js/custom.js',
    ],'public/js/script.js');
