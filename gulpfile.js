var elixir = require('laravel-elixir');

elixir(function (mix) {
    /*
     |--------------------------------------------------------------------------
     | Sass
     */
    mix.sass('themes/ip-blue/ip-blue.scss', './public/css/IP-Blue.css');

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

    /*
     |--------------------------------------------------------------------------
     | Versioning
     */
    mix.version([
        './public/css/ip-blue.css',
        './public/js/app.js',
        './public/js/dependencies.js',
    ]);
});
