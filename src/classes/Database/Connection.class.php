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

        public function __construct(string $host, string $user, string $pass, string $base, bool $persistent = false)
        {
            $this->set('host', $host);
            $this->set('user', $user);
            $this->set('pass', $pass);
            $this->set('base', $base);
            $this->set('persistent', '');

            if($persistent)
            {
                $this->set('persistent', 'P:');
            }
        }

        /*
         * Connect to database once needed
         */        

        public function connect() : void
        {
            if($this->conn)
            {
                return;
            }

            try
            {
                $conn = mysqli_init();

                $conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
                $conn->real_connect($this->get('persistent') . $this->get('host'), $this->get('user'), $this->get('pass'), $this->get('base'));
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
        }
    }