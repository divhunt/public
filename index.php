<?php

    require 'src/autoloader.php';

    $app = new classes\Core\App();

    $app->set('path', __DIR__);
    $app->set('domain', 'quantox.test');

    $connection = new classes\Database\Connection('localhost', 'root', '', 'quantox');
    $connection->connect();


    // $app->set('path', __DIR__);

    // $app->hi();