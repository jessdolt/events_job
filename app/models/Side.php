<?php 

    class Side{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        public function getClassification(){
            $this->db->query('SELECT *
                             FROM fusion 
                             INNER JOIN courses
                             ON fusion.course_id = courses.id
                             INNER JOIN batch
                             ON fusion.batch_id = batch.id
                             INNER JOIN department
                             ON courses.department_id = department.id
                            ');
            $row = $this->db->resultSet();

            if($row > 0){
                return $row;
            }
        }

        public function getDept(){
            $this->db->query('SELECT * from department');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCourses(){
            $this->db->query('SELECT * from courses');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function addDept($data){
            $this->db->query('INSERT INTO department(department_name) VALUES (:dept_name)');

            $this->db->bind(':dept_name', $data['dept_name']);
            try{
                if($this->db->execute()){
                    redirect('sideNav');
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                redirect('sideNav/duplicateError');
            }
        }


        public function addCourse($data){
            $this->db->query('INSERT INTO courses(course_name,course_code,department_id) VALUES (:course_name,:course_code, :dept_id)');

            $this->db->bind(':course_name', $data['course_name']);
            $this->db->bind(':course_code', $data['course_code']);
            $this->db->bind(':dept_id', $data['department_id']);
            try{
                if($this->db->execute()){
                    $this->insertBatch($data['course_code']);
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                redirect('sideNav/duplicateError');
            }
        }
        
        public function addBatch($data){
            $this->db->query('INSERT INTO batch(year) VALUES (:year)');
            $this->db->bind(':year', $data['batch']);
            try{
                if($this->db->execute()){
                    $this->insertGroup($data['batch']);
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                redirect('sideNav/duplicateError');
            }
        }

        public function insertGroup($year){
            $count = 0;
            $this->db->query('SELECT * from courses');
            $rowCourses= $this->db->resultSet();

            $this->db->query('SELECT id from batch where year=:year');
            $this->db->bind(':year', $year);
            $rowBatch = $this->db->single();

            foreach($rowCourses as $course){
                $this->db->query('INSERT INTO fusion(course_id,batch_id) VALUES (:course_id,:batch_id)');
                $this->db->bind(':course_id', $course->id);
                $this->db->bind(':batch_id', $rowBatch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowCourses)){
                redirect('sideNav');
            }

            
        }

        public function insertBatch($course){
            $count = 0;
            $this->db->query('SELECT * from batch');
            $rowBatch = $this->db->resultSet();

            $this->db->query('SELECT id from courses where course_code=:course_code');
            $this->db->bind(':course_code', $course);
            $rowCourse = $this->db->single();

            foreach($rowBatch as $batch){
                $this->db->query('INSERT INTO fusion(course_id,batch_id) VALUES (:course_id,:batch_id)');
                $this->db->bind(':course_id', $rowCourse->id);
                $this->db->bind(':batch_id', $batch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowBatch)){
                redirect('sideNav');
            }
        }

}