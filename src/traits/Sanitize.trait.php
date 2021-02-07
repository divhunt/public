<?php

    namespace traits;

    Trait Sanitize
    {
        /*
         * Sanitize string
         */

        public function sanitizeString(string $string) : string
        {
            return htmlspecialchars($string, ENT_QUOTES);
        }

        /*
         * Sanitize int
         */

        public function sanitizeInt(int $int) : int
        {
            return (int) $int;
        }
    }