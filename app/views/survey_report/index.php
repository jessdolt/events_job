<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey Report</h1>
                <hr>
            </div>
        
            <div class="job-card-container">
                <?php foreach($data['surveyList'] as $survey):?>
                <div class="job-card">
                    <div class="job-card-row">
                        <h4 class="job-title"><?php echo $survey->title?></h4>
                    </div>
                    
                    <p class="job-description">
                        <?php echo $survey->description?>
                    </p>
                    <p class="job-posted"></p>
               
                    <a href="<?php echo URLROOT;?>/survey_report/view_report/<?php echo $survey->id?>" class="job-see_more">View Report &#8594;</a> 
    
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
 
<?php require APPROOT . '/views/inc/footer.php'; ?>