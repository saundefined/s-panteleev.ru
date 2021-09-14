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
    @if($post = $posts->first())
        @include('_components.post-preview-featured')
    @endif

    <div class="flex flex-wrap -m-4 mt-5">
        @foreach ($posts->skip(1)->take(3) as $post)
            @include('_components.post-preview')
        @endforeach
    </div>
@stop
