---
extends: _layouts.post
section: content
title: Доводы в пользу дженериков
date: 2022-04-08
description: Перевод серии статей о дженериках в PHP. Часть 4.
tags: [php, generics]
original:
  url: https://stitcher.io/blog/generics-in-php-4
  title: "Generics in PHP: The basics"
---

# Доводы в пользу дженериков

Я начал эту серию с того, что хочу не только научить вас, но и привести свои аргументы в пользу того, что я считаю
наиболее жизнеспособным и логичным путём добавление дженериков в PHP.

Решать вам, согласны вы с этим или нет. Итак, ваша честь, я хотел бы начать своё заключительное слово.

[Monomorphized Generics или Reified Generics](/post/generics-why-we-cant-have-them/) не будут добавлены.

По крайней мере, по словам Никиты, который провёл обширное исследование по этой теме. Оба варианта либо создают проблемы
с производительностью, либо просто требуют слишком большого объёма рефакторинга средства проверки типов PHP во время
выполнения, чтобы это можно было реализовать в разумные сроки.

Однако, если мы подумаем об истинной ценности дженериков, то она заключается не в проверке типов во время выполнения. К
тому времени, когда срабатывает средство проверки типов во время выполнения PHP и, возможно, выдаст ошибку типа, мы уже
выполняем наш код. Это приведёт к сбою нашей программы. И я никогда не слышал, чтобы пользователи моих программ
говорили: «О, это ошибка типа, всё в порядке». Нет. Программа дала сбой, и точка.

Проверка типов во время выполнения в PHP — это очень полезный инструмент отладки, я согласен, и в некоторых случаях он
необходим для жонглирования типами. Но большая часть ценности системы типов PHP исходит от статического анализа.

Поэтому, если мы хотим использовать дженерики в PHP, нам нужно поменять мышление:

Во-первых, разработчики должны использовать статический анализ. Ирония здесь в том, что разработчики, которым нужны
дженерики и которые понимают их ценность, также понимают ценность статической проверки типов. PHP-разработчикам, которым
наплевать на статический анализ, также не стоит беспокоиться о ценности дженериков. Потому что эти две вещи, дженерики и
статическая проверка типов просто не могут быть разделены.

Во-вторых, если внутренние разработчики PHP решат, что статически проверяемые дженерики должны быть добавлены в PHP,
следует задаться вопросом: оставить ли статический анализ в ведении сообщества, либо создать спецификацию, которой
должен следовать каждый статический анализатор, либо реализовав свою собственную статическую проверку типов.

Второй вариант был бы предпочтительнее, но вы можете себе представить, какой это будет труд. Я не думаю, что полагаться
на проверенные сторонние инструменты будет проблемой.

В-третьих, жонглирование типами было бы просто невозможно, по крайней мере, при использовании дженериков. Вам придётся
доверять вашей статической проверке типов. Это способ программирования, к которому PHP-разработчики на самом деле не
привыкли, но многие другие языки делают именно так и это прекрасно работает. Статическая проверка типов невероятно
мощная и точная. Я могу себе представить, что разработчикам PHP трудно понять мощь языков со статической типизацией, не
использовав их раньше. Стоит изучить такие языки, как Rust, Java или даже TypeScript, чтобы оценить мощь систем
статических типов. Или вы можете начать использовать один из сторонних статических анализаторов PHP: Psalm или PHPStan.

Подводя итог: если мы хотим, чтобы в PHP были дженерики, со всеми преимуществами, которые они приносят статическому
анализу, нам нужно принять тот факт, что дженерики, стираемые во время выполнения, являются единственным жизнеспособным
путём.

В заключение ещё несколько замечаний, на которые я хотел бы обратить внимание.

Во-первых, есть аргумент, всё, описываемое мной, уже возможно с помощью Docblock-аннотаций. Если вы вернётесь
ко [второй статье](/post/generics-in-depth/) этой серии, вы увидите, что я подробно объясняю различия, но позвольте мне
кратко подытожить:

- Docblock-аннотации не передают разработчикам ту же важность, как встроенный синтаксис, поэтому в PHP 8 появились
  атрибуты; встроенный синтаксис имеет большее значение, чем Docblock.

- Кроме того, нет официальной спецификации того, как должны выглядеть общие аннотации при использовании Docblock.
  Сегодня это большая проблема, поскольку у всех трёх основных статических анализаторов немного разные реализации.

Во-вторых, даже при стирании типов, мы всё ещё можем предоставлять информацию об общем типе с помощью Reflection API. Я
не говорю, что информация о типах должна полностью исчезать во время выполнения, моя главная проблема в том, что PHP не
должен проверять общие типы во время выполнения. Я не уверен, какое влияние окажет на ядро PHP доступность информации об
общих типах с помощью Reflection, поэтому я просто хочу сказать, что не против этой идеи.

И, наконец, есть, конечно, другое решение. Теоретически его может использовать каждый. Оно хорошо зарекомендовало себя в
прошлом: TypeScript. TypeScript пользуется огромной популярностью, и я думаю, что если есть место для подобного подхода
в серверных языках, то PHP, вероятно, является отличным кандидатом. Однако TypeScript не появился волшебным образом в
одночасье. Он был создан опытными разработчиками языка и это гораздо более глобальная задача, чем добавление дженериков,
игнорируемых временем выполнения, в PHP. Но кто знает, может быть, когда-нибудь.

Учитывая всё вышесказанное, я надеюсь, что вы нашли эту серию статей полезной и познавательной, я сказал о дженериках
всё, что хотел. Я буду признателен, если вы поделитесь этой серией со своими коллегами и подписчиками - я считаю, что
это важная тема, и хочу, чтобы ситуация изменилась.