<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Group</h1>

    <div class="root">
        <div class="group-nav">
        <div class="add-dept">
            <h3>Add Course</h3>
            <form action="<?php echo URLROOT;?>/SideNav/new_course" method="POST">
                 <label for="deparment_name">Department</label>

                <select name="dept_id" id="">
                    <?php foreach($data['department'] as $dept):?>   
                        <option value="<?php echo $dept->id?>"><?php echo $dept->department_name?></option>
                    <?php endforeach;?> 
                </select>
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name">
                <label for="course_code">Course Code</label>
                <input type="text" name="course_code">
                <input type="submit" value='Submit'>
            </form>
        </div>
    </div>
        

<?php require APPROOT . '/views/inc/footer.php'; ?>
