@extends('_layouts.master')

@section('body')
    <div class="w-1/2 mx-auto" itemid="{{ $page->getUrl() }}" itemscope itemtype="https://schema.org/BlogPosting">
        <h1 class="inline-block text-3xl font-bold text-gray-900" itemprop="headline">{{ $page->title }}</h1>
        <meta itemprop="datePublished" content="{{ \Carbon\Carbon::parse($page->date)->format('Y-m-d') }}">

        <div class="flex items-center justify-between py-5 my-5 border-b-2 border-gray-100 w-full">
            @if($author = $authors->get($page->author ?? 'sergey'))
                <div class="inline-flex items-center" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <img alt="{{ $author['name'] }}" src="{{ $page->baseUrl . $author['image'] }}"
                         class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center"
                         itemprop="image"
                    >
                    <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900" itemprop="name">{{ $author['name'] }}</span>
                        <span class="text-gray-400 text-xs mt-0.5">{{ $page->getDate() }}</span>
                    </span>
                </div>
            @endif
            <div class="">
                <div class="ya-share2" data-curtain data-shape="square" data-color-scheme="whiteblack"
                     data-services="vkontakte,facebook,telegram,twitter"></div>
            </div>
        </div>

        @if($original = $page->original)
            <div class="w-full text-white bg-gray-400 my-5">
                <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                    <div class="flex">
                        Перевод статьи «<a href="{{ $original['url'] }}" rel="noreferrer noopener" class="alert-link"
                                           target="_blank">{{ $original['title'] }}</a>»
                    </div>
                </div>
            </div>
        @endif

        <img class="img-fluid w-100 mb-2 rounded" src="{{ $page->baseUrl . $page->getImage() }}"
             alt="{{ $page->title }}"
             title="{{ $page->title }}" itemprop="image"/>

        <div class="prose mt-6" itemprop="articleBody">
            @yield('content')
        </div>

        <hr class="my-5"/>
        <div class="text-center">
            <a class="bg-transparent border-0 py-4 px-8 rounded hover:bg-gray-100" href="/posts/">К списку статей</a>
        </div>

        @include('_components.schema-org-publisher')
    </div>
@endsection

@push('scripts')
    <script src="https://yastatic.net/share2/share.js"></script>
@endpush