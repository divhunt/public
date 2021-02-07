<?php

    namespace mvc\Controller;

    use classes\App\Controller as Controller;

    class Students extends Controller
    {
        /*
         * Model
         */

        private $model;

        /*
         * Construct 
         */

        public function __construct()
        {
            $this->model = new \mvc\Model\Students();
        }

        /*
         * Signle student
         */

        public function student($id)
        {
            echo "asdasdsa";
        }
    }