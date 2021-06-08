<?php   


    class SideNav extends Controller{
        public function __construct(){
            $this->sideModel = $this->model('Side');
        }


        public function index(){
            $department = $this->sideModel->getDept();
            $courses = $this->sideModel->getCourses();
            $classification = $this->sideModel->getClassification();
            
            $data = [
                'department' => $department,
                'courses' => $courses,
                'classification' => $classification
            ];

            $this->view('sidenav/index', $data);
        }

        public function new_dept(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'dept_name' => $_POST['dept_name'],
                    
                ];
                if($this->sideModel->addDept($data)){
                    redirect('sideNav');
                }
                    
            }

            else{
                $data = [];
            }

            $this->view('sideNav/add_dept', $data);
        }

        public function new_course(){
            $department = $this->sideModel->getDept();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'course_name' => $_POST['course_name'],
                    'course_code' => $_POST['course_code'],
                    'department_id' => $_POST['dept_id']
                    
                ];
                $this->sideModel->addCourse($data);
            }

            else{
                $data = [
                    'department' => $department
                ];
            }

            $this->view('sideNav/add_course', $data);
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