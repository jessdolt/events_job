<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <?php array_print($data)?>
        <div class="survey-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey Report View</h1>
               
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
                    <h3>Survey Questionaire</h3>
                        <div class="ui-sortable">
                            <?php foreach($data['questions'] as $row): ?>
                                <?php if($row->type == 'check'): ?>
                                    <div class="questions">
                                        <input type="hidden" name="qid[<?php echo $row->id?>]" value="<?php echo $row->id?>">
                                        <input type="hidden" name="type[<?php echo $row->id?>]" value="<?php echo $row->type?>">
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
                                        <input type="hidden" name="qid[<?php echo $row->id?>]" value="<?php echo $row->id?>">
                                        <input type="hidden" name="type[<?php echo $row->id?>]" value="<?php echo $row->type?>">
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
                                        <input type="hidden" name="qid[<?php echo $row->id?>]" value="<?php echo $row->id?>">
                                        <input type="hidden" name="type[<?php echo $row->id?>]" value="<?php echo $row->type?>">
                                        <h4><?php echo $row->question?></h4>
                                        
                                        <div class="form-group-survey">
                                            <textarea name="answer[<?php echo $row->id?>]" id="" cols="30" rows="4" placeholder="Write Something Here...."></textarea>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </div>
             
                  
                </div>
            </div>
        </div>
    </div>

    

    <div id="modal_new"></div>
    

<script>

</script>

<script>
    
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>