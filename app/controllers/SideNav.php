<?php   


    class SideNav extends Controller{
        public function __construct(){
            $this->sideModel = $this->model('Side');
        }


        public function index(){
            $row = $this->sideModel->showDepartment();

            $this->view('sidenav/index', $row);
        }

        public function new_dept(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'dept_name' => $_POST['dept_name'],
                    'dept_code' => $_POST['dept_code']
                ];
                $this->sideModel->addDepartment($data);
            }

            else{
                $data = [];
            }

            $this->view('sideNav/add_dept', $data);
        }

        public function new_batch(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'batch' => $_POST['batch'],
                    
                ];
                if($this->sideModel->addBatch($data)){
                    redirect('sideNav');
                }
                    
            }

            else{
                $data = [];
            }

            $this->view('sideNav/add_batch', $data);
        }

        public function duplicateError(){
            echo 'Data is already in database';
        }
    }