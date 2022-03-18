<div class="flex flex-col overflow-hidden bg-white shadow-3xl rounded-xl">
    <a aria-label="Boost your experience" href="{{ $post->getUrl() }}">
        <img class="object-cover w-full h-full h-64" style="object-position: 50% 50%"
             src="{{ $post->getImage() }}"
             alt="{{ $post->title }}">
    </a>
    <div class="flex flex-col justify-between h-full p-6">
        @if($post->tags)
            <div class="mb-3 space-x-3">
                @foreach($post->tags as $tag)
                    @include('_components.post-tag')
                @endforeach
            </div>
        @endif

        <a href="{{ $post->getUrl() }}" class="hover:no-underline transition-all text-dark-purplish-blue hover:text-blue-500">
            <p class="font-bold md:text-3xl text-xl">
                {{ $post->title }}
            </p>
        </a>

        <p class="font-normal text-base text-gray-600 mt-5">{{ $post->description }}</p>
    </div>
</div>