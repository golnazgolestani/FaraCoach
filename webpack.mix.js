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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// mix.combine([
//     'public/dashboard/plugins/fontawesome-free/css/all.min.css',
//     'public/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
//     'public/dashboard/pizza_chart/css/adminlte.min.css',
//     'public/vendor/file-manager/css/file-manager.css',
//     'public/css/bootstrap-rtl.min.css',
//     'public/dashboard/pizza_chart/css/style.css',
//
// ],'public/css/app.css');

mix.combine([
    'public/dashboard/assets/js/core/jquery.min.js',
    'public/dashboard/assets/js/java.js',
    'public/vendor/file-manager/js/file-manager.js',
    'public/dashboard/assets/js/core/popper.min.js',
    'public/dashboard/assets/js/core/bootstrap.min.js',
    'public/dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js',
    'public/dashboard/plugins/jquery/jquery.min.js',
    'public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'public/dashboard/pizza_chart/js/adminlte.js',

],'public/js/app.js');

