<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <div class="survey-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Survey Form</h1>
                <hr>
            </div>
            <div class="">
                <form action="" id="manage_survey" method="POST">
                    <input type="text" name="user_id" value="<?php echo $data['user_id']?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" row="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn-survey-save" id="btn-save">Save</button>
                    </div>
                </form>

                <div id="insert_here">
                
                </div>
            </div>
        </div>
    </div>

    <?php include 'modal_survey'?>
<script>
    $(document).ready(function(){
        $('#manage_survey').submit(function(e){
            e.preventDefault();
            console.log('asd' + $('#manage_survey').serialize());
            $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/check',
                data: $('#manage_survey').serialize(),
                method: 'POST',
                type: 'POST',
                success:function(res){
                    console.log(res);
                    if(res == 1){
                        location.replace('<?php echo URLROOT;?>/surveys');
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>