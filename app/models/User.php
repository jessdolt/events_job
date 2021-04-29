<?php 

    class User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query('INSERT INTO users(name,email,password,user_type) VALUES (:fName,:email,:password,:user_type)');

            $this->db->bind(':fName', $data['fName']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showUsers(){
            $this->db->query('SELECT *,
                             users.id as userId,
                             user_type.id as userTypeId
                             FROM users
                             LEFT JOIN user_type
                             ON users.user_type = user_type.id
                            ');

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