<item>
    <title>{{ $entry->title }}</title>
    <link>{{ $entry->getUrl() }}</link>
    <guid isPermaLink="true">{{ $entry->getUrl() }}</guid>
    <author>{{ $entry->email }} (Сергей Пантелеев)</author>
    <description>{{ $entry->description }}</description>
    @foreach($entry->tags as $tag)
        <category>{{ $tag }}</category>
    @endforeach
</item>