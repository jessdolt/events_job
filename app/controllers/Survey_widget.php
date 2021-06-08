<?php 

    class Survey_widget extends Controller{

        public function __construct(){
            $this->surveyListModel = $this->model('survey_list');
        }

        public function index(){
            $surveyList = $this->surveyListModel->showSurvey();
            
            $answers = $this->surveyListModel->isAnswer(2);
            $ans = array();
            
            foreach($answers as $answer){
                $ans[$answer->survey_id] = 1;
            }

            $data = [
                'surveyList' => $surveyList,
                'user_id' => 1,
                'answers' => $ans
            ]; 
            
            $this->view('survey_list/index', $data);
        }
        
        public function answer_survey($sid){
            $survey = $this->surveyListModel->getSurveyById($sid);
            $questions = $this->surveyListModel->getQuestion($sid);
            $isAnswer = $this->surveyListModel->checkIfAnswered(0, $sid);

            $data = [
                'survey' => $survey,
                'questions' => $questions,
                'isAnswer' => $isAnswer
            ];
            $this->view('survey_list/answer', $data);
        }

        public function answer(){
            extract($_POST);
                foreach($qid as $key => $value){
                    $data = " survey_id=$survey_id";
                    $data .= ", question_id='$qid[$key]'";
                    $data .= ", user_id='1'";
                    if($type[$key] == 'check'){
                        $data .= ", answer='[".implode("],[",$answer[$key])."]' ";
                    }
                    else{
                        $data .= ", answer='$answer[$key]' ";
                    }
                    $save[] = $this->surveyListModel->addAnswer($data);
                }
       
            if(isset($save)){
                echo 1;
            }
           
        }
    }