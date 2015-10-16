var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        '../../../node_modules/sweetalert/dist/sweetalert.min.js',
        '../../../node_modules/dropzone/dist/min/dropzone.min.js',
        'app.js'
    ], 'public/js/app.js');
});

