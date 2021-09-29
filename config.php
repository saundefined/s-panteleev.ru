<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Сергей Пантелеев',
    'siteDescription' => 'Заметки на полях',
    'email' => 'sergey@s-panteleev.ru',
    'collections' => [
        'posts' => [
            'sort' => '-date',
            'path' => 'post/{filename}',
        ],
        'tags' => [
            'path' => '/posts/tag/{filename}',
            'posts' => static function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->tags && in_array($page->getFilename(), $post->tags, true);
                });
            },
        ],
        'authors',
    ],
    'getDate' => static function ($post) {
        return Carbon::parse($post->date)
            ->translatedFormat('j F Y \г\.');
    },
    'getImage' => static function ($post) {
        return file_exists(__DIR__ . '/source/assets/images/posts/' . $post->getFilename() . '/cover.jpg') ?
            '/assets/images/posts/' . $post->getFilename() . '/cover.jpg' :
            '/assets/images/default/post-no-photo.jpg';
    },
    'selected' => static function ($page, $section) {
        return Str::contains($page->getPath(), $section) ? 'selected' : '';
    },
];
