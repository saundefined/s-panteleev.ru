---
title: Проекты
description: Переводы статей, обзоры функционала и примеры решений
pagination:
    collection: projects
    perPage: 12
---
@extends('_layouts.master')

@section('body')
    <div class="relative py-16 overflow-hidden md:py-32">
        <p class="font-bold xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-dark-purplish-blue text-center">
            {{ $page->title }}
        </p>

        <p class="font-normal text-lg text-gray-600 mt-4 text-center">
            {{ $page->description }}
        </p>

        <div class="grid pt-12 flex-gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($pagination->items as $post)
                @include('_components.post-preview')
            @endforeach

            @if ($pagination->pages->count() > 1)
                @include('_components.pagination')
            @endif
        </div>
    </div>
@stop

