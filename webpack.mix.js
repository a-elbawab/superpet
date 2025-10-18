const mix = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

require('laravel-mix-merge-manifest');


// Frontend Template
mix.js('resources/js/frontend/frontend.js', 'public/js').vue();
mix.sass('resources/sass/frontend/stylesheets/main.scss', 'public/css');

// Handle rtl
mix.webpackConfig({
  plugins: [
    new WebpackRTLPlugin({
      diffOnly: false,
      minify: true,
    }),
  ],
});

mix.version([
  'public/js/*',
  'public/css/*',
]);
