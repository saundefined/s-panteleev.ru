<?php

/**
 * @var $container \Illuminate\Container\Container
 * @var $events \TightenCo\Jigsaw\Events\EventBus
 */
use Carbon\Carbon;
use TightenCo\Jigsaw\Jigsaw;

$events->beforeBuild(
    function (Jigsaw $jigsaw) {
        Carbon::setLocale('ru_RU');
    }
);

