var elixir = require('laravel-elixir');

elixir(function (mix) {
    /*
     |--------------------------------------------------------------------------
     | Sass
     */
    mix.sass('app.scss');

    /*
     |--------------------------------------------------------------------------
     | JavaScript
     */
    mix.scripts([
        './node_modules/jquery/dist/jquery.js',
        './node_modules/tether/dist/js/tether.js',
        './node_modules/bootstrap/dist/js/bootstrap.js',
    ], './public/js/dependencies.js');

    mix.scripts('app.js', './public/js/app.js');
});
