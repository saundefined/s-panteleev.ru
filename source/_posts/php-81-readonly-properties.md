---
extends: _layouts.post
section: content
title: Readonly-свойства в PHP 8.1
date: 2021-09-20
description: Перевод статьи про readonly-свойства, которые были добавлены в PHP 8.1
tags: [php, "PHP 8.1"]
original:
    url: https://stitcher.io/blog/php-81-readonly-properties
    title: "PHP 8.1: readonly properties"
---

Написание <acronym title="Объект передачи данных">DTO</acronym> и <acronym title="Объект-значение">VO</acronym> на PHP с
годами стало значительно проще. Взгляните, например, на DTO в PHP 5.6:

```php
class BlogData
{
    /** @var string */
    private $title;

    /** @var Status */
    private $status;

    /** @var \DateTimeImmutable|null */
    private $publishedAt;

    /**
     * @param string $title
     * @param Status $status
     * @param \DateTimeImmutable|null $publishedAt
     */
    public function __construct(
        $title,
        $status,
        $publishedAt = null
    ) {
        $this->title = $title;
        $this->status = $status;
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
}
```

И сравните с аналогом в PHP 8.0:

```php
class BlogData
{
    public function __construct(
        private string $title,
        private Status $status,
        private ?DateTimeImmutable $publishedAt = null,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }
}
```

Видна огромная разница, хотя я думаю, что есть ещё одна большая проблема: все эти методы чтения. Лично я их больше не
использую, начиная с PHP 8.0, в котором добавили определение свойств в конструкторе. Я предпочитаю использовать
общедоступные свойства вместо написания методов чтения:

```php
class BlogData
{
    public function __construct(
        public string $title,
        public Status $status,
        public ?DateTimeImmutable $publishedAt = null,
    ) {
    }
}
```

Однако объектно-ориентированным пуристам такой подход не нравится: внутренний статус объекта не должен быть раскрыт
напрямую и определённо не может быть изменён извне.

В наших проектах в Spatie есть внутреннее руководство по написанию кода, согласно которому DTO и VO с общедоступными
свойствами не должны изменяться извне. Подход, который, кажется, работает вполне неплохо, мы используем его уже довольно
давно, не сталкиваясь с какими-либо проблемами.

Однако да, я согласен с тем, что было бы лучше, если бы язык гарантировал, что общедоступные свойства вообще не могут
быть переопределены. Что ж, в PHP 8.1 решили эту проблему, добавив ключевое слово `readonly`:

```php
class BlogData
{
    public function __construct(
        public readonly string $title,
        public readonly Status $status,
        public readonly ?DateTimeImmutable $publishedAt = null,
    ) {
    }
}
```

Как и предполагает его название, смысл ключевого слова в том, что после того, как свойство установлено, его больше
нельзя переопределить:

```php
$blog = new BlogData(
    title: 'PHP 8.1: readonly-свойства',
    status: Status::PUBLISHED,
    publishedAt: now()
);

$blog->title = 'Какой-то другой заголовок'; // Ошибка: Нельзя переопределить readonly-свойство BlogData::$title
```

Знание, что когда объект инициализирован, он больше не будет меняться, даёт нам определённый уровень уверенности и
спокойствия при написании кода: целый ряд непредвиденных изменений данных просто не может произойти.

Конечно, по-прежнему нужна возможность клонировать объект и, возможно, изменять некоторые свойства в процессе. Далее мы
обсудим, как это сделать с readonly-свойствами. Для начала, давайте рассмотрим их подробнее.

## Только типизированные свойства

Readonly-свойства могут быть только типизированными:

```php
class BlogData
{
    public readonly string $title;
    
    public readonly $mixed; // Ошибка: Нельзя использовать не типизированное readonly-свойство
}
```

Однако вы можете использовать тип `mixed` для указания типа:

```php
class BlogData
{
    public readonly string $title;
    
    public readonly mixed $mixed;
}
```

Причина этого ограничения заключается в том, что, опуская тип свойства, PHP автоматически устанавливает значение `null`,
если в конструкторе не было определено явное значение. Такое поведение в сочетании с readonly-свойством вызовет ненужную
путаницу.

## Обычные объекты и объекты с определением свойств в конструкторе

Вы уже видели примеры и того и другого: `readonly` можно добавить как к обычному, так и к свойству, определяемому в
конструкторе:

```php
class BlogData
{
    public readonly string $title;
    
    public function __construct(
        public readonly Status $status, 
    ) {}
}
```

## Нет значения по умолчанию

У readonly-свойств не может быть значения по умолчанию:

```php
class BlogData
{
    public readonly string $title = 'Readonly-свойства'; // Ошибка: Нельзя использовать значение по умолчанию
}
```

Точнее, если это не свойство, определяемое в конструкторе:

```php
class BlogData
{
    public function __construct(
        public readonly string $title = 'Readonly-свойства', 
    ) {}
}
```

Причина, по которой это разрешено для свойств, определяемых в конструкторе, заключается в том, что значение по умолчанию
в этом случае используется не в качестве значения по умолчанию для свойства класса, а только для аргумента конструктора.
Под капотом приведённый выше код будет преобразован в этот:

```php
class BlogData
{
    public readonly string $title;
    
    public function __construct(
        string $title = 'Readonly-свойства', 
    ) {
        $this->title = $title;
    }
}
```

Посмотрите, как фактическому свойству не присваивается значение по умолчанию. Причина запрета использования значений по
умолчанию для readonly-свойств, заключается в том, что в таком виде они ничем не будут отличаться от констант.

## Наследование

Нельзя изменять флаг `readonly` при наследовании:

```php
class Foo
{
    public readonly int $prop;
}

class Bar extends Foo
{
    public int $prop; // Ошибка: Нельзя изменять флаг readonly
}
```

Правило действует в обоих направлениях: вам не разрешено добавлять или удалять флаг `readonly` при наследовании.

## Unset не допускается

После того как readonly-свойство установлено, вы не можете его изменить и даже сбросить:

```php
$foo = new Foo('value');

unset($foo->prop); // Ошибка: Нельзя сбросить readonly-свойство
```

## Reflection

Добавлен новый метод `ReflectionProperty::isReadOnly()`, а также флаг `ReflectionProperty::IS_READONLY`.

## Клонирование

Итак, если нельзя изменить readonly-свойства, и, если нельзя их сбросить, каким образом можно создать копию своих DTO
или VO и изменить какие-то данные? Также нельзя использовать `clone`, потому что вы не сможете перезаписать их значения.

На самом деле есть идея добавить в будущем конструкцию `clone with`, которая допускает такое поведение, но сейчас
проблема не решена.

Что ж, можно клонировать объекты с изменёнными readonly-свойствами, если полагаться на магию Reflection. Создавая объект
без вызова его конструктора (что возможно с помощью Reflection), а затем вручную копируя каждое свойство, иногда
перезаписывая значение, вы фактически можете «клонировать» объект и изменить его readonly-свойства.

Для этого я разработал [небольшой пакет](https://github.com/spatie/php-cloneable), вот как он выглядит:

```php
class BlogData
{
    use Cloneable;

    public function __construct(
        public readonly string $title,
    ) {}
}

$dataA = new BlogData('Title');

$dataB = $dataA->with(title: 'Another title');
```

Также я написал [специальный пост](https://stitcher.io/blog/cloning-readonly-properties-in-php-81) в блоге, объясняющий
всю механику.

Вот и всё, что можно сказать о readonly-свойствах. Я думаю, что это отличная возможность, при работе над проектами со
множеством DTO и VO и требующими от вас тщательного управления потоком данных во всем коде. Неизменяемые объекты с
readonly-свойствами очень в этом помогут.