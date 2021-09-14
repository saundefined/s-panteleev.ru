---
extends: _layouts.post
section: content
title: Правообладатели в 1С-Битрикс
date: 2020-11-19
description: Страница «Правообладатели» в 1С-Битрикс. Зачем она нужна и как добавить свой компонент.
tags: [bitrix]
---

# Правообладатели

Начиная с версии `20.100.0` Главного модуля появилась страница «Правообладатели» (`/bitrix/admin/copyright.php`).

На ней перечислены лицензии используемых компонентов.

![](/assets/images/posts/bitrix-third-party-components/1.png)

## Добавление собственного компонента

Чтобы добавить свой компонент в список, необходимо зарегистрировать обработчик события:

```php
<?php 

use Bitrix\Main\EventManager;
use Bitrix\Main\EventResult;
use Bitrix\Main\UI\Copyright;

$eventManager = EventManager::getInstance();
$eventManager->addEventHandler(
    'main',
    'onGetThirdPartySoftware',
    function () {
        return new EventResult(
            EventResult::SUCCESS, [
                (new Copyright('Модуль интеграции с Тинькофф'))
                    ->setProductUrl('https://github.com/saundefined/tinkoff-sdk')
                    ->setCopyright("Copyright 2020, Sergey Panteleev")
                    ->setLicence(Copyright::LICENCE_MIT)
                    ->setLicenceUrl('https://github.com/saundefined/tinkoff-sdk/blob/master/LICENSE.md'),
    
                (new Copyright('Модуль СМС-сервисы'))
                    ->setProductUrl('https://github.com/qq-agency/ps.sms')
                    ->setCopyright("Copyright 2020, QQ")
                    ->setLicence(Copyright::LICENCE_MIT)
                    ->setLicenceUrl('https://github.com/qq-agency/ps.sms/blob/master/LICENSE.md'),
            ]
        );
    }
);
```

![](/assets/images/posts/bitrix-third-party-components/2.png)

## Допустимые лицензии

| Лицензия | Константа |
|:---------|:----|
| MIT | `Copyright::LICENCE_MIT` |
| Commercial | `Copyright::LICENCE_COMMERCIAL` |
| Public Domain | `Copyright::LICENCE_PUBLIC_DOMAIN` |
| 2-Clause BSD | `Copyright::LICENCE_BSD2` |
| 3-Clause BSD | `Copyright::LICENCE_BSD3` |
| Apache License, Version 2.0 | `Copyright::LICENCE_APACHE2` |
| W3C License | `Copyright::LICENCE_W3C` |
| General Public License, version 2 | `Copyright::LICENSE_GPLV2` |
| Пользовательская лицензия | `Copyright::LICENCE_CUSTOM` |