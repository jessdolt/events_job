<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="job-container">
            <div class="title-holder">
                <h1 class="job-portal-title">Galleries</h1>
                <hr>
            </div>
           
            <div class="job-card-container ">
                <?php foreach($data['gallery'] as $gal):?>
                    <div class="album-card" >
                            <div class="option-container">
                                <span class="optionSpan">&#8942</span>
                                <div class="option hide-option" >
                                    <a href="<?php echo URLROOT;?>/galleries/editGallery/<?php echo $gal->id?>">Edit Album</a>
                                    <button class="change-cover" data-id="<?php echo $gal->id?>">Change Cover Photo</button>
                                    <a href="<?php echo URLROOT;?>/galleries/deleteGallery/<?php echo $gal->id?>">Delete Gallery</a>
                                </div>
                            </div>
                            <?php foreach($data['images'] as $img):?>
                            <?php if($gal->id == $img->gallery_id):?>
                                <?php if($img->isCover == 1):?>
                                <img src="<?php echo URLROOT;?>/uploads/<?php echo $img->image?>" alt="">
                                <?php endif;?>
                            <?php endif;?>
                            <?php endforeach;?>
                            <div class="text-overlay"><?php echo $gal->gallery_title?></div>
                    </div>
                <?php endforeach;?>
            </div>


            <a href="<?php echo URLROOT;?>/galleries/new_gallery" class="btn-link btn-job">Add new Job</a>
        </div>
    </div>

 
    <div id="coverP_modal"></div>
    <script>

        $(document).ready(function(){
            //console.log($('#manage-sort').serialize());
            $('.ui-sortable').sortable({
                update: function( ) {
                    
                }
            })
        })

        spanFocus()
        function spanFocus(){
            const btnOption = document.querySelectorAll('.optionSpan');

            btnOption.forEach(option => option.addEventListener('click', function(){
                const optionGroup = option.nextElementSibling;
                option.classList.toggle('optionSpanActive');
                optionGroup.classList.toggle('hide-option');
            }))
        }
       

        
        // function changeCover(){
        //     const btnChangeCover = document.querySelectorAll('.change-cover');
        //     const newCoverModal = document.getElementById('coverP_modal');
        //     btnChangeCover.forEach(btnChange => btnChange.addEventListener('click', function(){
        //         var gallery_id = btnChange.dataset.id;
        //         $.ajax({ 
        //             url:'/galleries/changeCover',
        //             data: { gid: gallery_id },
        //             method: 'POST',
        //             type: 'POST',
        //             success:function(res){
        //                 newCoverModal.innerHtml = res;
        //                 previewCover();
        //             }, 
        //             error: function(er){
        //                 console.log(er);
        //             }
        //         })
        //     }))

        // }

        $('.change-cover').click(function(){
            $('.option').addClass('hide-option');
            var gallery_id = $(this).attr('data-id');
                 $.ajax({ 
                    url:'<?php echo URLROOT;?>/galleries/showChangeModal',
                    data: { gid: gallery_id },
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        $('#coverP_modal').html(res);
                        previewCover();
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                })
        })



    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>