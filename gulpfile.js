

var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

// Override elixir configuration
var config = elixir.config;

// Change your assets path
config.assetsPath = './src/resources/assets/';

elixir(function(mix) {
    mix.sass('app.scss', './src/public/css/app.css')
        .webpack('app.js', './src/public/css/app.js');
});