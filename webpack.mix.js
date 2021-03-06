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

mix.disableNotifications();

mix.browserSync({
    port: 3002,
    proxy: "192.168.10.10",
    open: false,
    notify: false,
});

if (!mix.inProduction()) {
    mix.webpackConfig({ devtool: "inline-source-map" }).sourceMaps();
}
mix.js("resources/Js/main.js", "public/js").version();
mix.sass("resources/sass/main.scss", "public/css").version();
