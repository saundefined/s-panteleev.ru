<?php

/**
 * @var $container Container
 * @var $events EventBus
 */

use App\Listeners\GenerateSitemap;
use Carbon\Carbon;
use Illuminate\Container\Container;
use TightenCo\Jigsaw\Events\EventBus;
use TightenCo\Jigsaw\Jigsaw;

$events->beforeBuild(
    function (Jigsaw $jigsaw) {
        Carbon::setLocale('ru_RU');
    }
);

$events->afterBuild(GenerateSitemap::class);