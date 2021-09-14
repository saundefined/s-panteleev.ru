---
title: Статьи
description: Переводы статей, обзоры функционала и примеры решений
image: /assets/images/cover/blog.jpg
pagination:
    collection: posts
    perPage: 12
---
@extends('_layouts.master')

@section('header')
    @include('_components.page-header')
@endsection

@section('body')
    <div class="flex flex-wrap -m-4">
        @foreach ($pagination->items as $post)
            @include('_components.post-preview')
        @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav>
            <ul class="pagination pagination-blog justify-content-center">
                @if ($previous = $pagination->previous)
                    <li class="page-item disabled">
                        <a class="page-link" href="{{ $previous }}"><span>«</span></a>
                    </li>
                @endif

                @foreach ($pagination->pages as $pageNumber => $path)
                    <li class="page-item{{ (int)$pagination->currentPage === (int)$pageNumber ? ' active' : '' }}">
                        <a class="page-link" href="{{ $path }}">{{ $pageNumber }}</a>
                    </li>
                @endforeach

                @if ($next = $pagination->next)
                    <li class="page-item">
                        <a class="page-link" href="{{ $next }}"><span>»</span></a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
@stop

