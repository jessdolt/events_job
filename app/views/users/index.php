<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>

    <div class="root">
        <div class="container">
            <div class="events-container">
                <h1 class="job-portal-title">Users</h1>
                <div class="users">
                    <div class="users-header">
                            <ul class="users-head-ul">
                                <li class="users-head">id</li>
                                <li class="users-head">name</li>
                                <li class="users-head">user type</li>
                                <li class="users-head">buttons</li>
                            </ul>
                    </div>
                    
                    <?php foreach($data as $user){?>
                    <div class="user">
                            <ul class="users-head-ul">
                                <li class="user-data"><?php echo $user->userId?></li>
                                <li class="user-data"><?php echo $user->name?></li>
                                <li class="user-data"><?php echo $user->user_control?></li>
                                <li class="user-data"><a href="<?php echo URLROOT;?>/users/edit/<?php echo $user->userId?>">Edit</a><a href="<?php echo URLROOT;?>/users/delete/<?php echo $user->userId?>">Delete</a></li>
                            </ul>    
                    </div>
                    <?php }?>

                </div>
                <a class="btn-link btn-new" href="<?php echo URLROOT;?>/users/register">Add New User</button>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>