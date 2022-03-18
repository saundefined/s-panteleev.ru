---
title: Сергей Пантелеев
description: PHP разработчик
---
@extends('_layouts.master')

@section('body')
    <div class="relative py-16 overflow-hidden md:py-32">
        <h2 class="font-bold xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-dark-purplish-blue text-center">
            Последние статьи
        </h2>

        <div class="grid pt-12 flex-gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($posts->take(3) as $post)
                @include('_components.post-preview')
            @endforeach
        </div>

        <div class="my-10 text-center">
            <a href="{{ $page->baseUrl }}/posts/"
               class="inline-flex items-center font-bold rounded-full focus:outline-none focus-visible:ring focus:ring-dark-purplish-blue focus:ring-opacity-20 focus-visible:ring-offset-2 transition-all ease-in-out duration-300 group px-8 py-3 text-base bg-dark-purplish-blue text-white border-2 border-dark-purplish-blue hover:bg-white hover:text-dark-purplish-blue">
                Все статьи
            </a>
        </div>
    </div>
@stop
