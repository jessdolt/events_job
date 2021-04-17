<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Event Edit</h1>

    <div class="container">
        <div class="form-container">

        <h1>Events Form</h1>
            <form action="<?php echo URLROOT;?>/events/edit/<?php echo $data['id'];?>" class="form" method="POST" enctype="multipart/form-data">

                <img src="<?php echo URLROOT;?>/uploads/<?php echo $data['file']?>" alt="" class="img_box" id="myImg">

                <input type="file" id="fileUpload" name="fileUpload" accept="image/*" > 

                <span><?php echo $data['file_err'];?></span>

                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $data['title']?>">

                <span><?php echo $data['title_err'];?></span>
                <label for="description">Description</label>

                <textarea name="description" cols="30" rows="10"><?php echo $data['description']?> </textarea>
                <span><?php echo $data['description_err'];?></span>

                <input type="text" name="isUploaded" id="hiddenBool">

                <input type="submit" value="Submit" class="btn" name="submit">
            </form>
        </div>
    </div>
    

    <script> 
        const fileUpload = document.getElementById('fileUpload');
        const img_box = document.getElementById('myImg');
        const reader = new FileReader();

        const uploadInput = document.getElementById('hiddenBool');

        fileUpload.addEventListener('change',function(event){
            const files = event.target.files;
            const file = files[0];
            reader.readAsDataURL(file);
            reader.addEventListener('load', function(event){
                img_box.src = event.target.result;
                img_box.alt = file.name; 
            })     
            isUploaded();
        }) 

        function isUploaded(){
            if(fileUpload.files.length == 0){
                uploadInput.value = 0;
            }
            else{
                uploadInput.value = 1;
            }
        }

        isUploaded();
       


    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

