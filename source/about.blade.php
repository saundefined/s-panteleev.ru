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
            <p>Занимаюсь разработкой на PHP, большинство рабочих проектов на 1С-Битрикс,
                для pet-проектов использую Laravel.</p>

            <p>Также пишу на React (JS, Native, Redux), Vue.js, в свободное время изучаю Swift.</p>

            <h2>OSS</h2>

            <p>Последние несколько лет активно поддерживаю
                <a href="https://github.com/php/doc-ru" target="_blank"
                   rel="noreferrer noopener">русский перевод документации PHP</a> в актуальном состоянии.<br/>
                Помогаю с <a href="https://github.com/php/doc-en" target="_blank"
                             rel="noreferrer noopener">английской</a>,
                <a href="https://github.com/php/doc-de" target="_blank" rel="noreferrer noopener">немецкой</a> и
                <a href="https://github.com/php/doc-fr" target="_blank" rel="noreferrer noopener">французской</a>
                версиями.</p>

            <p>Один из переводчиков книги
                «<a href="https://symfony.com/doc/current/the-fast-track/ru/index.html"
                    target="_blank" rel="noreferrer noopener">Symfony 5. Быстрый старт</a>» на русский язык.</p>

            <p>Организатор сообщества <a href="https://github.com/beerphp/yaroslavl" target="_blank"
                                         rel="noreferrer noopener">BeerPHP Ярославль</a>.</p>

            <p>Развиваю плагин <a href="https://plugins.jetbrains.com/plugin/14703-bitrix-idea" target="_blank"
                                  rel="noreferrer noopener">Bitrix Idea</a> для PhpStorm.</p>

            <h2>Хобби</h2>

            <p>В свободное время люблю бегать, за плечами более 25 полумарафонов, 2 марафона и куча медалей.</p>
        </div>
    </div>
@stop