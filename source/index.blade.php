---
title: Сергей Пантелеев
description: PHP-разработчик
image: /assets/images/cover/index.jpg
---
@extends('_layouts.master')

@section('header')
    @include('_components.page-header')
@endsection

@section('body')
    <div class="flex flex-wrap -m-4 mt-5">
        @foreach ($posts->take(3) as $post)
            @include('_components.post-preview')
        @endforeach
    </div>

    <div class="mt-5 text-center">
        <div class="text-center my-5">
            <a class="bg-transparent border-0 py-4 px-8 rounded hover:bg-gray-100 inline-block"
               href="{{ $page->baseUrl }}/posts/">Все статьи</a>
        </div>
    </div>
@stop
