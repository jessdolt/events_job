<?php 

    
    class Forum{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getUserVote($data){
            $this->db->query('SELECT * from vote WHERE user_id = :user_id AND topic_id = :topic_id');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':topic_id', $data['topic_id']);

            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function getVoteCount($topic_id){
            $this->db->query('SELECT SUM(vote_count) as vote_count from vote WHERE topic_id = :id');
            $this->db->bind(':id', $topic_id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function upVote($data){
            $this->db->query('INSERT INTO vote (topic_id,vote_count,user_id) VALUES(:topic_id, :vote_count, :user_id)');
            $this->db->bind(':topic_id' , $data['topic_id']);
            $this->db->bind(':vote_count' , $data['vote_count']);
            $this->db->bind(':user_id' , $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteVote($data){
            $this->db->query('DELETE FROM vote where user_id= :user_id AND topic_id = :topic_id');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':topic_id', $data['topic_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function downVote($data){
            $this->db->query('INSERT INTO vote (topic_id,vote_count,user_id) VALUES(:topic_id, :vote_count, :user_id)');
            $this->db->bind(':topic_id' , $data['topic_id']);
            $this->db->bind(':vote_count' , $data['vote_count']);
            $this->db->bind(':user_id' , $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function editVote($data){
            $this->db->query('UPDATE vote SET vote_count = :vote_count WHERE topic_id = :topic_id AND user_id = :user_id');
            $this->db->bind(':vote_count', $data['vote_count']);
            $this->db->bind(':topic_id', $data['topic_id']);
            $this->db->bind(':user_id', $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }