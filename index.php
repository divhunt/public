<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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