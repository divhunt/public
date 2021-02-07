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
            if(!$student = $this->model->getStudent($id))
            {
                include $this->renderView('students/student/not-found'); return;
            }

            $board = strtoupper($student['school_board']['name']);

            $student['grades'] = $this->model->getStudentGrades($student['id']);
            $student['grades_result'] = $this->model->{"getStudentFinal{$board}"}($student['grades']);

            include $this->renderView('students/student/' . strtolower($student['school_board']['name']));
        }
    }