@extends('_layouts.master')

@section('body')
    <div class="container pb-16 md:pb-28">
        <div class="pt-8 md:pt-16 pb-4 md:pb-8">
            <h1 class="font-bold xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-dark-purplish-blue text-center">
                {{ $page->title }}
            </h1>

            <div class="flex flex-row items-center my-8 space-x-1 md:space-x-4 justify-center">
                @if($page->tags)
                    @foreach($page->tags as $tag)
                        @include('_components.post-tag')
                    @endforeach
                @endif

                <p class="font-normal text-base text-gray-600">{{ $page->getDate() }}</p>
            </div>
        </div>

        <div class="h-64 md:h-96 mb-8">
            <img class="object-contain w-full h-full bg-dark-purplish-blue"
                 style="object-position: 50% 50%"
                 src="{{ $page->getImage() }}"
                 alt="{{ $page->title }}">
        </div>

        <div class="max-w-4xl">
            @if($original = $page->original)
                <div class="w-full bg-gray-100 my-5 text-dark-purplish-blue">
                    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                        <div class="flex">
                            <span class="font-medium mr-1">Перевод статьи</span>
                            «<a href="{{ $original['url'] }}"
                                rel="noreferrer noopener"
                                class="display-inline border-b border-gray-300 hover:border-transparent transition-all"
                                target="_blank">{{ $original['title'] }}</a>»
                        </div>
                    </div>
                </div>
            @endif

            <div class="prose prose-lg text-gray-600 max-w-none mt-5">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://yastatic.net/share2/share.js"></script>
@endpush