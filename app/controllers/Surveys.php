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

        public function edit_survey($id){
            $survey = $this->surveyModel->getSurveyById($id);
            $data = [
                'user_id' => 1,
                'survey' => $survey
            ];
            $this->view('survey/edit_survey', $data);
        }

        public function save_survey(){
            extract($_POST);
            if(empty($sid)){
                $data = [
                    'user_id' => $user_id,
                    'title' => $title,
                    'start_date' => $start_date ,
                    'end_date' => $end_date,
                    'description' => $description
               ];
               if($this->surveyModel->addSurvey($data)){
                echo '1';
                }
            }else{
                $data = [
                    'sid' => $sid,
                    'user_id' => $user_id,
                    'title' => $title,
                    'start_date' => $start_date ,
                    'end_date' => $end_date,
                    'description' => $description
               ];
               if($this->surveyModel->updateSurvey($data)){
                echo '1';
                }
            }
        }

        public function survey_list($id){
            $questions = $this->surveyModel->getQuestion($id);
            $surveyInfo = $this->surveyModel->getSurveyById($id);
            $data =[
                'id' => $id,
                'name' => 'Jess',
                'survey' => $surveyInfo,
                'questions' => $questions
            ];
            
            $this->view('survey/show_survey', $data);
        }

        public function delete_survey($id){
            if($this->surveyModel->deleteSurvey($id)){
                redirect('surveys');
            }
            else{
                die("There's an error deleting this record");
            }
        }
       

        public function question_modal(){
            extract($_POST);
            if(isset($qid)){
                $question = $this->surveyModel->getQuestionById($qid);
                $data = [
                    'sid' => $sid,
                    'qid' => $qid,
                    'question' => $question
                ];
            }
            else{
                $data = [
                    'sid' => $sid
                ];
            }
            //console.log($data);
            $this->view('survey/manage_question' , $data);
        }

        public function save_question(){
            extract($_POST);  
                $data = "survey_id= $sid";
                $data .= ", question ='$question_field'";
                $data .= ", type='$question_type' ";
                if($question_type != 'textfield_s'){
                    $arr = array();
                    foreach($label as $key => $value){
                        $i = 0;
                        while($i == 0){
                            $key = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
                            if(!isset($arr[$key])){
                                $i = 1;
                            }
                        }
                        $arr[$key] = $value;
                    }
                    $data .=", frm_option='". json_encode($arr)."' ";
                }
                else{
                    $data .=", frm_option='' ";
                }
                
                if(empty($qid)){
                    if($this->surveyModel->addQuestion($data)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }else{
                    if($this->surveyModel->updateQuestion($data, $qid)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }

        }

        public function delete_question(){
            extract($_POST);
            if($this->surveyModel->deleteQuestion($qid)){
                return true;
            }
            else {
                return false;
            }
        }
        
        
        public function update_question_sort(){
            extract($_POST);
            $i =0 ;
            foreach($qid as $key => $value){
                $i++; 
                $update[] = $this->surveyModel->updateSort($i, $value);
            }
            print_r($update);
        }
       
    } 