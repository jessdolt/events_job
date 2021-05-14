<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Group</h1>

    <div class="root">
        <div class="group-nav">
        <div class="add-batch">
             <h3>Add Batch</h3>
            <form action="<?php echo URLROOT;?>/sidenav/new_batch" method="POST">
              <label for="dept_code">Batch Year</label>
                <input type="text" name="batch">
                <input type="submit" value='Submit'>
            </form>
        </div>
    </div>
        

<?php require APPROOT . '/views/inc/footer.php'; ?>
