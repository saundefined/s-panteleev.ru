<div class="flex flex-wrap items-center border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden w-full">
    <div class="w-2/5">
        <a href="{{ $post->getUrl() }}">
            <img class="object-cover object-center h-full w-full" src="{{ $post->getImage() }}"
                 alt="{{ $post->title }}">
        </a>
    </div>
    <div class="p-4 flex flex-col flex-wrap w-3/5">
        <div class="title-font text-lg font-medium text-gray-900 mb-2">
            <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
        </div>
        @if($post->tags)
            @include('_components.post-tags')
        @endif
        <div class="leading-relaxed mb-4">{{ $post->description }}</div>

        @if($author = $authors->get($post->author ?? 'sergey'))
            <div class="inline-flex items-center pt-4 mt-4 border-t-2 border-gray-100 w-full">
                <img alt="{{ $author['name'] }}" src="{{ $author['image'] }}"
                     class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                    <span class="title-font font-medium text-gray-900">{{ $author['name'] }}</span>
                    <span class="text-gray-400 text-xs mt-0.5">{{ $post->getDate() }}</span>
                </span>
            </div>
        @endif
    </div>
</div>