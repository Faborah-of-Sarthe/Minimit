const elixir = require('laravel-elixir');

require('laravel-elixir-image-optimize');

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

elixir(mix => {
    mix.sass('app.scss'),
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/sortablejs/Sortable.min.js',
        'resources/assets/js'
    ], 'public/js/app.js');
    //mix.imageOptimize('resources/assets/images','public/images');
});
