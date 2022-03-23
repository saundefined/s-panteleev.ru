<?php

use Carbon\Carbon;

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
            'filter' => static function ($item) {
                return Carbon::parse($item->date)->lessThanOrEqualTo(Carbon::now());
            }
        ],
        'projects' => [
            'sort' => '-date',
            'path' => 'project/{filename}',
        ],
        'tags' => [
            'path' => '/posts/tag/{filename}',
            'posts' => static function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->tags && in_array($page->getFilename(), $post->tags, true);
                });
            },
        ],
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
];
