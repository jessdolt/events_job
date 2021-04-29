<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Users Add</h1>
    <div class="container">
        <div class="form-container users-form">
        <h1>Users Form</h1>
            <form action="<?php echo URLROOT;?>/users/register" class="form" method="POST" > 
                
                <label for="fName">Full Name</label>
                <input type="text" name="fName">
                <span><?php echo $data['fName_err'];?></span>
                <label for="email">Email</label>
                <input type="email" name="email" >
                <span><?php echo $data['email_err'];?></span>
                <label for="password">Password</label>
                <input type="text" name="password">
                <span><?php echo $data['password_err'];?></span>
                <label for="confirm_password">Confirm Password</label>
                <input type="text" name="confirm_password">
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

