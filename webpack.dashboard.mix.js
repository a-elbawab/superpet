const mix = require('laravel-mix')
   WebpackRTLPlugin = require('webpack-rtl-plugin');

require('dotenv').config()

require('laravel-mix-merge-manifest');

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

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
   ;(glob.sync('resources/dashboard/' + query) || []).forEach(f => {
     f = f.replace(/[\\\/]+/g, '/')
     cb(f, f.replace('resources', 'public'))
   })
}

const sassOptions = {
   precision: 5,
   includePaths: ['node_modules', 'resources/dashboard/assets/']
}

// plugins Core stylesheets
mixAssetsDir('sass/base/plugins/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// pages Core stylesheets
mixAssetsDir('sass/base/pages/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

// Core stylesheets
mixAssetsDir('sass/base/core/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), {sassOptions})
)

mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest))
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/**/**/images', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/**/**/*.css', (src, dest) => mix.copy(src, dest))
mix.copyDirectory('resources/dashboard/images', 'public/images')

mix
  .js('resources/dashboard/js/core/app-menu.js', 'public/js/dashboard')
  .js('resources/dashboard/js/core/app.js', 'public/js/dashboard')
  .sass('resources/dashboard/sass/core.scss', 'public/css/dashboard', {sassOptions})
  .sass('resources/dashboard/sass/overrides.scss', 'public/css/dashboard', {sassOptions})
  .sass('resources/dashboard/assets/scss/style.scss', 'public/css/dashboard', {sassOptions})

mix.sass('resources/sass/vuexy/vuexy.scss', 'public/css')
    .js('resources/js/vuexy/vuexy.js', 'public/js')
    .vue()

mix.mergeManifest();

// Handle rtl
mix.webpackConfig({
   plugins: [
       new WebpackRTLPlugin({
           diffOnly: false,
           minify: true,
       }),
   ],
});
