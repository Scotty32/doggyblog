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

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/scss/style.scss', 'public/css').options({
    processCssUrls: false
});
mix.sass('resources/scss/auth.scss', 'public/css').options({
    processCssUrls: false
});
mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('postcss-import'),
]);
mix.js('resources/js/admin.js', 'public/js');
mix.sass('resources/scss/admin.scss', 'public/css').options({
    processCssUrls: false
});
mix.js('resources/js/account.js', 'public/js');
mix.sass('resources/scss/account.scss', 'public/css').options({
    processCssUrls: false
});
mix.sass('resources/scss/chat.scss', 'public/css').options({
    processCssUrls: false
});
mix.js('resources/js/chat.js', 'public/js');
mix.browserSync('127.0.0.1:8000');