<?php 

    class Alumni_m{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query('INSERT INTO alumni(student_no, last_name, first_name, middle_name, gender, email, contact_no, employment, department, batch) VALUES (:student_no, :last_name, :first_name, :middle_name, :gender, :email, :contact_no, :employment, :department, :batch)');

            $this->db->bind(':student_no', $data['student_no']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':department', $data['department']);
            $this->db->bind(':batch', $data['batch']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }
        

        public function checkAlumni($student_no){
            $this->db->query('SELECT * from alumni WHERE student_no = :student_no' );

            $this->db->bind(':student_no', $student_no);
            $row = $this->db->single();
            
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function showAlumni(){
            $this->db->query('SELECT * from alumni');

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function editUser($data){
                $this->db->query('UPDATE users set name=:fName, email=:email, password=:password, user_type=:user_type where id =:id');

                $this->db->bind(':fName', $data['fName']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':user_type', $data['user_type']);
                $this->db->bind(':id', $data['id']);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
        }


        public function singleUser($id){
            $this->db->query('SELECT * from users where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function deleteUser($id){

            $this->db->query('DELETE FROM users where id= (:id)');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function getUserTypes(){
            $this->db->query('SELECT * from user_type');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }
        
    }