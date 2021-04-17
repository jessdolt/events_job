<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Job Portal</h1>
                <hr>
            </div>
        
            <div class="job-card-container">
                <?php foreach($data as $job){?>
                <div class="job-card">
                    <div class="job-card-row">
                        <h4 class="job-title"><?php echo $job->job_title?> &nbsp;[<?php echo $job->avail_pos?>]</h4>

                        <?php if($job->work_status == 'full-time'):  ?>
                            <div class="job-work-status job-work-status--ft">
                                <?php echo $job->work_status ?>
                            </div>
                        <?php else :?>
                            <div class="job-work-status job-work-status--pt">
                                <?php echo $job->work_status ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <h5 class="job-company"><?php echo $job->company_name?></h5>
                    <p class="job-description">
                        <?php 
                             $checkDescription = $job->description;
                             $description = strip_tags($checkDescription);    
                             $str = '';
                             if(strlen($description) > 100){
                                 $str = substr($description,0,99) . '...';
                             } else{
                                 $str = $description;
                             }
                             echo $str;
                            
                        ?>
                    </p>
                    <p class="job-posted">Posted on <?php echo $job->posted_on?></p>
                    <a href="<?php echo URLROOT;?>/job_portals/single/<?php echo $job->id?>" class="job-see_more">See More &#8594;</a> 
                </div>
                <?php }?>
                
            </div>

            <a href="<?php echo URLROOT;?>/job_portals/add" class="btn-link btn-job">Add new Job</a>
        </div>
    </div>
    <script>
            CKEDITOR.replace( 'editor1' );
        </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>