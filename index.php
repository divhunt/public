<?php

    require 'src/autoloader.php';

    $app = new classes\Core\App(function($app)
    {
        $app->setConfig('path', __DIR__);
        $app->setConfig('name', 'Quantox Test');
        $app->setConfig('domain', 'quantox.test');
        $app->setConfig('domain_full', 'http://' . $app->getConfig('domain') . '/');

        $app->setProperty('route', new classes\App\Route);
    });

    include 'routes.php';