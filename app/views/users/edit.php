<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Users Edit</h1>
    <div class="container">
        <div class="form-container users-form">
        <h1>Users Form</h1>
            <form action="<?php echo URLROOT;?>/users/edit" class="form" method="POST" > 
                
                <label for="fName">Full Name</label>
                <input type="text" name="fName" value="<?php echo $data['fName']?>">
                <span><?php echo $data['fName_err'];?></span>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $data['email']?>">
                <span><?php echo $data['email_err'];?></span>
                <label for="password">Password</label>
                <input type="text" name="password" value="<?php echo $data['password']?>">
                <span><?php echo $data['password_err'];?></span>
                <label for="confirm_password">Confirm Password</label>
                <input type="text" name="confirm_password" value="<?php echo $data['password']?>">
                <span><?php echo $data['confirm_password_err'];?></span>

                <label for="email">User Type</label>
                
                <select name="user_type" id="">
                    <?php foreach($data['user_type'] as $user_type){?>
                        <option value="<?php echo $user_type->id?>"><?php echo $user_type->user_control?></option>
                    <?php }?>   
                </select>

                <input type="submit" value="Submit" class="btn" name="submit">
            </form>
        </div>

    </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>

