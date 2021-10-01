<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
    @if(($original = $page->original) && $original['url'])
        <link rel="alternate" hreflang="en" href="{{ $original['url'] }}"/>
    @endif
    @if ($page->production)
    <!-- Yandex.Metrika counter -->
        <script type="text/javascript"> (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {(m[i].a = m[i].a || []).push(arguments);};
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a);
          })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');
          ym(50044507, 'init', {clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true}); </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/50044507" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript> <!-- /Yandex.Metrika counter -->
    @endif
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>
<body>

<main>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a href="{{ $page->baseUrl }}/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">{{ $page->siteName }}</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="{{ $page->baseUrl }}/" class="mr-5 hover:text-gray-900">Главная</a>
                <a href="{{ $page->baseUrl }}/posts/" class="mr-5 hover:text-gray-900">Статьи</a>
                <a href="{{ $page->baseUrl }}/about/" class="mr-5 hover:text-gray-900">Обо мне</a>
            </nav>
        </div>
    </header>

    @yield('header')

    <section class="text-gray-600 body-font">
        <div class="container px-5 my-5 mx-auto">
            @yield('body')
        </div>
    </section>
</main>

<footer class="body-font bg-gray-600">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <p class="text-sm text-white sm:ml-4 sm:py-2 sm:mt-0 mt-4">
            © {{ date('Y') }} {{ $page->siteName }}
        </p>
        <div class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            
        </div>
    </div>
</footer>

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>

@stack('scripts')
</body>
</html>
