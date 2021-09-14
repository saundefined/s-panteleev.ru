<div class="p-4 md:w-1/3">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <a href="{{ $post->getUrl() }}">
            <img class="w-full object-cover object-center" src="{{ $post->getImage() }}"
                 alt="{{ $post->title }}">
        </a>
        <div class="p-4">
            <div class="title-font text-lg font-medium text-gray-900 mb-2">
                <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
            </div>
            @if($post->tags)
                @include('_components.post-tags')
            @endif
            <div class="leading-relaxed mb-3">{{ $post->description }}</div>

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
</div>