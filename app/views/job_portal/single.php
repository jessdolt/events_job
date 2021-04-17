<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <div class="job-container"> 
            <div class="title-holder">
                <h1 class="job-portal-title">Job Portal</h1>
                <hr>
            </div>


            <div class="job-card-container">
                <div class="job-card">
                    <div class="form-group-single-t">
                        <?php if(empty($data['job']->company_logo)):?>
                            <div class="dummy"></div>
                        <?php else: ?>    
                            <img src="<?php echo URLROOT;?>/company_logo/<?php echo $data['job']->company_logo?>" alt="" class="company_logo">
                        <?php endif; ?>

                        <?php if($data['user_type'] == "Admin" || $data['user_type'] == "Content Creator"): ?>
                        <div class="btn-group">
                            <a href="<?php echo URLROOT;?>/job_portals/edit/<?php echo $data['job']->id?>" class="btn-job-edit">Edit</a>
                            <a href="<?php echo URLROOT;?>/job_portals/delete/<?php echo $data['job']->id?>" class="btn-job-delete">Delete</a>
                        </div>

                        <?php endif; ?>
                    </div>
                   

                    <div class="form-group-single-h">
                        <h1 class="single-title"><?php echo $data['job']->job_title?></h1>
                        <?php if($data['job']->work_status == 'full-time'):  ?>
                            <div class="job-work-status job-work-status--ft ml-small">
                                <?php echo $data['job']->work_status ?>
                            </div>
                        <?php else :?>
                            <div class="job-work-status job-work-status--pt ml-small">
                                <?php echo $data['job']->work_status ?>
                            </div>
                        <?php endif; ?>
                    </div>
                   
                    <div class="form-group-single">
                        <label for="" class="label">Status: </label> <span class="l-content"> <?php echo $data['job']->job_status?></span>
                    </div>
                    <div class="form-group-single">
                    <label for=""  class="label">Company: </label> <span class="l-content">J<?php echo $data['job']->company_name?></span>
                    </div>
                    <div class="form-group-single">
                    <label for=""  class="label">Number of available position(s): </label> <span class="l-content"><?php echo $data['job']->avail_pos?></span>
                    </div>
                    <div class="form-group-single-col">
                        <label for=""  class="label">Description: </label>
                        <div class="editor-content">
                            <span class="text-content"> 
                                 <?php echo $data['job']->description?>
                            </span>
                      
                        </div>
                    </div>

                    <div class="form-group-single-col">
                        <label for=""  class="label">Qualifications:</label>
                        <div class="editor-content">
                            <span class="text-content"> 
                            <?php echo $data['job']->others?>
                            </span>
                        </div>               
                     </div>
                </div>
                
            </div>

            <a href="<?php echo URLROOT;?>/job_portals" class="btn-link btn-job">Back to jobs</a>
        </div>
    </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>