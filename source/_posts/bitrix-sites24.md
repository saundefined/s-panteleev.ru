---
extends: _layouts.post
section: content
title: Сайты 24
date: 2019-06-03
description: Обзор Сайтов 24 от 1С-Битрикс
tags: [bitrix]
---

В 1С-Битрикс Управление Сайтом 18.0 стали доступны Сайты 24, добавленные изначально в облачный продукт — Битрикс24.

Сайты 24 позволяют без навыков программирования собирать страницу, как в конструкторе, заменяя текст, картинки и другую
информацию без опасения сломать сайт.

Так выглядит рабочая область созданного сайта.

![](/assets/images/posts/bitrix-sites24/1.png)

В данном примере мы будем использовать шаблон сайта, привычный любому разработчику 1С-Битрикс: Шапка + Подвал +
Рабочая область.

![](/assets/images/posts/bitrix-sites24/2.png)

Каждая область сайта — страница. Страницы в свою очередь состоят из Блоков.

Блоки можно использовать, как готовые, так и разработать самим.

Стандартных блоков довольно много, но бывают ситуации, когда их недостаточно и необходимо разрабатывать
пользовательские.

![](/assets/images/posts/bitrix-sites24/3.png)

Для этого в папке `/bitrix/blocks/<company_name>/` создайте папку блока `header`.

Структура Блока:

| Файл | Описание |
|----------|:-----|
| `preview.jpg` | Картинка, которая будет отображаться в списке блоков |
| `block.php` | Файл с вёрсткой блока |
| `.description.php    ` | Файл с описанием блока |
| `style.css` | Файл со стилями блока |
| `script.php` | Файл с подключением JS-библиотек |
| `/lang/ru/` | Директория с языковыми файлами |

![](/assets/images/posts/bitrix-sites24/4.png)

В `block.php` поместите обычный html-код:

```html

<div class="header wrapper">
    <div class="header__logo">
        <a href="#" class="logo__link">
            <span class="logo__name">Заголовок</span>
            <span class="logo__slogan">Подзаголовок</span>
        </a>
    </div>
    <div class="header__symbols">
        Логотипы
    </div>
    <div class="clear"></div>
</div>
```

Это наш будущий блок. Как видите, программирования тут нет 😃

В файле `.description.php` размечаются данные, какие можно редактировать, а какие — нет.

```php
<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

return [
    'block' => [
        'name' => Loc::getMessage('LANDING_TEST_SITE_HEADER'), // Название блока в lang-файле
        'section' => 'menu', // Раздел, в котором он будет отображаться
    ],
    'assets' => [
        'css' => [
            '/local/styles/header_block.css', // внешний css файл
        ],
    ],
    'nodes' => [
        '.logo__link' => [ // Блок с этим классом можно будет изменять
            'name' => 'Ссылка',
            'type' => 'link', // Тип блока
        ],
        '.logo__name' => [
            'name' => 'Заголовок',
            'type' => 'text',
        ],
        '.logo__slogan' => [
            'name' => 'Подзаголовок',
            'type' => 'text',
        ],
    ],
    'attrs' => [
        '.header__symbols' => [
            'name' => 'Скрывать логотипы?',
            'type' => 'checkbox',
            'attribute' => 'data-is-hidden', // Добавит к элементу data-is-hidden='["Y"]', при отмеченной галочке (такие элементы можно обрабатывать с помощью css и js)
            'items' => [
                ['name' => 'Скрывать логотипы?', 'value' => 'Y', 'checked' => true],
            ],
        ],
    ],
];
```

В итоге получается такая форма:

![](/assets/images/posts/bitrix-sites24/5.png)

Подробнее про параметры и структуру блока
смотрите [на сайте 1С-Битрикс](https://dev.1c-bitrix.ru/rest_help/landing/block/manifest.php).

Добавьте созданный блок на страницу:

![](/assets/images/posts/bitrix-sites24/6.png)

Теперь добавьте блок с меню. В файл `block.php` поместите вёрстку:

```html

<div class="nav">
    <div class="wrapper">
        <ul class="nav__list">
            <li class="nav__item">
                <a href="#" class="nav__link">Ссылка</a>
            </li>
            <li class="nav__item">
                <a href="#" class="nav__link">Ссылка</a>
            </li>
        </ul>
    </div>
</div>
```

Разметьте файл `.description.php`:

```php
<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

return [
    'block' => [
        'name' => 'Меню',
        'section' => 'menu',
    ],
    'assets' => [
        'css' => [
            '/local/styles/menu_block.css', // внешний css файл
        ],
    ],
    'cards' => [
        '.nav__item' => [ // Повторяющийся блок — карточка
            'name' => 'Пункт меню',
        ],
    ],
    'nodes' => [
        '.nav__link' => [ // Как и в шапке — блок, доступный для редактирования
            'name' => 'Ссылка',
            'type' => 'link',
        ],
    ],
    'style' => [
        'block' => [
            'type' => ['display'],
        ],
        'nodes' => [
            '.nav__link' => [
                'name' => 'Ссылка',
                'type' => 'typo', // К ссылке можно применять типографические стили (размер шрифта, межстрочный интервал и т.д.)
            ],
        ],
    ],
];
```

Добавьте блок на сайт и отредактируйте данные:

![](/assets/images/posts/bitrix-sites24/7.png)

Стили для ссылок задаются при просмотре блока на вкладке «Дизайн»:

![](/assets/images/posts/bitrix-sites24/8.png)

Таким образом, без навыков программирования, можно внедрить готовую вёрстку в Сайты 24 и создать полноценный сайт.