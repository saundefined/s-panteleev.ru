const mix = require('laravel-mix')
require('laravel-mix-jigsaw')

mix.disableSuccessNotifications()
mix.setPublicPath('source/assets/build')

mix.js('source/_assets/js/main.js', 'js')
  .autoload({
    jquery: [
      '$',
      'window.jQuery',
      'jQuery',
    ],
  })
  .sass('source/_assets/sass/main.scss', 'css/main.css')
  .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts',
    'source/assets/build/fonts')
  .jigsaw({
    watch: [
      'config.php',
      'source/**/*.md',
      'source/**/*.php',
      'source/**/*.scss'],
  })
  .options({
    processCssUrls: false,
    postCss: [
      require('tailwindcss'),
    ],
  })
  .sourceMaps()
  .version()
