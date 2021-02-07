<?php

    namespace classes\Core;

    class Autoloader
    {
        /*
         * Define src path
         */

        protected static $path = __DIR__ . '/../../';

        /*
         * Autoload files
         */

        public static function register(string $name) : void
        {
            if(!$name = self::registerProcessName($name))
            {
                return;
            }

            if(!file_exists(self::$path . $name))
            {
                die('Could not load "'.$name.'"');
            }

            include_once self::$path . $name;
        }

        /*
         * Process autoload file name
         */

        private static function registerProcessName(string $name) : string
        {
            $name = explode('\\', $name);
            $data = ['ext' => false];

            switch(strtolower($name[0] ?? false)) 
            {
                case 'classes':
                    $data['ext'] = '.class.php';
                    break;

                case 'mvc':
                    $data['ext'] = '.class.php';
                    break;

                case 'traits':
                    $data['ext'] = '.trait.php';
                    break;
            }

            if(!$data['ext'])
            {
                return false;
            }

            return implode('/', $name) . $data['ext'];
        }
    }

    