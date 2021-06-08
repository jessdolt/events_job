<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Group</h1>

    <div class="root">
        <div class="group-nav">
        <div class="add-dept">
            <h3>Add Department</h3>
            <form action="<?php echo URLROOT;?>/SideNav/new_dept" method="POST">
                <label for="dept_name">Department Name</label>
                <input type="text" name="dept_name">
                <input type="submit" value='Submit'>
            </form>
        </div>
    </div>
        

<?php require APPROOT . '/views/inc/footer.php'; ?>
