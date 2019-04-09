let path = require('path');
let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');

mix.js('resources/js/js.js', 'public/js');
mix.sass('resources/sass/scss.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [tailwindcss()],
   })
   .purgeCss({
      whitelist: ['svg-icon'],
   })
   .disableNotifications()
   .webpackConfig({
      resolve: {
         alias: {
            JS: path.resolve(__dirname, 'resources/js'),
            App: path.resolve(__dirname, 'resources/js/app'),
            Libraries: path.resolve(__dirname, 'resources/js/lib'),
            Models: path.resolve(__dirname, 'resources/js/models'),
            Config: path.resolve(__dirname, 'resources/js/config'),
            Components: path.resolve(__dirname, 'resources/js/components'),
            GeneralComponents: path.resolve(__dirname, 'resources/js/components/general'),
            LayoutComponents: path.resolve(__dirname, 'resources/js/components/layout'),
            Events: path.resolve(__dirname, 'resources/js/events'),
            Mixins: path.resolve(__dirname, 'resources/js/mixins'),
         }
      },
      devtool: 'inline-source-map',
   })
   .sourceMaps();