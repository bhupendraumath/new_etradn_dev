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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .scripts([
      
        'resources/js/frontend/jquery-2.1.4.min.js',
        'resources/js/frontend/jquery-ui.js',
         'resources/js/frontend/bootstrap.js',
        'resources/js/frontend/easy-responsive-tabs.js',
        'resources/js/frontend/imagezoom.js',
        'resources/js/frontend/jquery.countup.js',
        'resources/js/frontend/jquery.easing.min.js',
        'resources/js/frontend/jquery.flexslider.js',
        'resources/js/frontend/jquery.waypoints.min.js',
        'resources/js/frontend/minicart.min.js',
        'resources/js/frontend/modernizr.custom.js',
        'resources/js/frontend/move-top.js',
        'resources/js/frontend/responsiveslides.min.js',

        'public/vendor/jsvalidation/js/jsvalidation.min.js',
        'resources/js/frontend/toastr.min.js',
        'resources/js/frontend/common.js',
    ], 'public/assets/js/frontend/main.js')
    .styles([
        'resources/css/frontend/bootstrap.css',
        'resources/css/frontend/style.css',
        'resources/css/frontend/jquery-ui.css',
        'resources/css/frontend/flexslider.css',
        'resources/css/frontend/font-awesome.css',
        'resources/css/frontend/toastr.min.css',
        'resources/css/frontend/team.css'

    ], 'public/assets/css/frontend/style.css');
