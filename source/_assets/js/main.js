import hljs from 'highlight.js/lib/core'
import Alpine from 'alpinejs'
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
import '@fortawesome/fontawesome-free/js/all.js'

window.Alpine = Alpine
Alpine.start()

hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'))
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'))
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'))
hljs.registerLanguage('javascript',
  require('highlight.js/lib/languages/javascript'))
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'))
hljs.registerLanguage('markdown',
  require('highlight.js/lib/languages/markdown'))
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'))
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'))
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'))

document.querySelectorAll('pre code').forEach((block) => {
  hljs.highlightBlock(block)
})

$(document).ready(function () {
  let ideaWidget = $('[data-idea-widget]')
  ideaWidget.each(function () {
    MarketplaceWidget.setupMarketplaceWidget('install',
      $(this).data('idea-widget'), '#' + $(this).attr('id'))
  })

  let owlCarousel = $('[data-owl-carousel]')
  owlCarousel.each(function () {
    $(this).owlCarousel({
      margin: 16,
      autoHeight: true,
      dots: false,
      nav: true,
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: $(this).data('items') ?? 3,
        },
      },
    })
  })
})