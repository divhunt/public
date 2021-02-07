<?php

    Trait Sanitize
    {
        /*
         * Sanitize string
         */

        public function sanitizeString(string $string) : string
        {
            return htmlspecialchars($string, ENT_QUOTE);
        }

        /*
         * Sanitize int
         */

        public function sanitizeInt(int $int) : int
        {
            return (int) $int;
        }
    }