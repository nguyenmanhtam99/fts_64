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
    'jqueryUI': './public/bower/jquery-ui/jquery-ui.min.js',
    'jqueryUI_image': './public/bower/jquery-ui/themes/base/images/**',
    'font_awesome': './public/bower/font-awesome/fonts/**',
}

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            files.jquery,
            files.jqueryBootstrap,
            files.jqueryUI,
            'app.js',
        ], 'public/js/app.js')
        .copy(files.jqueryUI_image, 'public/css/images')
        .copy(files.font_awesome, 'public/fonts');
});
