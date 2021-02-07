<?php
    
    $app->route->match('GET', '/students/:id', function($id)
    {    
        $controller = new \mvc\Controller\Students();

        print_r($controller);
    });