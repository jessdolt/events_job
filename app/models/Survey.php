<?php 


    class Survey{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addSurvey($data){
            $this->db->query('INSERT INTO survey_set(title,description,user_id,start_date,end_date) VALUES (:title,:description,:user_id,:start_date,:end_date)');

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $data['end_date']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showSurvey(){
            $this->db->query('SELECT * from survey_set');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function editEvent($data,$isUploaded){
            if($isUploaded == 1 ){
                $this->db->query('UPDATE events set title=:title,description=:description,image=:image where id =:id');

                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':image',$data['file']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $this->db->query('UPDATE events set title=:title,description=:description where id =:id');
                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }

        public function singleEvent($id){
            $this->db->query('SELECT * from events where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function deleteEvent($id){

            $this->db->query('DELETE FROM events where id= (:id)');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        
    }