<?php

    namespace classes\App;

    class Route
    {
        use \traits\Host;

        /*
         * Try to match route
         */

        public function match(string $method, string $route, callable $then) : void
        {
            if($this->getRequestMethod() !== strtoupper($method))
            {
                return;
            }

            $match = ['uri' => $this->getUriArray(), 'route' => array_values(array_filter(explode('/', $route))), 'variables' => []];
            $match = $this->matchExtractVariables($match);

            if(array_diff($match['uri'], $match['route']))
            {
                return;
            }

            if(array_diff($match['route'], $match['uri']))
            {
                return;
            }

            $then(...$match['variables']);
        }  

        /*
         * Extract variables
         */  

        private function matchExtractVariables(array $match) : array
        {
            foreach($match['route'] as $key => $value)
            {
                if(strpos($value, ':') !== false) 
                {
                    $id = str_replace(':', '', $value);

                    array_push($match['variables'], $match['uri'][$key] ?? false);
                    unset($match['route'][$key], $match['uri'][$key]);
                }    
            }

            return $match;
        }

    }