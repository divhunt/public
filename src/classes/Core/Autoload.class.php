<?php

    namespace classes\Core;

    class Autoloader
    {
        protected static $path = __DIR__ . '/../../';

        public static function register($name)
        {
            if(!$name = self::registerProcessName($name))
            {
                return false;
            }

            if(file_exists(self::$path . $name))
            {
                include_once self::$path . $name;
            }
        }

        private static function registerProcessName($name)
        {
            $name = explode('\\', $name);
            $data = ['ext' => false];

            switch(strtolower($name[0] ?? false)) 
            {
                case 'classes':
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

    