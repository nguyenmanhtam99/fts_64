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

var files = {
    'jquery': './public/bower/jquery2/jquery.min.js',
    'jqueryBootstrap': './public/bower/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    'jqueryUi': './public/bower/jquery-ui/jquery-ui.min.js',
    'jqueryUiImage': './public/bower/jquery-ui/themes/base/images/**',
    'fontAwesome': './public/bower/font-awesome/fonts/**',
}

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            files.jquery,
            files.jqueryBootstrap,
            files.jqueryUi,
            'app.js',
        ], 'public/js/app.js')
        .copy(files.jqueryUiImage, 'public/css/images')
        .copy(files.fontAwesome, 'public/fonts');
});
