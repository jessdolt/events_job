<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Event Add</h1>
    <div class="container">
        <div class="form-container">

        <h1>Events Form</h1>
            <form action="<?php echo URLROOT;?>/events/add" class="form" method="POST" enctype="multipart/form-data">
                <img src=" " alt="" class="img_box" id="myImg">
                <input type="file" id="fileUpload" name="fileUpload" accept="image/*"> 
                <span><?php echo $data['file_err'];?></span>
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $data['title'];?>">
                <span><?php echo $data['title_err'];?></span>
                <label for="description">Description</label>
                <textarea name="description" cols="30" rows="10"><?php echo $data['description'];?></textarea>
                <span><?php echo $data['description_err'];?> </span>
                <input type="submit" value="Submit" class="btn" name="submit">
            </form>
        </div>
    </div>
    

    <script> 
        const fileUpload = document.getElementById('fileUpload');
        const img_box = document.getElementById('myImg');
        const reader = new FileReader();
        fileUpload.addEventListener('change',function(event){
            const files = event.target.files;
            const file = files[0];
            reader.readAsDataURL(file);
            reader.addEventListener('load', function(event){
                img_box.src = event.target.result;
                img_box.alt = file.name; 
            })     
        }) 
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

