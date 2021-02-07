<?php

    namespace mvc\Controller;

    use classes\App\Controller as Controller;

    class Students extends Controller
    {
        /*
         * Set model
         */

        public function model()
        {
            $this->model = new \mvc\Model\Students();
        }

        /*
         * Signle student
         */

        public function getStudent(int $id)
        {
            $student = $this->model->getStudent($id);

            // if($student)
            // {
            //     include $this->renderView('students/student');
            // }
        }
    }