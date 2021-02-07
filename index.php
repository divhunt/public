<?php

    require '_src/autoloader.php';

    $app = new classes\Core\App(function($app)
    {
        $app->setConfig('path', __DIR__);
        $app->setConfig('domain', 'quantox.test');

        $app->setProperty('route', new classes\App\Route);
    });

    include 'routes.php';