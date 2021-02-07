<?php

    namespace mvc\Model;

    class Students 
    {
        use \traits\Sanitize;

        /*
         * Query Builder
         */

        private $qb;

        /*
         * Construct model and setup query builder
         */

        public function __construct()
        {
            $this->qb = new \classes\Database\QB('localhost', 'root', '', 'quantox');
        }

        /*
         * Get student
         */

        public function getStudent(int $id) 
        {
            if(!$data = $this->qb->get( '*', 'students',  'INNER JOIN school_boards ON students.student_school_board_id = school_boards.school_board_id', ['student_id' => $id],  ['limit' => 1])[0] ?? false)
            {
                return false;
            }

            $student               = [];
            $student['id']         = $data['student_id'];
            $student['first_name'] = $this->sanitizeString($data['student_first_name']);
            $student['last_name']  = $this->sanitizeString($data['student_last_name']);

            $student['school_board']         = [];
            $student['school_board']['id']   = $data['school_board_id'];
            $student['school_board']['name'] = $this->sanitizeString($data['school_board_name']);

            return $student;
        }

        /*
         * Get student grades
         */

        public function getStudentGrades(int $id) 
        {
            $data = $this->qb->get( '*', 'grades', false, ['grade_student_id' => $id]);
            $grades = [];

            foreach($data as $grade)
            {
                $arr          = [];
                $arr['id']    = $grade['grade_id'];
                $arr['value'] = $grade['grade_value'];

                array_push($grades, $arr);
            }

            return $grades;
        }

        /*
         * Get student average score [CSM School Board]
         */

        public function getStudentFinalCSM(array $grades) : array
        {
            $result = ['total' => 0, 'average' => null, 'pass' => 'Fail'];
            
            foreach($grades as $grade)
            {
                $result['total'] += $grade['value'];
            }

            $result['average'] = floatval($result['total'] / count($grades));

            if($result['average'] >= 7)
            {
                $result['pass'] = 'Pass';
            }

            return $result;
        }

        /*
         * Get student average score [CSMB School Board]
         */

        public function getStudentFinalCSMB(array $grades) : array
        {
            usort($grades, function($a, $b) 
            {
                return $a['value'] > $b['value'];
            });

            if(count($grades) > 2)
            {
                array_shift($grades);
            }

            $result = ['total' => 0, 'average' => null, 'pass' => 'Fail'];

            foreach($grades as $grade)
            {
                $result['total'] += $grade['value'];
            }

            $result['average'] = floatval($result['total'] / count($grades));

            if(end($grades)['value'] > 8)
            {
                $result['pass'] = 'Pass';
            }

            return $result;
        }
    }