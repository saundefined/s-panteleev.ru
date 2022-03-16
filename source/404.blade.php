---
title: Станица не найдена
permalink: 404.html
---
@extends('_layouts.master')

@section('body')
    <div class="container relative flex flex-col items-center justify-between py-16 overflow-hidden md:py-24">
        <div class="max-w-3xl mx-auto mb-6 text-center">
            <p class="font-bold xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-dark-purplish-blue">404</p>
            <p class="font-normal md:text-xl text-base text-gray-600 mt-4">Страница не найдена</p>
        </div>

        <div class="my-5">
            <a href="{{ $page->baseUrl }}"
               class="inline-flex items-center font-bold rounded-full focus:outline-none focus-visible:ring focus:ring-dark-purplish-blue focus:ring-opacity-20 focus-visible:ring-offset-2 transition-all ease-in-out duration-300 group px-8 py-3 text-base bg-dark-purplish-blue text-white border-2 border-dark-purplish-blue hover:bg-white hover:text-dark-purplish-blue">
                На главную страницу
            </a>
        </div>
    </div>
@endsection
