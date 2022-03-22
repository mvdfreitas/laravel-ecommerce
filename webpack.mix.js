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
    .styles('resources/lib/bootstrap-4.2.1-dist/css/bootstrap.min.css','public/css/bootstrap.min.css')
    .styles('resources/lib/caroussel/carousel.css','public/css/carousel.css')
    .styles('resources/lib/bootstrap-ecommerce-uikit/css/ui.css','public/css/ui.css')
    .styles('resources/lib/bootstrap-ecommerce-uikit/css/responsive.css','public/css/responsive.css')

    .scripts('resources/lib/holder/holder.min.js', 'public/js/holder.min.js')
    .scripts('resources/lib/jquery3.3.1/jquery-3.3.1.min.js', 'public/js/jquery-3.3.1.min.js')
    .scripts('resources/lib/popper1.14.6/popper.min.js', 'public/js/popper.min.js')
    .scripts('resources/lib/bootstrap-4.2.1-dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')

    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
