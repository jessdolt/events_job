<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Alumni</h1>
                <hr>
            </div>
            <div class="job-card-container">
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Batch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $alumni){?>
                        <tr>
                            <td><?php echo $alumni[0]?></td>
                            <td><?php echo $alumni[2] .' ' .$alumni[3] . ' '. $alumni[1]?></td>
                            <td><?php echo $alumni[5]?></td>
                            <td><?php echo $alumni[4]?></td>
                            <td><?php echo $alumni[8]?></td>
                            <td><?php echo $alumni[9]?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>   
            </div>
            
            <form action="<?php echo URLROOT;?>/alumni/add" method='POST' enctype="multipart/form-data" class="hidden_form">
                    <?php foreach($data as $key => $value){?>
                        <input type="hidden" name="alumni[<?php echo $key?>][student_no]" value="<?php echo $value[0]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][last_name]" value="<?php echo $value[1]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][first_name]" value="<?php echo $value[2]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][middle_name]" value="<?php echo $value[3]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][gender]" value="<?php echo $value[4]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][email]" value="<?php echo $value[5]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][contact_no]" value="<?php echo $value[6]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][employment]" value="<?php echo $value[7]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][department]" value="<?php echo $value[8]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][batch]" value="<?php echo $value[9]?>">
                    <?php }?>
                    <button style="visibility:hidden;" id="hidden_btn_submit">Submit</button>
            </form>
            
            <a href="#" class="btn-link btn-job" style="margin-bottom: 10px;" id='btn-save-form'>Save</a>
            <a href="<?php echo URLROOT;?>/alumni/index" class="btn-link btn-job">Cancel</a>
        </div>
    </div>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
        <script>
            const hiddenBtnSubmit = document.getElementById('hidden_btn_submit');
            const btnSubmit = document.getElementById('btn-save-form');
            btnSubmit.addEventListener('click',function(){
                hiddenBtnSubmit.click();
            })
        </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>