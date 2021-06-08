<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Gallery</h1>

    <a href="<?php echo URLROOT;?>/galleries"> RUN IT BACK!</a>
        <!-- <div class="multi-img-container" >
            <div class="cover-photo">
                <img src="" alt="" id="cover-photo">
            </div>
        </div> -->


    <div class="multi-img-container" id="parent-img-box">
        <?php foreach($data['images'] as $image):?>
            <div class = "multi-img" data-img-id="<?php echo $image->id ?>">
                <span class="eks-set-img">X</span>
                <img src="<?php echo URLROOT;?>/uploads/<?php echo $image->image?>" alt="">
                <label for="">Description</label>
                <input type="text" class="set-description" value="<?php echo $image->description?>">
            </div>
        <?php endforeach;?>
    </div>


    <div class="container">
        <div class="form-container">

        <h1>Edit Gallery</h1>
            <form action="" class="form" id="multi-img-form" method="POST" enctype="multipart/form-data">
                <!-- <label for="events_images">Cover Photo</label>
                <input type="file" accept="image/*" id="fileUploadCoverPhoto">
                
                <div class='radio-container'>
                    <div class="radio-group">
                        <label for="yes">Yes</label>
                        <input type="radio" name="isUploadMore" value="yes" class="yes"> 
                    </div>
                    <div class="radio-group">
                        <label for="no">No</label> 
                        <input type="radio" name="isUploadMore" value="no" class="no"> 
                    </div>
                </div> -->
                <input type="text" id="gallery-id" value="<?php echo $data['gallery']->id ?>">
                <input type="file" name="e_images[]" accept="image/*"  id="fileUpload" multiple>

                <label for="">Gallery Title</label>
                <input type="text" id="gallery-title" value="<?php echo $data['gallery']->gallery_title?>"required >
            
                <button>Save Gallery</button>
            </form>
        </div>
    </div>
    
       
    <script> 

        $('.eks-set-img').click(function(){
            var img_id =  $(this.parentNode).attr('data-img-id');
          
            if(confirm('Are you sure you want to delete this photo?')){
                $.ajax({ 
                url:'<?php echo URLROOT;?>/galleries/deleteImage',
                data: {image_id: img_id}, 
                method: 'POST',
                type: 'POST',
                success:function(res){
                    if(res == 1){
                        location.reload();
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
            }
        })

        $('.set-description').change(function(){
            var img_id = $(this.parentNode).attr('data-img-id');
            var newDesc = $(this).val();
            $.ajax({ 
                url:'<?php echo URLROOT;?>/galleries/editDesc',
                data: {image_id: img_id, description: newDesc}, 
                method: 'POST',
                type: 'POST',
                success:function(res){
                    if(res == 1){
                        location.reload();
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })



        const fileUpload = document.getElementById('fileUpload');
        const parentImgBox = document.getElementById('parent-img-box');
        
        const reader = new FileReader();
        let filesArr = new Array();

        fileUpload.addEventListener('change',function(event){
             
            let files = event.target.files;
             for(let i = 0; i < files.length; i++){
                const reader = new FileReader();

                let newImgBox = document.createElement('div');
                newImgBox.classList.add('multi-img');

                let img = document.createElement('img');
                let spanEks = document.createElement('span');
                spanEks.textContent = 'X';
                spanEks.classList.add('eks-img');

                let labelBox = document.createElement('label');
                labelBox.appendChild(document.createTextNode('Description'));

                let descBox = document.createElement('input');
                descBox.setAttribute('type','text');
                descBox.setAttribute('id', 'description' + i);

                newImgBox.append(spanEks);
                newImgBox.append(img);
                newImgBox.append(labelBox);
                newImgBox.append(descBox);

                parentImgBox.append(newImgBox);

                reader.readAsDataURL(files[i]);
                reader.addEventListener('load',function(event){
                    img.src=event.target.result;
                    img.alt=files[i].name;
                })
                
                filesArr.push(files[i]);

               //end loop 
            }
            btnCancel(); 
            console.log(filesArr);   
        }) 
        
      
        function btnCancel(){
            const btnEks = document.querySelectorAll('.eks-img');
            btnEks.forEach(eks => eks.addEventListener('click', function(){
            const parentEl = eks.parentNode;
            const imgName = eks.nextElementSibling.alt;
                filesArr.forEach((file,index) =>{
                    if(file.name == imgName){
                        filesArr.splice(index,1);
                    }
                });
                parentEl.remove();
            }))
        }

        
        $('#multi-img-form').submit(function(e){
             e.preventDefault();
             let descArr = new Array();
             
             var newFData = new FormData();
             var g_id = $('#gallery-id').val();
             var g_title = $('#gallery-title').val();
            
             for(var i = 0; i < filesArr.length; i++){
                let tempDesc =  $('#description'+i).val();
                descArr.push(tempDesc);
             }

             var newDescArr = JSON.stringify(descArr);

             filesArr.forEach((file,index) => newFData.append(`${index}`,file));

             newFData.append('gallery_id', g_id);
             newFData.append('gallery_title', g_title);            
             newFData.append('descriptions', newDescArr);

            $.ajax({ 
                url:'<?php echo URLROOT;?>/galleries/multi_edit',
                data: newFData, 
                cache: false,
		        contentType: false,
		        processData: false,
                method: 'POST',
                type: 'POST',
                success:function(res){
                    if(res == 1){
                        location.replace('<?php echo URLROOT;?>/galleries');
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })


        // function coverPhotoPreview(){
        //     const coverPhotoUpload = document.getElementById('fileUploadCoverPhoto');
        //     const coverPhotoBox = document.getElementById('cover-photo');
        //     const reader = new FileReader();

        //     coverPhotoUpload.addEventListener('change', function(event){
        //         const files = event.target.files;
        //         const file = files[0];
        //         reader.readAsDataURL(file);
        //         reader.addEventListener('load', function(event){
        //             coverPhotoBox.src = event.target.result;
        //             coverPhotoBox.alt = file.name; 
        //         })   
        //     })
        // }
        
        // coverPhotoPreview(); 
        
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

