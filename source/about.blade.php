---
title: Обо мне
image: /assets/images/cover/blog.jpg
---
@extends('_layouts.master')

@section('header')
    @include('_components.page-header')
@endsection

@section('body')
    <div class="w-1/2 mx-auto">
        <div class="prose">
            <p>Занимаюсь разработкой на PHP, большинство рабочих проектов выполняется на системе
                1С-Битрикс, в своих проектах предпочитаю использовать Laravel.</p>

            <p>Также пишу на React (JS, Native, Redux), Vue.js, в свободное время изучаю Swift.</p>

            <h2>OSS</h2>

            <p>Последние несколько лет активно поддерживаю <a href="https://github.com/php/doc-ru" target="_blank">русский
                    перевод документации PHP</a> в актуальном состоянии.</p>
            <p>Помогаю с <a href="https://github.com/php/doc-en" target="_blank">английской</a>,
                <a href="https://github.com/php/doc-de" target="_blank">немецкой</a> и
                <a href="https://github.com/php/doc-fr" target="_blank">французской</a> версиями.</p>

            <p>Один из переводчиков книги «<a href="https://symfony.com/doc/current/the-fast-track/ru/index.html"
                                              target="_blank">Symfony 5. Быстрый старт</a>» на русский язык.</p>

            <p>Организатор сообщества <a href="https://github.com/beerphp/yaroslavl" target="_blank">
                    BeerPHP Ярославль</a>.</p>

            <p>Развиваю плагин <a href="https://plugins.jetbrains.com/plugin/14703-bitrix-idea" target="_blank">
                    Bitrix Idea</a> для PhpStorm.</p>

            <h2>Хобби</h2>

            <p>Люблю бегать, за плечами более 25 полумарафона и 2 марафона.</p>
        </div>
    </div>
@stop