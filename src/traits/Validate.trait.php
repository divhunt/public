<?php

    namespace traits;

    Trait Validate
    {
        /*
         * Validate string
         */

        public function validateStringPass(string $pattern, string $string) : string
        {
            return preg_replace("/[^{$pattern}]/", '', $string);
        }
    }