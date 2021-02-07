<?php

    namespace classes\Core;

    use classes\Core\Config as Config;

    class App extends Config
    {
        /*
         * Construct app class
         */

        public function __construct(callable $callback = null)
        {
            if($callback)
            {
                $callback($this);
            }
        }
    }