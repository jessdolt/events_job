<?php 

    class Job_portal{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addJob($data){
            $this->db->query('INSERT INTO job_portal (company_logo, work_status, job_status, avail_pos, company_name, job_title, description, others) VALUES (:company_logo, :work_status, :job_status, :avail_pos, :company_name, :job_title, :job_description, :others)');

            $this->db->bind(':company_logo', $data['company_logo']);
            $this->db->bind(':work_status', $data['work_status']);
            $this->db->bind(':job_status', $data['job_status']);
            $this->db->bind(':avail_pos', $data['avail_pos']);
            $this->db->bind(':company_name', $data['company_name']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':job_description', $data['job_description']);
            $this->db->bind(':others', $data['others']);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showJobs(){
            $this->db->query('SELECT * from job_portal');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function editJob($data){
            if($data['isUploaded'] == 1 ){
                $this->db->query('UPDATE job_portal set company_logo = :company_logo, work_status = :work_status, job_status = :job_status, avail_pos = :avail_pos, company_name = :company_name, job_title = :job_title, description = :job_description, others = :others WHERE id =:id');

                $this->db->bind(':id', $data['id']);
                $this->db->bind(':company_logo', $data['company_logo']);
                $this->db->bind(':work_status', $data['work_status']);
                $this->db->bind(':job_status', $data['job_status']);
                $this->db->bind(':avail_pos', $data['avail_pos']);
                $this->db->bind(':company_name', $data['company_name']);
                $this->db->bind(':job_title', $data['job_title']);
                $this->db->bind(':job_description', $data['job_description']);
                $this->db->bind(':others', $data['others']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }

            else{
                $this->db->query('UPDATE job_portal set work_status = :work_status, job_status = :job_status, avail_pos = :avail_pos, company_name = :company_name, job_title = :job_title, description = :job_description, others = :others WHERE id =:id');

                $this->db->bind(':id', $data['id']);
                $this->db->bind(':work_status', $data['work_status']);
                $this->db->bind(':job_status', $data['job_status']);
                $this->db->bind(':avail_pos', $data['avail_pos']);
                $this->db->bind(':company_name', $data['company_name']);
                $this->db->bind(':job_title', $data['job_title']);
                $this->db->bind(':job_description', $data['job_description']);
                $this->db->bind(':others', $data['others']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }


        public function getJobById($id){
            $this->db->query('SELECT * from job_portal where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function deleteJob($id){
            $this->db->query('DELETE FROM job_portal where id= (:id)');
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        
    }