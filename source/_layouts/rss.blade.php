<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<rss version="2.0">
    <channel>
        <title>{{ $page->siteName }}</title>
        <link>{{ $page->baseUrl }}</link>
        <description>{{ $page->siteDescription }}</description>
        <language>ru</language>
        @yield('entries')
    </channel>
</rss>