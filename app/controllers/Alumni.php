<?php 

    class Alumni extends Controller{
        public function __construct(){
            $this->alumniModel = $this->model('alumni_m');
            $this->userModel = $this->model('user');
        }

        public function index(){
         $data = $this->alumniModel->showAlumni();

         $this->view('alumni/index',$data);
        }
        
        public function preview(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               $file = $_FILES['csv_file'];
               $fileName = $file['tmp_name'];
               $fileSize = $file['size'];
               $alumniList = array();

               if ($fileSize > 0){
                   $openFile = fopen($fileName, "r");
                   $column_header = true;
                   while(($column = fgetcsv($openFile, 10000, ",")) !== FALSE){
                       if($column_header){
                           $column_header = false;
                       }
                       else{
                           array_push($alumniList, $column);
                       }
                   }
                   fclose($openFile);
               }

            //    foreach($alumniList as $alumni){
            //        echo '<br>';
            //        echo $alumni[0];
            //        echo '<br>';
            //        echo $alumni[1];
            //    }
            

              $this->view('alumni/preview', $alumniList);
            }

            else{
                $data = [];
                $this->view('alumni/preview', $data);
            }
            
        }
      

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //array_print($_POST);
                
                $alumni = $_POST['alumni'];
                // array_print($alumni[0]);
                
                // $alumni[0]['department'] = checkDept($alumni[0]['department']);
                // $alumni[0]['batch'] = checkBatch($alumni[0]['batch']);
                // array_print($alumni[0]);

                $duplication = array();

                foreach($alumni as $data){
                    $data['department'] = checkDept($data['department']);
                    $data['batch'] = checkBatch($data['batch']);
                    //array_print($data);
                    
                  
                    if($this->alumniModel->checkAlumni($data['student_no'])){
                        array_push($duplication, $data);
                    }
                    else{
                        $this->alumniModel->register($data);
                        $newData = [
                            'name' => $data['first_name'] . substr($data['middle_name'], 0 ,1) . $data['last_name'],
                            'email' => $data['email'],
                            'password' => '12345',
                            'user_type' => 7
                        ];
                        $this->userModel->register($newData);
                    }
                }

                if(!empty($duplication)){
                    $this->view('alumni/duplication', $duplication);
                }
                else{
                    redirect('alumni');
                }
                
            }
        }

        

    }