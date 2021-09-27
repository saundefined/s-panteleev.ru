---
extends: _layouts.post
section: content
title: Гриды и фильтры в 1С-Битрикс
date: 2019-07-03
description: Как работать с гридами и фильтрами в 1С-Битрикс
tags: [bitrix]
---

Скорее всего, вы сталкивались с задачей вывести в публичной части (да и в административном разделе) проекта какую-либо служебную информацию для пользователей в табличном виде.
Наверняка, вы писали собственные шаблоны для компонентов и потом добавляли костыли для фильтрации и сортировки этих данных.

Начиная с версии `17.0.7` Главного модуля 1С-Битрикс вышли два компонента: `bitrix:main.ui.filter` и `bitrix:main.ui.grid` с классами `Bitrix\Main\UI\Filter` и `Bitrix\Main\Grid` (есть даже в редакции «Первый сайт»).

![](/assets/images/posts/bitrix-grid-filter/1.png)

## Гриды

За вывод грида отвечает компонент `bitrix:main.ui.grid`. Параметры:

| Параметр | Тип | Описание |
|----------|:----|:---------|
| GRID_ID | string | Идентификатор грида (такой же, как у фильтра) |
| COLUMNS | array | Массив с заголовками грида |
| ROWS | array | Массив с значениями грида, действиями в контекстном меню |
| SHOW_ROW_CHECKBOXES | bool | Показывать чекбоксы у строк для множественных действий |
| NAV_OBJECT | object | Объект для постраничной навигации |
| AJAX_MODE | string | Использовать ли ajax режим |
| AJAX_ID | string | Ajax ID Берётся из компонента фильтра |
| PAGE_SIZES | array | Массив для выпадающего списка с выбором кол-ва элементов на странице |
| AJAX_OPTION_JUMP | string |  |
| AJAX_OPTION_JUMP | string |  |
| SHOW_CHECK_ALL_CHECKBOXES | bool | Показывать "Выбрать все" |
| SHOW_ROW_ACTIONS_MENU | bool |  |
| SHOW_GRID_SETTINGS_MENU | bool |  |
| SHOW_NAVIGATION_PANEL | bool |  |
| SHOW_PAGINATION | bool |  |
| SHOW_SELECTED_COUNTER | bool | Показывать "Выбрано элементов" |
| SHOW_TOTAL_COUNTER | bool | Показывать "Всего элементов" |
| SHOW_PAGESIZE | bool | Выводить выпадающий список с выбором кол-ва элементов на странице |
| SHOW_ACTION_PANEL | bool |  |
| ALLOW_COLUMNS_SORT | bool |  |
| ALLOW_COLUMNS_RESIZE | bool |  |
| ALLOW_HORIZONTAL_SCROLL | bool | Будет доступен горизонтальный скролл |
| ALLOW_SORT | bool | Разрешить сортировку |
| ALLOW_PIN_HEADER | bool | Разрешать закреплять шапку грида |
| AJAX_OPTION_HISTORY | bool | |

Пример вызова компонента:

```php
<?php

$grid_options = new Bitrix\Main\Grid\Options('report_list');
$sort = $grid_options->GetSorting(['sort' => ['ID' => 'DESC'], 'vars' => ['by' => 'by', 'order' => 'order']]);
$nav_params = $grid_options->GetNavParams();

$nav = new Bitrix\Main\UI\PageNavigation('report_list');
$nav->allowAllRecords(true)
    ->setPageSize($nav_params['nPageSize'])
    ->initFromUri();

// Кнопка удалить
$onchange = new Onchange();
$onchange->addAction(
    [
        'ACTION' => Actions::CALLBACK,
        'CONFIRM' => true,
        'CONFIRM_APPLY_BUTTON'  => 'Подтвердить',
        'DATA' => [
            ['JS' => 'Grid.removeSelected()']
        ]
    ]
);

$APPLICATION->IncludeComponent('bitrix:main.ui.grid', '', [ 
    'GRID_ID' => 'report_list', 
    'COLUMNS' => [ 
        ['id' => 'ID', 'name' => 'ID', 'sort' => 'ID', 'default' => true], 
        ['id' => 'DATE', 'name' => 'Дата', 'sort' => 'DATE', 'default' => true], 
        ['id' => 'AMOUNT', 'name' => 'Сумма', 'sort' => 'AMOUNT', 'default' => true], 
        ['id' => 'PAYER_INN', 'name' => 'ИНН Плательщика', 'sort' => 'PAYER_INN', 'default' => true], 
        ['id' => 'PAYER_NAME', 'name' => 'Плательщик', 'sort' => 'PAYER_NAME', 'default' => true], 
        ['id' => 'IS_SPEND', 'name' => 'Тип операции', 'sort' => 'IS_SPEND', 'default' => true], 
    ], 
    'ROWS' => $list, //Самое интересное, опишем ниже
    'SHOW_ROW_CHECKBOXES' => true, 
    'NAV_OBJECT' => $nav, 
    'AJAX_MODE' => 'Y', 
    'AJAX_ID' => \CAjax::getComponentID('bitrix:main.ui.grid', '.default', ''), 
    'PAGE_SIZES' => [ 
        ['NAME' => "5", 'VALUE' => '5'], 
        ['NAME' => '10', 'VALUE' => '10'], 
        ['NAME' => '20', 'VALUE' => '20'], 
        ['NAME' => '50', 'VALUE' => '50'], 
        ['NAME' => '100', 'VALUE' => '100'] 
    ], 
    'AJAX_OPTION_JUMP'          => 'N', 
    'SHOW_CHECK_ALL_CHECKBOXES' => true, 
    'SHOW_ROW_ACTIONS_MENU'     => true, 
    'SHOW_GRID_SETTINGS_MENU'   => true, 
    'SHOW_NAVIGATION_PANEL'     => true, 
    'SHOW_PAGINATION'           => true, 
    'SHOW_SELECTED_COUNTER'     => true, 
    'SHOW_TOTAL_COUNTER'        => true, 
    'SHOW_PAGESIZE'             => true, 
    'SHOW_ACTION_PANEL'         => true, 
    'ACTION_PANEL'              => [ 
        'GROUPS' => [ 
            'TYPE' => [ 
                'ITEMS' => [ 
                    [ 
                        'ID'    => 'set-type', 
                        'TYPE'  => 'DROPDOWN', 
                        'ITEMS' => [ 
                            ['VALUE' => '', 'NAME' => '- Выбрать -'], 
                            ['VALUE' => 'plus', 'NAME' => 'Поступление'], 
                            ['VALUE' => 'minus', 'NAME' => 'Списание'] 
                        ] 
                    ], 
                    [ 
                        'ID'       => 'edit', 
                        'TYPE'     => 'BUTTON', 
                        'TEXT'        => 'Редактировать', 
                        'CLASS'        => 'icon edit', 
                        'ONCHANGE' => '' 
                    ], 
                    [
                        'ID'       => 'delete',
                        'TYPE'     => 'BUTTON',
                        'TEXT'     => 'Удалить',
                        'CLASS'    => 'icon remove',
                        'ONCHANGE' => $onchange->toArray()
                    ],
                ], 
            ] 
        ], 
    ], 
    'ALLOW_COLUMNS_SORT'        => true, 
    'ALLOW_COLUMNS_RESIZE'      => true, 
    'ALLOW_HORIZONTAL_SCROLL'   => true, 
    'ALLOW_SORT'                => true, 
    'ALLOW_PIN_HEADER'          => true, 
    'AJAX_OPTION_HISTORY'       => 'N' 
]);
```

Передаём данные в грид:

```php
<?php

$list = [
    [
        'data'    => [ //Данные ячеек
        "ID" => 1,
            "NAME" => "Название 1",
            "AMOUNT" => 1000,
            "PAYER_NAME" => "Плательщик 1"
        ],
        'actions' => [ //Действия над ними
            [
                'text'    => 'Редактировать',
                'onclick' => 'document.location.href="/accountant/reports/1/edit/"'
            ],
            [
                'text'    => 'Удалить',
                'onclick' => 'document.location.href="/accountant/reports/1/delete/"'
            ]

        ],
    ], [
        'data'    => [ //Данные ячеек
            "ID" => 2,
            "NAME" => "Название 2",
            "AMOUNT" => 3000,
            "PAYER_NAME" => "Плательщик 2"
        ],
        'actions' => [ //Действия над ними
            [
                'text'    => 'Редактировать',
                'onclick' => 'document.location.href="/accountant/reports/2/edit/"'
            ],
            [
                'text'    => 'Удалить',
                'onclick' => 'document.location.href="/accountant/reports/2/delete/"'
            ]
        ],
    ]
];
```

Результат вывода:

![](/assets/images/posts/bitrix-grid-filter/2.png)

Панель действий `ACTION_PANEL`:

![](/assets/images/posts/bitrix-grid-filter/3.png)

## Фильтр

За фильтрацию отвечает компонент `bitrix:main.ui.filter`. Его параметры:

| Параметр | Тип | Описание |
|----------|:----|:---------|
| FILTER_ID | string | Идентификатор фильтра (должен быть уникальным) |
| GRID_ID | string | Идентификатор грида к которому применяем фильтр |
| FILTER | array | Массив с полями для фильтрации |
| ENABLE_LABEL | bool | Показывать название полей или нет |
| ENABLE_LIVE_SEARCH | bool | Будет ли доступна live-фильтрация |

Пример вызова:

```php
<?php

$APPLICATION->IncludeComponent('bitrix:main.ui.filter', '', [ 
    'FILTER_ID' => 'report_list', 
    'GRID_ID' => 'report_list', 
    'FILTER' => [ 
        ['id' => 'DATE', 'name' => 'Дата', 'type' => 'date'], 
        ['id' => 'IS_SPEND', 'name' => 'Тип операции', 'type' => 'list', 'items' => ['' => 'Любой', 'P' => 'Поступление', 'M' => 'Списание'], 'params' => ['multiple' => 'Y']],
        ['id' => 'AMOUNT', 'name' => 'Сумма', 'type' => 'number'], 
        ['id' => 'PAYER_INN', 'name' => 'ИНН Плательщика', 'type' => 'number'], 
        ['id' => 'PAYER_NAME', 'name' => 'Плательщик'], 
    ], 
    'ENABLE_LIVE_SEARCH' => true, 
    'ENABLE_LABEL' => true 
]);
```

Результат:

![](/assets/images/posts/bitrix-grid-filter/4.png)

Также фильтры можно сохранять для быстрого использования:

![](/assets/images/posts/bitrix-grid-filter/5.png)

## Связка фильтра и грида

Чтобы пробросить данные из фильтра в грид, необходимо собрать фильтр:

```php
<?php

$filter = [];
$filterOption = new Bitrix\Main\UI\Filter\Options('report_list');
$filterData = $filterOption->getFilter([]);
foreach ($filterData as $k => $v) {
    $filter[$k] = $v;            
}
```

## Фильтрация любых данных

Связка Фильтр-Грид работает в 1С-Битрикс по умолчанию, но иногда хочется такую фильтрацию добавить к своим данным, например, к выводу графика:

![](/assets/images/posts/bitrix-grid-filter/6.png)

Для того, чтобы это заработало, необходимо «подписаться» на событие применения фильтра:

```html
<script type="text/javascript">
BX.addCustomEvent('BX.Main.Filter:apply', BX.delegate(function (command, params) { 
    var workarea = $('#' + command); // в command будет храниться GRID_ID из фильтра 

    $.post(window.location.href, function(data){ 
        workarea.html($(data).find('#' + command).html()); 
    }) 
}));
</script>
```

## Хаки

Почему-то 1С-Битрикс в своих компонентах автоматически не подцепляет css-файл со стилями кнопок (на момент написания статьи),
поэтому перед вызовом компонентов, рекомендуется добавить css-файл вручную:

```php
<?php

Bitrix\Main\Page\Asset::getInstance()->addCss('/bitrix/css/main/grid/webform-button.css');
```

Чтобы обновить грид без перезагрузки страницы, воспользуйтесь методом:

```html
<script type="text/javascript">
var reloadParams = { apply_filter: 'Y', clear_nav: 'Y' };
var gridObject = BX.Main.gridManager.getById('report_list'); // Идентификатор грида

if (gridObject.hasOwnProperty('instance')){
  gridObject.instance.reloadTable('POST', reloadParams);
}
</script>
```