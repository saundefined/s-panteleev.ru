---
extends: _layouts.post
section: content
title: СМС-сервисы в 1С-Битрикс
date: 2019-12-30
description: Обзор СМС-сервисов в 1С-Битрикс, добавление собственного сервиса
tags: [bitrix]
---

Начиная с версии `18.5.0` в 1С-Битрикс добавлена поддержка штатной авторизации, регистрации и восстановления пароля с помощью СМС.

Из коробки на данный момент поддерживаются следующие сервисы: Компания SMS.RU, SMS-ассистент, Компания Twilio.com.

Если вы используете одну из этих компаний, обновите систему до необходимой версии,
установите модуль Служба сообщений, укажите данные для подключения к СМС-сервису в настройках **Главного модуля** и у вас должно появиться следующее:

![](/assets/images/posts/bitrix-sms/1.png)

## Добавление СМС-сервиса

Для добавления собственного СМС-сервиса, начала необходимо создать класс, который будет наследовать
`Bitrix\MessageService\Sender\Base`, с обязательными методами:

| Метод | Возвращаемое значение | Описание |
|----------|:-------------:|------|
| getShortName() | string | Сокращённое наименование сервиса (например, домен) |
| getId() | string | Символьный код сервиса |
| getName() | string | Полное наименование сервиса (будет выводиться во всех списках) |
| canUse() | boolean | Если `false` – сервис не будет выводиться |
| getFromList() | array | Список подтверждённых имён отправителя |
| sendMessage() | `Bitrix\MessageService\Sender\Result\SendMessage` | Реализация отправки сообщения |

Примерный код для добавления собственного СМС-сервиса:

```php
<?php

namespace Ps\Sms\Provider;

use Bitrix\Main\Error;
use Bitrix\MessageService\Sender\Base;
use Bitrix\MessageService\Sender\Result\SendMessage;

class MyService extends Base
{
    private $login;

    private $password;

    private $client;

    public function __construct() {
        $this->login = 'login';
        $this->password = 'my_strong_password';

        $this->client = new Api($this->login, $this->password);
    }

    public function sendMessage(array $messageFields) {
        if (!$this->canUse()) {
            $result = new SendMessage();
            $result->addError(new Error('Ошибка отправки. СМС-сервис отключён'));
            return $result;
        }

        $parameters = [
            'phones' => $messageFields['MESSAGE_TO'],
            'message' => $messageFields['MESSAGE_BODY'],
        ];

        if ($messageFields['MESSAGE_FROM']) {
            $parameters['sender'] = $messageFields['MESSAGE_FROM'];
        }

        $result = new SendMessage();
        $response = $this->client->send($parameters);

        if (!$response->isSuccess()) {
            $result->addErrors($response->getErrors());
            return $result;
        }

        return $result;
    }

    public function getShortName() {
        return 'smsc.ru';
    }

    public function getId() {
        return 'smscru';
    }

    public function getName() {
        return 'SMS-центр';
    }

    public function canUse() {
        return true;
    }

    public function getFromList() {
        $data = $this->client->getSenderList();
        if ($data->isSuccess()) {
            return $data->getData();
        }

        return [];
    }
}
```

Зарегистрируйте класс в качестве обработчика события:

```php
<?php

$event = \Bitrix\Main\EventManager::getInstance();
$event->addEventHandler('messageservice', 'onGetSmsSenders', 'registerSmscService');

function registerSmscService() {
    return [
        // Класс СМС-сервиса
        new Ps\Sms\Provider\MyService(),
    ];
}
```

В настройках **Главного модуля** появится новый СМС-сервис:

![](/assets/images/posts/bitrix-sms/2.png)

## API

### Отправка сообщения

Отправка сообщения с СМС кодом подтверждения регистрации:

```php
<?php

$userId = 1;
$phone = \Bitrix\Main\UserPhoneAuthTable::normalizePhoneNumber('+79999999999');

\Bitrix\Main\UserPhoneAuthTable::add([
    'USER_ID' => $userId,
    'PHONE_NUMBER' => $phone,
]);

list($code, $phoneNumber) = \CUser::GeneratePhoneCode($userId);

$sms = new \Bitrix\Main\Sms\Event(
    'SMS_USER_CONFIRM_NUMBER', // SMS_USER_RESTORE_PASSWORD - для восстановления
    [
        'USER_PHONE' => $phoneNumber,
        'CODE' => $code,
    ]
);
$sms->send(true);
```

### Подтверждение номера телефона

Подтверждение кода из СМС:

```php
<?php

$phoneRecord = \Bitrix\Main\UserPhoneAuthTable::getList([
    'filter' => [
        '=USER_ID' => 1
    ],
    'select' => ['USER_ID', 'PHONE_NUMBER', 'USER.ID', 'USER.ACTIVE'],
])->fetchObject();

if(!$phoneRecord) {
    // Ошибка. Пользователь не найден
}

$smsCode = 1111;

if(\CUser::VerifyPhoneCode($phoneRecord->getPhoneNumber(), $smsCode)) {
    if($phoneRecord->getUser()->getActive() && !$USER->IsAuthorized()) {
        $USER->Authorize($userId);
    }

    return true;
}
```

## Пример

Пример подключения СМС-сервисов sms16.ru, smsc.ru, mainsms.ru и некоторых других выложен на [GitHub](https://github.com/qq-agency/ps.sms).