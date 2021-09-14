---
extends: _layouts.post
section: content
title: PHP 8.1 до и после
date: 2021-07-27
description: Перевод статьи об улучшениях в PHP 8.1
tags: [php, "PHP 8.1"]
original: 
    url: https://stitcher.io/blog/php-81-before-and-after
    title: "PHP 8.1: before and after"
---

[PHP 8.1](https://wiki.php.net/todo/php81) выйдет через несколько месяцев и я в восторге от множества нововведений!
Хочу поделиться реальным влиянием PHP 8.1 на мой собственный код.

## Перечисления

Долгожданный функционал, перечисления скоро будут доступны!

О них можно сказать не так много, кроме того, что я с нетерпением жду, когда мне больше не придётся использовать [spatie/enum](https://github.com/spatie/enum) или [myclabs/php-enum](https://github.com/myclabs/php-enum).
Спасибо за все годы поддержки этих enum-пакетов, но они будут первыми, от которых я откажусь, когда появится PHP 8.1 и когда я изменю это:

```php
/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
class StatusEnum extends Enum
{
}
```

На это:

```php
enum Status
{
    case draft;
    case published;
    case archived;
}
```

## Распаковка массивов со строковыми ключами

Может показаться незначительным, но меня это не раз беспокоило: до PHP 8.1 можно было распаковывать только массивы с числовыми ключами:

```php
$a = [1, 2, 3];
$b = [4, 5, 6];

// Доступно, начиная с PHP 7.4
$new = [...$a, ...$b];
```

В то время как массивы со строковыми ключами распаковать таким образом было нельзя:

```php
$a = ['a' => 1, 'b' => 2, 'c' => 3];
$b = ['d' => 4, 'e' => 5, 'f' => 6];

$new = [...$a, ...$b]; 

// В этом случае необходимо использовать array_merge
$new = array_merge($a, $b);
```

Итак, одна из особенностей PHP 8.1, которая облегчит мне жизнь, заключается в том, что теперь можно также распаковывать массивы со строковыми ключами!

## Свойства класса: инициализаторы и readonly

Ещё одно замечательное улучшение, которое я ждал годами: аргументы по умолчанию в параметрах функции. Представьте, что вы хотите установить класс состояния по умолчанию для объекта `BlogData`. До PHP 8.1 вам необходимо было объявить его допускающим значение `null` и установить в конструкторе:

```php
class BlogData
{
    public function __construct(
        public string $title,
        public ?BlogState $state = null,
    ) {
        $this->state ??= new Draft();
    }
}
```

PHP 8.1 позволяет вызов new непосредственно в определении функции. Это потрясающе:

```php
class BlogData
{
    public function __construct(
        public string $title,
        public BlogState $state = new Draft(),
    ) {
    }
}
```

Говоря о грандиозных нововведениях, я уже упоминал, что readonly-свойства теперь стали явью?!?

```php
class BlogData
{
    public function __construct(
        public readonly string $title,
        public readonly BlogState $state = new Draft(),
    ) {
    }
}
```

Да, кстати, не беспокойтесь о клонировании, [я о вас позаботился](https://stitcher.io/blog/cloning-readonly-properties-in-php-81).

## First-class callable

Как будто всего этого было недостаточно, теперь также доступен синтаксис First-class callable, который позволяет использовать более чистый код для создания замыканий из вызываемых объектов.

Раньше приходилось писать что-то вроде этого:

```php
$strlen = Closure::fromCallable('strlen');
$callback = Closure::fromCallable([$object, 'method']);
```

В PHP 8.1 вы можете написать… так:

```php
$strlen = strlen(...);
$callback = $object->method(...);
```

В PHP 8.1 есть ещё [много нового](https://stitcher.io/blog/new-in-php-81), но это то, что меня волнует больше всего.

