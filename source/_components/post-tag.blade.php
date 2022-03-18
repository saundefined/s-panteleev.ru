@if($item = $tags->get($tag))
    <a href="/posts/tag/{{ $tag }}"
       class="bg-dark-purplish-blue text-white px-2 py-1 rounded uppercase text-sm font-bold">{{ $item['title'] }}</a>
@else
    <span class="bg-gray-100 text-gray-500 px-2 py-1 rounded uppercase text-sm font-bold">{{ $tag }}</span>
@endif