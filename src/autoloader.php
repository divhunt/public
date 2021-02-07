<?php

    /*
     * Require autoloader class
     */

    require __DIR__ . '/classes/Core/Autoload.class.php';

    /*
     * Autoload register
     */

    spl_autoload_register('classes\Core\Autoloader::register');

    