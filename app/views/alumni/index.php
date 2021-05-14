<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Alumni</h1>
                <hr>
            </div>



                 <form action="<?php echo URLROOT;?>/alumni/preview" method="POST" enctype="multipart/form-data">
                    <input type="file" name="csv_file" id="" accept=".csv">
                    <input type="submit" name="submit" value="Import"> 
                 </form>  


            <div class="job-card-container">
                <table>
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Batch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $alumni){?>
                            <tr>
                                <td><?php echo $alumni->student_no?></td>
                                <td><?php echo $alumni->first_name . ' ' . substr($alumni->middle_name,0,1).'.' . ' ' . $alumni->last_name ?></td>
                                <td><?php echo $alumni->email?></td>
                                <td><?php echo $alumni->gender?></td>
                                <td><?php echo $alumni->department?></td>
                                <td><?php echo $alumni->batch?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                     </table>       
            </div>

            <a href="<?php echo URLROOT;?>/alumni/preview" class="btn-link btn-job">Add Alumni</a>
        </div>
    </div>
    <script>
            CKEDITOR.replace( 'editor1' );
        </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>