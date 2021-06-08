<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <div class="survey-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey View</h1>
               
                <hr>
            </div>
            <div class="survey-info-container">
                <div class="survey-info">
                    <h1>Title</h1>
                    <h4><?php echo $data['survey']->title?></h4>
                    <p>Description:</p>
                    <p><?php echo $data['survey']->description?></p>
                    <p>Start Date: </p>
                    <p><?php echo $data['survey']->start_date?></p>
                    <p>End Date: </p>
                    <p><?php echo $data['survey']->end_date?></p>
                    <p>Have Taken: </p>    
                </div>
                <div class="survey-question">
                    <button id="btn-question" class="btn-quest">Add New Question</button>
                    <form action="" id="manage-sort">
                        <div class="ui-sortable">
                            <?php foreach($data['questions'] as $row): ?>
                            
                                <?php if($row->type == 'check'): ?>
                                    <div class="questions">
                                        <input type="hidden" name="qid[]" value="<?php echo $row->id?>">
                                        <div>
                                            <a href="#" class="btn-edit-question" data-id="<?php echo $row->id?>">Edit</a>
                                            <a href="#" class="btn-delete-question" data-id="<?php echo $row->id?>">Delete</a>
                                        </div>
                                        <h4><?php echo $row->question?></h4>
                                        <?php foreach(json_decode($row->frm_option) as $key => $value):?>
                                        
                                        <div class="form-group-survey">
                                            <input type="checkbox" id="option_<?php echo $key?>" name="answer[<?php echo $row->id?>][]" value="<?php echo $key?>">
                                            <label for="option_<?php echo $key?>"> <?php echo $value; ?></label>
                                        </div>
                                        <?php endforeach;?>
                                    </div> 
                                <?php elseif($row->type == 'radio'): ?>
                                    <div class="questions">
                                        <input type="hidden" name="qid[]" value="<?php echo $row->id?>">
                                        <div>
                                            <a href="#" class="btn-edit-question" data-id="<?php echo $row->id?>">Edit</a>
                                            <a href="#" class="btn-delete-question" data-id="<?php echo $row->id?>">Delete</a>
                                        </div>
                                        <h4><?php echo $row->question?></h4>

                                        <?php foreach(json_decode($row->frm_option) as $key => $value): ?>
                                        <div class="form-group-survey">
                                            <input type="radio" id="option_<?php echo $key?>" name="answer[<?php echo $row->id?>]" value="<?php echo $key?>" checked="">
                                            <label for="option_<?php echo $key?>"><?php echo $value; ?></label>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                <?php else: ?>
                                    <div class="questions">
                                    <input type="hidden" name="qid[]" value="<?php echo $row->id?>">
                                        <div>
                                            <a href="#" class="btn-edit-question" data-id="<?php echo $row->id?>">Edit</a>
                                            <a href="#" class="btn-delete-question" data-id="<?php echo $row->id?>">Delete</a>
                                        </div>
                                        <h4><?php echo $row->question?></h4>
                                        
                                        <div class="form-group-survey">
                                            <textarea name="answer[<?php echo $row->id?>]" id="" cols="30" rows="4" placeholder="Write Something Here...."></textarea>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <div id="modal_new"></div>
    

<script>
    $(document).ready(function(){
        //console.log($('#manage-sort').serialize());
        $('.ui-sortable').sortable({
            update: function( ) {
		        $.ajax({
		        	url:"<?php echo URLROOT;?>/surveys/update_question_sort",
		        	method:'POST',
		        	data:$('#manage-sort').serialize(),
		        	success:function(resp){
		        		//alert_toast("Question order sort successfully saved.","success")
		        	}
		        })
		    }
        })
    })

    $('.btn-edit-question').click(function(){
        // console.log($(this).attr('data-id'));
        // console.log(php echo $data['id']?>);
        $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/question_modal',
                data: { sid: <?php echo $data['id'] ?>, qid: $(this).attr('data-id')},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                     $('#modal_new').html(res);
                     previewSurvey();
                }, 
                error: function(er){
                    console.log(er);
                }
            })
    })

    $('.btn-delete-question').click(function(){
        // console.log($(this).attr('data-id'));
        // console.log(php echo $data['id']?>);
        if(confirm("Are you sure you want to delete this question?")){
            $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/delete_question',
                data: { sid: <?php echo $data['id'] ?>, qid: $(this).attr('data-id')},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    location.reload();
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        }
    })

    $('#btn-question').click(function(){
        $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/question_modal',
                data: { sid: <?php echo $data['id'] ?>},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    $('#modal_new').html(res);
                    previewSurvey();
                }, 
                error: function(er){
                    console.log(er);
                }
            })
    })

</script>

<script>
    
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>