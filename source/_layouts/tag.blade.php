@extends('_layouts.master')

@section('body')
    <div class="relative py-16 overflow-hidden md:py-32">
        <p class="font-bold xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-dark-purplish-blue text-center">
            {{ $page->title }}
        </p>

        <p class="font-normal text-lg text-gray-600 mt-4 text-center">
            {{ $page->description }}
        </p>

        @if($page->posts($posts)->isNotEmpty())
            <div class="grid pt-12 flex-gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($page->posts($posts) as $post)
                    @include('_components.post-preview')
                @endforeach
            </div>
        @else
            <div class="mx-auto lg:w-3/5">
                <p class="font-normal text-lg text-gray-600 mt-4 text-center">
                    В этой подборке пока нет статей.
                </p>
            </div>
        @endif
    </div>
    </div>
@endsection