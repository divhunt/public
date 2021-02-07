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
            $data = $this->qb->get(
                '*', 'students', 
                'INNER JOIN school_boards ON students.student_school_board_id = school_boards.school_board_id',
                ['student_id' => $id],  ['limit' => 1]
            )[0] ?? false;

            if(!$data)
            {
                return false;
            }

            $student               = [];
            $student['id']         = $data['student_id'];
            $student['first_name'] = $this->sanitizeString($data['student_first_name']);
            $student['last_name']  = $this->sanitizeString($data['student_last_name']);
            $student['updated']    = $data['student_updated'];
            $student['created']    = $data['student_created'];

            $student['school_board']            = [];
            $student['school_board']['id']      = $data['school_board_id'];
            $student['school_board']['name']    = $this->sanitizeString($data['school_board_name']);
            $student['school_board']['updated'] = $data['school_board_updated'];
            $student['school_board']['created'] = $data['school_board_created'];

            return $student;
        }
    }