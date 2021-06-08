<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Group</h1>
    
    <div class="root">
        <div class="group-nav">
        <div class="add-batch">
             <a href="<?php echo URLROOT;?>/sideNav/new_dept">Add New Department</a>
        </div>
        <div class="add-dept">
            <a href="<?php echo URLROOT;?>/sideNav/new_course">Add New Course</a>
        </div>
        <div class="add-batch">
             <a href="<?php echo URLROOT;?>/sideNav/new_batch">Add New Batch</a>
        </div>
        </div>
    </div>
                <?php foreach($data['department'] as $dept):?>
                    <h3><?php echo $dept->department_name?></h3>
                    <?php foreach($data['courses'] as $course):?>
                        <ul class="groupList">
                            <?php if($course->department_id == $dept->id):?>
                            <li class="group">
                                <button class="groupHeader">    
                                   <?php echo $course->course_name?>
                                </button>
                                <ul class="subGroupList">
                                    <?php foreach($data['classification'] as $class):?>
                                        <?php if($course->id == $class->course_id):?>
                                            <li class="subGroup">
                                                <a href="#"><?php echo $class->year?></a>
                                            </li>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                            <?php endif;?>
                        </ul>
                    <?php endforeach;?>
                <?php endforeach;?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
