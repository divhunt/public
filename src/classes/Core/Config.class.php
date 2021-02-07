<?php

    namespace classes\Core;

    abstract class Config
    {
        /*
         * Store config data
         */

        private $config;

        /*
         * Get config
         */

        public function get(string $key) : string
        {
            return $this->config[$key] ?? '';
        }

        /*
         * Set config
         */

        public function set(string $key, string $value) : Config
        {
            $this->config[$key] = $value;

            return $this;
        }
    }