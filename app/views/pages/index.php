<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    .margu{
        width: 100%;
        border: 1px solid black;
    }

    .comment-section{
        height: 100%;
        width: 100%;
        font-family: 'Arial';
    }
</style>
    <h1><?php echo $data['title']?></h1>
    <?php array_print($data)?>
    <div class="container">

        <a href="<?php echo URLROOT;?>/events" class="nav-link">Events</a>
        <a href="<?php echo URLROOT;?>/galleries" class="nav-link">Gallery</a>
        <a href="<?php echo URLROOT;?>/job_portals" class="nav-link">Job Portal</a>
        <a href="<?php echo URLROOT;?>/users" class="nav-link">Users</a>
        <a href="<?php echo URLROOT;?>/surveys" class="nav-link">Survey</a>
        <a href="<?php echo URLROOT;?>/survey_widget" class="nav-link">Take Survey</a>
        <a href="<?php echo URLROOT;?>/survey_report" class="nav-link">Survey Report</a>
        <a href="<?php echo URLROOT;?>/alumni" class="nav-link">Alumni</a>
        <a href="<?php echo URLROOT;?>/sideNav" class="nav-link">Side Nav</a>
      

        
    </div>

   

<div votetype='<?php 
        if(empty($data['user_vote'])){
            echo 'normal';
        }
        elseif(!empty($data['user_vote'])){
            if($data['user_vote'][0]->vote_count == 1){
                echo 'up';
            }
            else{
                echo 'down';
            }
        }
    ?>'>
    <button id="up-vote">UP</button>
    <span id="vote-count">0</span>
    <button id="down-vote">DOWN</button>
</div>

<script> 

    $(document).ready(function(){
        //GET VOTE COUNT FROM DATABASE
        getVoteCount()

        function getVoteCount(){
            $.ajax({ 
                url:'<?php echo URLROOT;?>/pages/getVote',
                data: {topic_id: 1}, 
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    $('#vote-count').html(res);
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        }


        $('#up-vote').click(function(){
            var parentContainer = $(this.parentNode);
            var voteType = parentContainer.attr('votetype');
            if(voteType == 'normal'){
                parentContainer.attr('votetype', 'up');
 
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/upVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        count: 1
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        //console.log(res);
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            }

            else if(voteType == 'up'){
                parentContainer.attr('votetype','normal');
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/normalStateVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        //console.log(res);
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
        
            }
            else if(voteType == 'down'){
                parentContainer.attr('votetype', 'up');
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/upVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        count: 1,
                        isVoted: 1
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            } 
        })

        $('#down-vote').click(function(){
            var parentContainer = $(this.parentNode);
            var v_count = $('#vote-count').text();
            var vote_count = parseInt(v_count);

            var voteType = parentContainer.attr('votetype');
            if(voteType == 'normal'){
                parentContainer.attr('votetype', 'down');
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/downVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        count: -1
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            }
            else if(voteType == 'down'){
                parentContainer.attr('votetype','normal');
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/normalStateVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            }
            else if(voteType == 'up'){
                parentContainer.attr('votetype', 'down');
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/pages/downVote',
                    data: {
                        topic_id: 1, 
                        user_id: 1, 
                        count: -1,
                        isVoted: 1
                        }, 
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        if(res == 1){
                            getVoteCount();
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            }
           
        })


    })
  
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

