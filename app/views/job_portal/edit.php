<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Edit Portal</h1>
                <hr>
            </div>
        
            <div class="job-card-container">
                <div class="job-card">
                    <form action="<?php echo URLROOT;?>/job_portals/edit/<?php echo $data['id']?>" class="form-job" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                            <label for="company_logo">Company Logo</label>
                             <img src="<?php echo URLROOT;?>/company_logo/<?php echo $data['company_logo']?>" alt="" class="img_box" id="myImg">
                             <input type="file" id="fileUpload" name="fileUpload" accept="image/*"> 
                             <span><?php echo $data['company_logo_err']?></span>
                             
                        </div>
                        <div class="form-group">
                            <label for="work_status">Work Status</label> 
                            <select name="work_status" class="work-status" value="<?php echo $data['work_status']?>">
                                <option value="full-time" <?php if($data['work_status']=="full-time") echo 'selected="selected"'; ?>>Full Time</option>
                                <option value="part-time" <?php if($data['work_status']=="part-time") echo 'selected="selected"'; ?>>Part Time</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="job_status">Job Post Status</label>
                            <select name="job_status" class="job_status">
                                <option value="active" <?php if($data['job_status']=="active") echo 'selected="selected"'; ?>>Active</option>
                                <option value="archived" <?php if($data['job_status']=="archived") echo 'selected="selected"'; ?>>Archived</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="avail_pos">Available Position</label>
                            <input type="number" name="avail_pos" value="<?php echo $data['avail_pos']?>">
                            <?php echo $data['avail_pos_err']?>
                        </div>

                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" name="company_name" value="<?php echo $data['company_name']?>">
                            <?php echo $data['company_name_err']?>
                        </div>

                        <div class="form-group">
                            <label for="job_title">Job Title</label>
                            <input type="text" name="job_title" value="<?php echo $data['job_title']?>">
                            <span><?php echo $data['job_title_err']?></span>
                        </div>

                        <div class="form-group">
                            <label for="job_description">Job Description</label>
                            <textarea name="job_description" class="editor-field"><?php echo $data['job_description']?></textarea>
                           
                        </div>

                        <div class="form-group">
                            <label for="others">Others</label>
                            <textarea name="others" class="editor-field"><?php echo $data['others']?></textarea>
                        </div>

                        <input type="text" name="isUploaded" id="hiddenBool">

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
           
        </div>
    </div>

    <script> 
        const fileUpload = document.getElementById('fileUpload');
        const img_box = document.getElementById('myImg');
        const reader = new FileReader();
        const uploadInput = document.getElementById('hiddenBool');
        fileUpload.addEventListener('change',function(event){
            const files = event.target.files;
            const file = files[0];
            reader.readAsDataURL(file);
            reader.addEventListener('load', function(event){
                img_box.src = event.target.result;
                img_box.alt = file.name; 
            })     
            isUploaded();
        }) 
        function isUploaded(){
            if(fileUpload.files.length == 0){
                uploadInput.value = 0;
            }
            else{
                uploadInput.value = 1;
            }
        }

        isUploaded();
       

        
    </script>
    <script>
            CKEDITOR.replace( 'job_description' );
            CKEDITOR.replace( 'others' );
            CKEDITOR.config.height = '40vh';
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>