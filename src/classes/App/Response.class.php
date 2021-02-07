<?php

    namespace classes\App;

    class Response
    {
        /*
         * Render JSON response 
         */ 

        public function json(array $data)
        {
            header('Content-type: application/json');

            echo json_encode($data); exit;
        }

        /*
         * Render XML response 
         */ 

        public function xml(array $data, $xml)
        {
            header('Content-type: application/xml');
            
            echo xmlBuild($data, '', $xml);
        }
    }

    function xmlBuild($array, $parentkey = '', $xml = false)
    {
        foreach($array as $key => $value)
        {
            if(is_array($value))
            {
                xmlBuild($value, is_numeric((string) $key) ? ('n' . $key) : $key, $xml->addChild(is_numeric((string) $key) ? $parentkey : $key));
            } 
            else 
            {
                $xml->addAttribute(is_numeric((string) $key) ? ('n' . $key) : $key, $value);
            }
        }

        return $xml->asXML();
    }