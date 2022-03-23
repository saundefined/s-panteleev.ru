---
extends: _layouts.post
section: content
title: Дженерики в PHP
date: 2022-03-25
description: Перевод серии статей о дженериках в PHP. Часть 1.
tags: [php, generics]
original:
  url: https://stitcher.io/blog/generics-in-php-1
  title: "Generics in PHP: The basics"
---

# Дженерики в PHP

Дженерики в PHP. Я хотел бы, чтобы они появились. И я знаю многих разработчиков, которые согласны со мной. С другой
стороны, есть группа PHP-программистов, возможно, даже большая, которые не знают, что такое дженерики и почему они
должны вообще об этом беспокоиться.

Давайте поговорим о том, что такое дженерики, почему PHP не поддерживает их и что, возможно, нас ждёт в будущем.

У каждого языка программирования есть определённая система типов. У некоторых языков очень строгая реализация, в то
время как у других — PHP относится к этой категории — более слабая.

Системы типов используются по разным причинам, самая очевидная из них — **проверка типов**.

Представим, что у нас есть функция, которая принимает два числа, два целых числа и выполняет некоторую математическую
операцию:

```php
<?php

function add($a, $b) 
{
    return $a + $b;
}
```

PHP с радостью разрешит вам передавать в эту функцию любые данные: числа, строки, логические значения — неважно. PHP изо
всех сил будет стараться преобразовать переменную, когда это имеет смысл, например, в случае сложения.

```php
<?php

add('1', '2'); // 3
```

Но эти преобразования — жонглирование типами — часто приводят к неожиданным результатам, если не сказать, что к ошибкам
и сбоям.

```php
<?php

add([], true); // ?
```

Можно добавить проверку, чтобы функция работала с любыми входными данными:

```php
<?php

function add($a, $b) 
{
    if (!is_int($a) || !is_int($b)) {
        return null;
    }
    
    return $a + $b;
}
```

Или можно использовать встроенные объявления типов PHP:

```php
<?php

function add(int $a, int $b): int 
{
    return $a + $b;
}
```

Многие разработчики в сообществе PHP не беспокоятся об объявлении типов, потому что знают, что должны передавать в эту
функцию только целые числа — в конце концов, они сами её написали.

Однако такие рассуждения быстро рассыпаются: зачастую вы не единственный, кто работает с этим кодом, вы также
используете код, который написали не сами — подумайте о том, сколько composer-пакетов вы используете. Поэтому, хотя этот
пример в отдельности может показаться не таким уж важным, проверка типов действительно пригодится, когда кодовая база
начнёт расти.

Кроме того, добавление объявления типов не только защищает от недопустимого состояния, но и **разъясняет**, какие
входные данные от нас, программистов, ожидаются. Часто с типами данных вам не нужно читать внешнюю документацию, потому
что многое из того, что делает функция, уже заключено в объявлении типов.

IDE активно помогают в работе: они могут сообщить программисту, какой тип входных данных ожидает функция или какие поля
и методы доступны для объекта, который принадлежит к определённому классу. С помощью IDE, написание кода становится
более продуктивным, во многом потому, что они могут статически анализировать объявления типов по всей нашей кодовой
базе.

С другой стороны, у систем типов свои ограничения. Простой пример — список элементов:

```php
<?php

class Collection extends ArrayObject
{
    public function offsetGet(mixed $key): mixed 
    { /* … */ }
    
    public function filter(Closure $fn): self 
    { /* … */ }
    
    public function map(Closure $fn): self 
    { /* … */ }
}
```

У коллекции множество методов, которые работают с любыми типами входных данных: цикл, фильтрация, сопоставление — что
угодно; коллекция не должна заботиться о том, имеет ли она дело со строками или целыми числами.

Но давайте посмотрим на это с точки зрения стороннего наблюдателя. Что произойдёт, если мы хотим быть уверены, что одна
коллекция содержит только строки, а другая — только объекты `User`. Коллекцию не волнует тип данных при переборе
элементов, но нас волнует. Мы хотим знать, является ли данный элемент в цикле пользователем или строкой — это большая
разница. Но без надлежащей информации о типах данных, IDE не сможет эффективно подсказывать нам во время работы.

```php
<?php

$users = new Collection();

// …

foreach ($users as $user) {
    $user-> // ?
}
```

Мы могли бы создать отдельные реализации для каждой коллекции: одна работает только со строками, а другая — только с
объектами `User`:

```php
<?php

class StringCollection extends Collection
{
    public function offsetGet(mixed $key): string 
    { /* … */ }
}

class UserCollection extends Collection
{
    public function offsetGet(mixed $key): User 
    { /* … */ }
}
```

Но что, если нам понадобится третья реализация? Четвёртая? Может быть, десять или двадцать. Управлять этим кодом станет
довольно мучительно.

Вот тут-то и приходят на помощь дженерики.

Чтобы внести ясность: в PHP нет дженериков. То, что я покажу дальше, невозможно в PHP, но это возможно во многих других
языках.

Вместо того чтобы создавать отдельную реализацию для каждого возможного типа, многие языки программирования позволяют
разработчикам определять "общий" тип классу коллекции:

```php
<?php

class Collection<Type> extends ArrayObject
{
    public function offsetGet(mixed $key): Type 
    { /* … */ }
    
    // …
}
```

По сути, мы говорим, что реализация класса коллекции будет работать для любого типа входных данных, но когда мы создаём
экземпляр коллекции, мы должны указать тип. Общая реализация конкретизируется в зависимости от потребностей
программиста:

```php
<?php

$users = new Collection<User>();

$slugs = new Collection<string>();
```

Это может показаться мелочью: добавить тип. Но один этот тип открывает целый мир возможностей.

Теперь IDE знает, какие данные находятся в коллекции, может подсказать нам многое: не добавляем ли мы элемент с
неправильным типом; что мы можем делать с элементами при итерации коллекции; передаём ли мы коллекцию в функцию, которая
знает, как работать с этими конкретными элементами.

И хотя технически мы могли бы добиться того же самого, вручную реализуя коллекцию каждого, необходимого нам типа, общая
реализация была бы значительным улучшением для нас с вами, разработчиков, которые пишут и поддерживают код.