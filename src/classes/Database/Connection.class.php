<?php

    namespace classes\Database;

    use classes\Core\Config as Config;

    class Connection extends Config 
    {
        /*
         * Stora db connection once initiate
         */  

        protected $conn = false;

        /*
         * Construct class and set connection data
         */        

        public function setup(string $host, string $user, string $pass, string $base, bool $persistent = false) : void
        {
            $this->setConfig('host', $host);
            $this->setConfig('user', $user);
            $this->setConfig('pass', $pass);
            $this->setConfig('base', $base);
            $this->setConfig('persistent', '');

            if($persistent)
            {
                $this->setConfig('persistent', 'P:');
            }
        }

        /*
         * Connect to database once needed
         */        

        public function connect() : object
        {
            if($this->conn)
            {
                return $this->conn;
            }

            try
            {
                $conn = mysqli_init();

                $conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);

                $conn->real_connect(
                    $this->getConfig('persistent') . $this->getConfig('host'), 
                    $this->getConfig('user'), 
                    $this->getConfig('pass'), 
                    $this->getConfig('base')
                );
                
                $conn->set_charset('utf8');

                if($conn->connect_error)
                {
                    throw new Exception($conn->connect_error);
                }

                $this->conn = $conn;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }

            return $conn;
        }

        /*
         * Protect from SQL Injection
         */

        public function sqlProtect($value)
        {
            if($value === null || empty($value) || !$value)
            {
                return null;
            }

            if(strtolower($value) === 'null')
            {
                return null;
            }

            if(is_array($value) || is_object($value))
            {
                $value = json_encode($value);
            }
            
            $value = $this->connect()->real_escape_string($value);

            return "'" . $value . "'";
        }
    }