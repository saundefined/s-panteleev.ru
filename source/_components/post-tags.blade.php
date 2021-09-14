<div class="mt-2 mb-3">
    @foreach($post->tags as $tag)
        @if($item = $tags->get($tag))
            <a href="/posts/tag/{{ $tag }}"
               class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium">{{ $item['title'] }}</a>
        @else
            <span class="inline-block py-1 px-2 rounded bg-gray-100 text-gray-500 text-xs font-medium">{{ $tag }}</span>
        @endif
    @endforeach
</div>