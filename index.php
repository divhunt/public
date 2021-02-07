<?php

    require 'src/autoloader.php';

    $app = new classes\Core\App();

    $app->set('path', __DIR__)
        ->set('domain', 'quantox.test');

    print_r($app);

    // $app->set('path', __DIR__);

    // $app->hi();