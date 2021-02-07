<?php

    namespace classes\App;

    class Route
    {
        use \traits\Host;

        /*
         * Try to match route
         */

        public function match(string $method, string $route, callable $then)
        {
            if($this->getRequestMethod() !== strtoupper($method))
            {
                return false;
            }
        }    
    }