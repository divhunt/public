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

        public function getConfig(string $key) : string
        {
            return $this->config[$key] ?? '';
        }

        /*
         * Set config
         */

        public function setConfig(string $key, string $value) : Config
        {
            $this->config[$key] = $value;

            return $this;
        }

        /*
         * Set property
         */

        public function setProperty(string $key, object $value) : void
        {
            if(isset($this->{$key}))
            {
                return;
            }

            $this->{$key} = $value;
        }
    }