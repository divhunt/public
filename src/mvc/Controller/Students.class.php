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

            if(!$student)
            {
                include $this->renderView('students/student/not-found'); return;
            }

            $board = strtoupper($student['school_board']['name']);

            $student['grades'] = $this->model->getStudentGrades($student['id']);

            $result = $this->model->{"getStudentFinal{$board}"}($student['grades']);

            $student['average_score'] = $result['average'];
            $student['final_result']  = $result['pass'];

            include $this->renderView('students/student/' . strtolower($student['school_board']['name']));
        }
    }