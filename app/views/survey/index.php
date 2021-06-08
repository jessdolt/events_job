<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <div class="survey-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey List</h1>
                <hr>
            </div>
            <div class="survey-form">
                <div class="survey">
                    <?php foreach($data as $survey){?>
                    <h1><?php echo $survey->title?></h1>
                    <p><?php echo $survey->description?></p>
                    <div class="survey-buttons">
                        <a href="<?php echo URLROOT;?>/surveys/survey_list/<?php echo $survey->id?>">View</a>
                        <a href="<?php echo URLROOT;?>/surveys/edit_survey/<?php echo $survey->id?>">Edit</a>
                        <a href="<?php echo URLROOT;?>/surveys/delete_survey/<?php echo $survey->id?>">Delete</a>
                    </div>
                    <?php }?>
                </div>
            </div>
            <a href="<?php echo URLROOT;?>/surveys/add_survey">Add Survey</a>
        </div>
    </div>

<script>
   
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>