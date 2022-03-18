---
title: Обо мне
---
@extends('_layouts.master')

@section('body')
    <div class="mx-auto flex my-16 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="{{ $page->siteName }}"
                 src="https://avatars.githubusercontent.com/u/4685504?v=4">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h3 class="font-bold md:text-3xl lg:text-4xl text-2xl text-dark-purplish-blue">Обо мне</h3>
            <span class="block w-14 h-1 bg-white mt-2 rounded"></span>
            <div class="font-normal text-lg text-gray-600">
                <p class="mt-3">Занимаюсь разработкой на PHP на 1С-Битрикс и Laravel.</p>
                <p class="mt-3">
                    Также пишу на React (JS, Native, Redux), Vue.js, в свободное время изучаю Swift и Go.
                </p>
            </div>
        </div>
    </div>

    <div class="relative overflow-hidden">
        <div class="my-16">
            <div class="flex flex-wrap">
                <div class="mb-10 md:mb-0 lg:w-4/12">
                    <h3 class="font-bold md:text-3xl lg:text-4xl text-2xl text-dark-purplish-blue">Проекты</h3>
                    <span class="block w-14 h-1 bg-dark-purplish-blue mt-2 rounded"></span>
                </div>
                <div class="lg:w-8/12">
                    <div class="grid flex-gap-10 md:grid-cols-2">
                        @foreach ($projects->take(6) as $project)
                            @include('_components.project-item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-16">
        <div class="container px-8 py-12 bg-dark-purplish-blue md:px-12 rounded-2xl">
            <div class="flex flex-col items-center md:flex-row justify-around">
                <div class="md:mr-auto">
                    <h3 class="font-bold md:text-3xl lg:text-4xl text-2xl text-white">Резюме</h3>
                    <span class="block w-14 h-1 bg-white mt-2 rounded"></span>
                </div>
                <div class="mt-12 md:mt-0">
                    <a href="https://docs.google.com/document/d/1R4ZXXmpq0mbTBb73RUxD8Iag7DRAksmECbav-aOsnIs/edit"
                       target="_blank" rel="noreferrer noopener"
                       class="inline-flex items-center font-bold rounded-full transition-all ease-in-out duration-300 group px-6 py-4 text-base text-dark-purplish-blue bg-white shadow-xs group border border-dark-purplish-blue hover:border-white hover:bg-dark-purplish-blue hover:text-white">
                        <span>Скачать</span>
                        <i class="ml-2 fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-hidden">
        <div class="my-16">
            <div class="flex flex-wrap">
                <div class="mb-10 md:mb-0 lg:w-4/12">
                    <h3 class="font-bold md:text-3xl lg:text-4xl text-2xl text-dark-purplish-blue">Open Source</h3>
                    <span class="block w-14 h-1 bg-dark-purplish-blue mt-2 rounded"></span>
                </div>
                <div class="lg:w-8/12">
                    <div class="grid flex-gap-10 md:grid-cols-2">
                        @include('_components.opensource-item', [
                            'title' => 'Документация по PHP',
                            'body' => 'Последние несколько лет активно поддерживаю <a href="https://github.com/php/doc-ru" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">русский перевод</a> документации по PHP в актуальном состоянии.<br/>
                                    Помогаю с <a href="https://github.com/php/doc-en" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">английской</a>, <a href="https://github.com/php/doc-de" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">немецкой</a> и <a href="https://github.com/php/doc-fr" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">французской</a> версиями.'
                        ])

                        @include('_components.opensource-item', [
                            'title' => 'Symfony 5. Быстрый старт',
                            'body' => 'Один из переводчиков книги «<a href="https://symfony.com/doc/current/the-fast-track/ru/index.html" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">Symfony 5. Быстрый старт</a>» на русский язык.'
                        ])

                        @include('_components.opensource-item', [
                            'title' => 'BeerPHP Ярославль',
                            'body' => 'Организатор сообщества <a href="https://github.com/beerphp/yaroslavl" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">BeerPHP Ярославль</a>.'
                        ])

                        @include('_components.opensource-item', [
                            'title' => 'Bitrix Idea',
                            'body' => 'Развиваю плагин <a href="https://plugins.jetbrains.com/plugin/14703-bitrix-idea" class="display-inline border-b border-gray-300 hover:border-transparent transition-all" target="_blank" rel="noreferrer noopener">Bitrix Idea</a> для PhpStorm.
                            <span id="install-bitrix-idea" data-idea-widget="14703" class="block mt-5"></span>'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-16">
        <div class="flex flex-wrap items-center justify-between">
            <div class="max-w-xl mx-auto lg:mr-auto lg:mx-0">
                <div class="py-8 pl-6 pr-6 space-y-5 bg-dark-purplish-blue md:pl-14 md:pr-10 md:py-10 rounded-2xl">
                    <h3 class="font-bold md:text-3xl lg:text-4xl text-2xl text-white">Контакты</h3>
                    <span class="block w-14 h-1 bg-white mt-2 rounded"></span>
                    <p class="font-normal text-base text-white">
                        Вы можете связаться со мной любым предложенным способом.
                    </p>
                </div>
            </div>
            <div class="max-w-md mx-auto mt-12 lg:mt-0">
                <div class="grid grid-cols-2 flex-gap-10 md:grid-cols-5">
                    @include('_components.social-item', [
                        'icon' => 'telegram',
                        'link' => 'https://t.me/saundefined'
                    ])

                    @include('_components.social-item', [
                        'icon' => 'vk',
                        'link' => 'https://vk.com/id261057243'
                    ])

                    @include('_components.social-item', [
                        'icon' => 'instagram',
                        'link' => 'https://www.instagram.com/saundefined/'
                    ])

                    @include('_components.social-item', [
                        'icon' => 'github',
                        'link' => 'https://github.com/saundefined'
                    ])

                    @include('_components.social-item', [
                        'icon' => 'twitter',
                        'link' => 'https://twitter.com/s_panteleev'
                    ])
                </div>
            </div>
        </div>
    </div>
@stop