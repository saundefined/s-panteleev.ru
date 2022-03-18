---
extends: _layouts.post
section: content
title: Приложение «Ovi Record»
date: 2022-03-04
description: Приложение для поклонников Александра Овечкина и всех любителей НХЛ
---

## Описание приложения

Приложение отслеживает количество шайб, которые необходимо забросить Александру Овечкину, чтобы побить рекорд Уэйна
Гретцки.

Когда начинается матч с участием Вашингтон Кэпиталз и когда Александр забивает гол, приложение присылает
пуш-уведомление.

<div class="owl-carousel" data-owl-carousel>
  <img src="/assets/images/posts/mobile-ovi-record/1.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/2.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/3.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/4.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/5.jpg">
</div>

В приложении показаны игры, в которых Овечкин забрасывал шайбы, а также можно посмотреть статистику по сезонам.

Знаете, какой сезон был самый результативный?

## Стек

Приложение разработано на кроссплатформенном фреймворке React Native, бекэнд написан на Laravel, административная панель
— Laravel Nova.

<div class="owl-carousel" data-items="1" data-owl-carousel>
  <img src="/assets/images/posts/mobile-ovi-record/6.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/7.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/8.jpg">
  <img src="/assets/images/posts/mobile-ovi-record/9.jpg">
</div>

Приложение локализовано на два языка: английский и русский.

## Сложности

Сложности возникли при публикации приложения в App Store. Если честно, я думал, что могут быть вопросы к
логотипам команд, ведь многие логотипы — товарные знаки. Использование их без письменного разрешения — запрещено.

В API специально для этого были предусмотрены Feature Flags, чтобы можно было отключить отображение логотипов без новой
сборки приложения. А также добавлен раздел с правовой информацией, где указан какой правообладатель у каждого логотипа.

Как оказалось, Apple отказали за "использование изображения, напоминающего Александра Овечкина", без
соответствующего письменного разрешения от Александра — пришлось менять дизайн главного экрана, теперь там логотип
вместо нарисованного портрета =)

## Ссылки

Скачать приложение можно в [App Store](https://apps.apple.com/ru/app/ovi-record/id1610769790)
(также доступно для Mac на M1) и [Google Play](https://play.google.com/store/apps/details?id=ru.goalex.app).