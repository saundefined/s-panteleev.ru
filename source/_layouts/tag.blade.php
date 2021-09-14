@extends('_layouts.master')

@section('header')
    @include('_components.page-header')
@endsection

@section('body')
    <div class="flex flex-wrap -m-4">
        @forelse ($page->posts($posts) as $post)
            @include('_components.post-preview')
        @empty
            <p>В подборке пока нет статей</p>
        @endforelse
    </div>
@endsection