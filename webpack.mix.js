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
    .copy('resources/assets/public/js/vendor/jquery-2.2.4.min.js', 'public/js/vendor')
    .copy('resources/assets/public/js/vendor/bootstrap.min.js', 'public/js/vendor')
    .copy('resources/assets/public/js/jquery.ajaxchimp.min.js', 'public/js')
    .copy('resources/assets/public/js/jquery.nice-select.min.js', 'public/js')
    .copy('resources/assets/public/js/jquery.sticky.js', 'public/js')
    .copy('resources/assets/public/js/nouislider.min.js', 'public/js')
    .copy('resources/assets/public/js/jquery.magnific-popup.min.js', 'public/js')
    .copy('resources/assets/public/js/owl.carousel.min.js', 'public/js')
    .copy('resources/assets/public/js/gmaps.min.js', 'public/js')
    .copy('resources/assets/public/js/main.js', 'public/js')
    .copy('resources/assets/public/img', 'public/img')
    .copy('resources/assets/public/fonts', 'public/fonts')
    .copy('resources/assets/public/css/linearicons.css', 'public/css')
    .copy('resources/assets/public/css/owl.carousel.css', 'public/css')
    .copy('resources/assets/public/css/font-awesome.min.css', 'public/css')
    .copy('resources/assets/public/css/themify-icons.css', 'public/css')
    .copy('resources/assets/public/css/nice-select.css', 'public/css')
    .copy('resources/assets/public/css/nouislider.min.css', 'public/css')
    .copy('resources/assets/public/css/bootstrap.css', 'public/css')
    .copy('resources/assets/public/css/ion.rangeSlider.css', 'public/css')
    .copy('resources/assets/public/css/ion.rangeSlider.skinFlat.css', 'public/css')
    .copy('resources/assets/public/css/main.css', 'public/css')
    /* Admin files */
    .copy('resources/assets/admin/plugins/fontawesome-free', 'public/plugins/fontawesome-free')
    .copy('resources/assets/admin/dist/css/adminlte.min.css', 'public/dist/css/')
    .copy('resources/assets/admin/plugins/jquery/jquery.min.js', 'public/plugins/jquery')
    .copy('resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/plugins/bootstrap/js')
    .copy('resources/assets/admin/plugins/select2', 'public/plugins/select2')
    .copy('resources/assets/admin/plugins/summernote', 'public/plugins/summernote')
    .copy('resources/assets/admin/plugins/bs-custom-file-input', 'public/plugins/bs-custom-file-input')
    .copy('resources/assets/admin/dist/img', 'public/dist/img')
    .copy('resources/assets/admin/dist/js', 'public/dist/js')
