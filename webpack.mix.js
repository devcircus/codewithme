let path = require('path');
let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');

mix.js('resources/js/js.js', 'public/js').webpackConfig({
   output: { chunkFilename: 'js/[name].[contenthash].js' },
});

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
            'vue$': 'vue/dist/vue.runtime.js',
            '@': path.resolve(__dirname, 'resources/js'),
            JS: path.resolve(__dirname, 'resources/js'),
            Utils: path.resolve(__dirname, 'resources/js/Utils'),
            Pages: path.resolve(__dirname, 'resources/js/Pages'),
            Shared: path.resolve(__dirname, 'resources/js/Shared'),
            Libraries: path.resolve(__dirname, 'resources/js/lib'),
            Models: path.resolve(__dirname, 'resources/js/models'),
            Config: path.resolve(__dirname, 'resources/js/config'),
            Events: path.resolve(__dirname, 'resources/js/events'),
            Mixins: path.resolve(__dirname, 'resources/js/mixins'),
         }
      },
      devtool: 'inline-source-map',
   })
   .sourceMaps()
   .version();