<?php 

    class Surveys extends Controller{
        public function __construct(){
            $this->surveyModel = $this->model('survey');
        }

        public function index(){
            $data = $this->surveyModel->showSurvey();

            $this->view('survey/index', $data);
        }

        public function add_survey(){
            $data = [
                'user_id' => 1
            ];

            $this->view('survey/new_survey', $data);
        }

        public function survey_list($id){

            $data =[
                'id' => $id,
                'name' => 'Jess'
            ];
            $this->view('survey/show_survey', $data);
        }

        public function check(){
            $data = [
                 'user_id' => $_POST['user_id'],
                 'title' => $_POST['title'],
                 'start_date' => $_POST ['start_date'],
                 'end_date' => $_POST['end_date'],
                 'description' => $_POST['description']
            ];
            
             if($this->surveyModel->addSurvey($data)){
                 echo '1';
             }

        }
    } 