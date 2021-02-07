<?php
    
    $app->route->match('GET', '/students/:id', function($id)
    {    
        $controller = new \mvc\Controller\Students();

        $controller->getStudent((int)$id);
    });