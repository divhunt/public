<?php

    namespace traits;

    Trait Host 
    {
        use \traits\Validate;

        /*
         * Get uri string
         */ 

        public function getUri() : string
        {
            $uri = explode('?', ($_SERVER['REQUEST_URI'] ?? false))[0] ?? '/';

            return $this->validateStringPass('a-z\.A-z_0-9\/\-', $uri);
        }

        /*
         * Get uri array
         */ 

        public function getUriArray() : array
        {
            return array_values(array_filter(explode('/', $this->getUri())));
        }

        /*
         * Get request method
         */ 

        public function getRequestMethod() : string
        {
            $method = strtoupper($_SERVER['REQUEST_METHOD']);

            if(in_array($method, ['GET'])) /* Enough for this app */
            {    
                return $method;
            }   

            return '';
        }
    }