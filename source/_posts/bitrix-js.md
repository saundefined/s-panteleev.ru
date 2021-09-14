---
extends: _layouts.post
section: content
title: 1С-Битрикс JS
date: 2019-07-10
description: Разбор штатных JS-библиотека 1С-Битрикс
tags: [bitrix]
---

Практически в каждом проекте требуются различные JS-библиотеки: от слайдеров и всплывающих окон, до сложных графиков.

Часто принимается решение использовать сторонние решения, но под капотом 1С-Битрикс припасено множество полезных функций.

## amCharts

Проприетарная библиотека для построения различных графиков, лицензия на которую включена 1С-Битрикс любой редакции. Ознакомиться с видами графиков и кодом для построения можно на странице с [примерами](https://www.amcharts.com/demos/).

Подключение библиотеки amCharts в 1С-Битрикс осуществляется стандартным способом: `CJSCore::Init(['amcharts']);`

Подключать библиотеку необходимо в зависимости от типа графика:

| Параметр | Описание |
|----------|:---------|
| `amcharts` | Базовая библиотека |
| `amcharts_funnel` | Воронка, пирамида Маслоу |
| `amcharts_gauge` | Диаграмма в виде спидометра |
| `amcharts_pie` | Круговая диаграмма |
| `amcharts_serial` | Обычные графики |
| `amcharts_radar` | Радарная диаграмма |
| `amcharts_xy` | График XY |

![](/assets/images/posts/bitrix-js/1.png)

## MaskedInput

В 1С-Битриксе есть библиотека для указания масок ввода – `masked_input`, которая вполне может стать альтернативой `jquery.maskedinput`.

```php
<?php

CJSCore::Init(['masked_input']);
?>

<input type="text" id="phone" placeholder="Укажите ваш телефон" />

<script>
    BX.ready(function() {
        var result = new BX.MaskedInput({
            mask: '+7 999 999 99 99', // устанавливаем маску
            input: BX('phone'),
            placeholder: '_' // символ замены +7 ___ ___ __ __
        });

        result.setValue('9000000000'); // устанавливаем значение
    });
</script>
```

## PhoneNumber

Хотя для масок телефонного номера лучше использовать другую библиотеку — `phone_number`.

```php
<?php

CJSCore::Init(['phone_number']);
?>

<span id="flag"></span>
<input type="text" id="number" placeholder="Укажите ваш телефон" />

<script>
    BX.ready(function() {
        new BX.PhoneNumber.Input({
            node: BX('number'),
            forceLeadingPlus: false, // принудительно установить +
            flagNode: BX('flag'), //
            flagSize: 16, // Размер флага [16, 24, 32]
            defaultCountry: 'ru', // Страна по-умолчанию
            onChange: function(e) {
              // вызывается при изменении значения
            }
        });
    });
</script>
```

![](/assets/images/posts/bitrix-js/2.png)

## PopupWindowManager

Всплывающие окна в 1С-Битрикс можно организовать с помощью `BX.PopupWindowManager`. Данная библиотека подходит, как для диалоговых окон, так и полноценных всплывающих страниц:

```php
<?php

CJSCore::Init(['popup']);
?>

<script>
    // BX.element - элемент, к которому будет привязано окно, если null – окно появится по центру экрана

    BX.ready(function () {
        var popup = BX.PopupWindowManager.create("popup-message", BX('element'), {
            content: 'Контент, отображаемый в теле окна',
            width: 400, // ширина окна
            height: 100, // высота окна
            zIndex: 100, // z-index
            closeIcon: {
                // объект со стилями для иконки закрытия, при null - иконки не будет
                opacity: 1
            },
            titleBar: 'Заголовок окна',
            closeByEsc: true, // закрытие окна по esc
            darkMode: false, // окно будет светлым или темным
            autoHide: false, // закрытие при клике вне окна
            draggable: true, // можно двигать или нет
            resizable: true, // можно ресайзить
            min_height: 100, // минимальная высота окна
            min_width: 100, // минимальная ширина окна
            lightShadow: true, // использовать светлую тень у окна
            angle: true, // появится уголок
            overlay: {
                // объект со стилями фона
                backgroundColor: 'black',
                opacity: 500
            }, 
            buttons: [
                new BX.PopupWindowButton({
                    text: 'Сохранить', // текст кнопки
                    id: 'save-btn', // идентификатор
                    className: 'ui-btn ui-btn-success', // доп. классы
                    events: {
                      click: function() {
                          // Событие при клике на кнопку
                      }
                    }
                }),
                new BX.PopupWindowButton({
                    text: 'Копировать',
                    id: 'copy-btn',
                    className: 'ui-btn ui-btn-primary',
                    events: {
                      click: function() {

                      }
                    }
                })
            ],
            events: {
               onPopupShow: function() {
                  // Событие при показе окна
               },
               onPopupClose: function() {
                  // Событие при закрытии окна                
               }
            }
        });

        popup.show();
    });
</script>
```

![](/assets/images/posts/bitrix-js/3.png)

## PopupMenu

Выпадающие меню и списки в стиле Битрикс24 можно сделать с помощью `PopupMenu`:

```php
<?php

CJSCore::Init(['popup']);
?>

<div style="background: red; width: 100px; height: 40px; margin-left: 500px" id="element"></div>

<script>
    BX.ready(function () {
        BX.bind(BX('element'), 'click', function () {
            BX.PopupMenu.show('demo-popup-menu', BX('element'), [
                {
                    text: 'Обычный пункт', // Название пункта
                    href: '#', // Ссылка
                    className: 'menu-popup-item menu-popup-no-icon', // Дополнительные классы
                    onclick: function(e, item){
                       BX.PreventDefault(e);
                       // Событие при клике на пункт
                    }
                },
                {
                    text: 'Выбранный пункт',
                    href: '#',
                    className: 'menu-popup-item menu-popup-item-accept'
                }
            ], {
              autoHide : true, // Закрытие меню при клике вне меню
              offsetTop: 0, // смещение от элемента по Y
              zIndex: 10000, // z-index
              offsetLeft: 100,  // смещение от элемента по X
              angle: { offset: 45 }, // Описание уголка, при null – уголка не будет
              events: {
                 onPopupShow: function() {
                    // Событие при показе меню          
                 },
                 onPopupClose : function(){
                    // Событие при закрытии меню
                 },
                 onPopupClose : function(){
                    // Событие при уничтожении объекта меню
                 }
              }
            });
        });
    });
</script>
```

![](/assets/images/posts/bitrix-js/4.png)

## SpotLight

Если необходимо привлечь внимание пользователя к элементу (например, инструкция по оформлению брони для новых менеджеров, или нужно уведомить о новом функционале) – с этим справится `SpotLight`.

```php
<?php

CJSCore::Init(['spotlight']);
?>

<div style="background: red; width: 100px; height: 40px; margin-left: 500px" id="element"></div>

<script>
    BX.ready(function () {
        var obj = new BX.SpotLight({
            renderTo: BX('element'), // Привязать к элементу
            top: 0, // позиционирование относительно элемента
            left: 0, // позиционирование относительно элемента
            content: '1. Сначала нажмите на эту кнопку',
            lightMode: false, // Темный режим или светлый
            observerTimeout: 10000, // Таймаут автопоказа
            events: {
                onPopupShow: function() {
                  // Событие при показе подсказки
                }
            }

        });

        obj.show();
    });
</script>
```

![](/assets/images/posts/bitrix-js/5.png)

## ColorPicker

Если необходимо выбрать цвет на сайте – для этого есть `ColorPicker`.

```php
<?php

CJSCore::Init(['color_picker']);
?>

<input type="text" id="example" />

<script>
  BX.ready(function() {
    var element = BX('example');

    BX.bind(element, 'focus', function () {
        new BX.ColorPicker({
            bindElement: element, // Элемент, к которому будет прикреплена область с выбором цвета
            defaultColor: '#FF6600', // Цвет по-умолчанию
            allowCustomColor: true, // Разрешить указывать произвольный цвет
            onColorSelected: function (item) {
                element.value = item // Вызывается при выборе цвета
            },
            popupOptions: {
                angle: true, // треугольник
                autoHide: true, // Закрытие по клику вне области
                closeByEsc: true, // Закрытие по esc
                events: {
                    onPopupClose: function () {
                        // Вызывается при закрытии окна
                    }
                }
            }
        }).open();
    })
  }
</script>
```

![](/assets/images/posts/bitrix-js/6.png)

## Списки

Чтобы сделать красивые выпадающие списки в стиле Битрикс24, необходимо правильно разметить html-вёрстку:

```php
<?php
CJSCore::Init(['ui']);

$items = [
    ['NAME' => 'Первый вариант', 'VALUE' => '1'],
    ['NAME' => 'Второй вариант', 'VALUE' => '2'],
];
?>

<div style="padding: 100px" id="filter">
    <div data-name="SELECT_SINGLE" class="main-ui-filter-wield-with-label main-ui-filter-date-group main-ui-control-field-group">
        <span class="main-ui-control-field-label">Одиночный выбор</span>
        <div data-name="SELECT_SINGLE"
             data-items='<?= \Bitrix\Main\Web\Json::encode($items); ?>'
             data-params='<?= \Bitrix\Main\Web\Json::encode(['isMulti' => false]); ?>'
             id="select" class="main-ui-control main-ui-select">

            <span class="main-ui-select-name">Выберите</span>
            <span class="main-ui-square-search">
            <input type="text" tabindex="2" class="main-ui-square-search-item">
        </span>
        </div>
    </div>

    <div data-name="SELECT_MULTIPLE" class="main-ui-filter-wield-with-label main-ui-filter-date-group main-ui-control-field-group">
        <span class="main-ui-control-field-label">Множественный выбор</span>
        <div data-name="SELECT_MULTIPLE"
             data-items='<?= \Bitrix\Main\Web\Json::encode($items); ?>'
             data-params='<?= \Bitrix\Main\Web\Json::encode(['isMulti' => true]); ?>'
             id="select2" class="main-ui-control main-ui-multi-select">

            <span class="main-ui-square-container"></span>
            <span class="main-ui-square-search"><input type="text" tabindex="2" class="main-ui-square-search-item"></span>
            <span class="main-ui-hide main-ui-control-value-delete"><span class="main-ui-control-value-delete-item"></span></span>
        </div>
    </div>

    <span class="ui-btn-primary ui-btn" id="update_filter">Найти</span>
</div>
```

Минусы этого подхода – результаты списков придётся получать с помощью `JavaScript`.

```html
<script>
    BX.ready(function() {
        var filter = BX('filter'),
            submit = BX('update_filter');

        BX.bind(submit, 'click', function() {
            var fields = BX.findChildren(filter, {
                attribute: 'data-name',
                className: 'main-ui-control'
            }, true);

            fields.forEach(function(element){
                console.log(element.getAttribute('data-name'));
                console.log(JSON.parse(element.getAttribute('data-value')));
            });
        })
    })
</script>
```

![](/assets/images/posts/bitrix-js/7.png)