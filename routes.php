<?php
    
    $app->route->match('GET', '/students/:id', function($id)
    {    
        echo "match";
    });