---
extends: _layouts.post
section: content
title: AJAX-запросы в 1С-Битрикс
date: 2019-11-23
description: Как работать с AJAX-запросами в 1С-Битрикс
tags: [bitrix]
---

В версии `17.5.10` Главного модуля 1С-Битрикс появились нативные обработчики ajax-запросов у компонентов и модулей.

## Компоненты

Пример простого компонента формы обратной связи:

```php
<?php

namespace Ps\Components;

use Bitrix\Main\Context;

class Feedback extends \CBitrixComponent
{
    public function sendMessage($post)
    {
        // отправляем данные
    }

    public function executeComponent()
    {
        $this->sendMessage($this->request->getPostList()->toArray());

        $this->includeComponentTemplate();
    }
}
```

Чтобы вызвать метод `sendMessage` в AJAX-запросе, раньше необходимо было создать файл `/local/ajax/send-message.php` с содержимым:

```php
<?php

use Bitrix\Main\Context;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

\CBitrixComponent::includeComponentClass('ps:feedback');

$post = Context::getCurrent()->getRequest()->getPostList()->toArray();

$component = new \Ps\Components\Feedback();
$component->sendMessage($post);
```

И так для каждого запроса.

В обновлении, 1С-Битрикс добавили возможность обращаться к методам непосредственно из `javascript`. Для этого обновите класс компонента:

```php
<?php

namespace Ps\Components;

use Bitrix\Main\Engine\Contract\Controllerable;

class Feedback extends \CBitrixComponent implements Controllerable
{
    // Обязательный метод
    public function configureActions()
    {
       // Сброс фильтров по умолчанию (ActionFilter\Authentication и ActionFilter\HttpMethod)
       // Предустановленные фильтры находятся в папке /bitrix/modules/main/lib/engine/actionfilter/
        return [
            'sendMessage' => [ // Ajax-метод
                'prefilters' => [],
            ],
        ];
    }

    // Ajax-методы должны быть с постфиксом Action
    public function sendMessageAction($post)
    {
        // отправка данных
    }

    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}
```

Теперь необходимо вызвать метод:

```php
<script>
BX.ajax.runComponentAction('ps:feedback',
    'sendMessage', { // Вызывается без постфикса Action
      mode: 'class',
      data: {post: {name: 'Иван', message: 'Тестовое сообщение'}}, // ключи объекта data соответствуют параметрам метода
    })
    .then(function(response) {
      if (response.status === 'success') {
        // В случае успешного выполнения
      }
    });
</script>
```

В `configureActions` можно задать предпроверку данных, например, чтобы метод был доступен только для авторизованных пользователей или только `PUT`-запросом:

```php
public function configureActions()
{
    return [
        'sendMessage' => [
            'prefilters' => [
                new ActionFilter\Authentication,
                new ActionFilter\HttpMethod([
                    ActionFilter\HttpMethod::METHOD_PUT
                ])
            ],
        ],
    ];
}
```

Ответ на запрос всегда будет приходить в стандартизированном json-формате.

## Модули

Замечание

Данный функционал для партнёрских модулей, содержащих в названии точку (`ps.module`) доступен с версии `18.1.1` Главного модуля.

В модулях также дали возможность для AJAX-запросов к методам. В корне модуля создайте файл `.settings.php` со следующим содержимым:

```php
<?php

return [
    'controllers' => [
        'value' => [
            'namespaces' => [
                // Ключ - неймспейс для ajax-классов,
                // api - приставка экшенов, о ней мы поговорим чуть позже
                '\\Ps\\Module\\Controller' => 'api',
            ],
        ],
        'readonly' => true,
    ],
];
```

В папке `/lib/` добавьте папку `controller` и в ней разместите классы:

```php
<?php

namespace Ps\Module\Controller;

use Bitrix\Main\Engine\Controller;

class Updater extends Controller
{
    public function applyAction()
    {
        $request = $this->getRequest();

        return ['response' => 'success'];
    }
}
```

Чтобы обратиться к методу `applyAction`, вызовите функцию:

```php
// ps – префикс партнёра, отделяется двоеточием
// module – название модуля
// api – приставка из .settings.php
// updater.apply – название класса и метода без постфикса Action

BX.ajax.runAction('ps:module.api.updater.apply')
    .then(function() {
      // Код после выполнения экшена
    });
```

Таким образом, обращаться к методам модулей и компонентов с помощью AJAX-запросов стало намного проще.