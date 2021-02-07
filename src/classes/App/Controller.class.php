<?php

    namespace classes\App;

    class Controller
    {
        /*
         * Require model function from controller
         */

        public function __construct()
        {
            if(!method_exists($this, 'model'))
            {
                die('Please provide "model" function inside your controller class');
            }

            $this->model();
        }

        /*
         * Render view
         */

        public function renderView(string $view) : string
        {
            global $app;

        }
    }