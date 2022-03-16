<item turbo="true">
    <turbo:extendedHtml>true</turbo:extendedHtml>
    <extendedHtml></extendedHtml>
    <link>{{ $entry->getUrl() }}</link>
    <pubDate>{{ date('r', $entry->date) }}</pubDate>
    <author>Сергей Пантелеев</author>
    <turbo:content>
        <![CDATA[
        <header>
            <h1>{{ $entry->title }}</h1>
            <figure>
                <img src="{{ $entry->baseUrl . $entry->getImage() }}">
            </figure>
        </header>
        @includeFirst(['_posts.' . $entry->getFilename(), '_posts._tmp.' . $entry->getFilename()])
        ]]>
    </turbo:content>
</item>