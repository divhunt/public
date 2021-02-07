<?php

    namespace classes\Database;

    use classes\Database\Connection as Connection;

    class QB extends Connection
    {
        public function __construct(string $host, string $user, string $pass, string $base, bool $persistent = false)
        {
            $this->setup($host, $user, $pass, $base, $persistent);
        }

        public function get(string $select, string $table, string $joins, array $search = [], array $options = [])
        {
            $query = "SELECT {$select} FROM {$table} {$joins}";

            if(count($search))
            {
                $query .= ' WHERE ';
            }

            foreach($search as $key => $value)
            {
                $query .= $key . ' = ' . $this->sqlProtect($value);
            }

            foreach($options as $key => $value)
            {
                $query .= ' ' . strtolower($key) . ' ' . $value;
            }

            if(!$query = $this->connect()->query($query))
            {
                die(mysqli_error($this->connect()));
            }

            $array = [];

            $i = 0; while($row = $query->fetch_assoc())
            {
                $array[$i] = $row; $i++;
            }

            return $array;
        }
    }