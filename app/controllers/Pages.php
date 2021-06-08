<?php

class Pages extends Controller{
    public function __construct(){
       
    }
    
    public function index(){
        $this->forumModal = $this->model('forum');
        
        $newData =[
            'topic_id' => 1,
            'user_id' => 1
        ];

        $rowUserVote = $this->forumModal->getUserVote($newData);

        $data = [
            'title' => 'Homepage To',
            'user_vote' => $rowUserVote
        ]; 

       $this->view('pages/index' ,$data);
    }

    public function about(){
        $data = [
            'title' => 'About'
        ]; 
        $this->view('pages/about', $data);
    }

    public function getVote(){
        $this->forumModal = $this->model('forum');
        extract($_POST);

        $rowVote = $this->forumModal->getVoteCount($topic_id);
    
        echo $rowVote[0]->vote_count;
    }


    public function upVote(){
        $this->forumModal = $this->model('forum');
        extract($_POST);

        if(!isset($isVoted)){
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
    
            if($this->forumModal->upVote($data)){
                echo '1';    
            }
        }
        else{
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
         
            if($this->forumModal->editVote($data)){
                echo '1';
            }
        }
        
        //array_print($_POST);
    }

    public function normalStateVote(){
        $this->forumModal = $this->model('forum');
        extract($_POST);
        $data = [
            'topic_id' => $topic_id,
            'user_id' => $user_id
        ];
        if($this->forumModal->deleteVote($data)){
            echo '1';
        }
    }


    public function downVote(){
        $this->forumModal = $this->model('forum');
        extract($_POST);

        if(!isset($isVoted)){
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
    
            if($this->forumModal->downVote($data)){
                echo '1';    
            }
        }
        else{
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
         
            if($this->forumModal->editVote($data)){
                echo '1';
            }
        }
        
        //array_print($_POST);
    }


}