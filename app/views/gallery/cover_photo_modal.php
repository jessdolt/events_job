
    <div class="bg-photoModal">
        <div class="photoModal">
            <div class="modal-header">
                <h3>Choose Cover Photo</h3> 
                <span id="btnCoverClose">&#10006;</span>
            </div>
            <hr>
            <div class="cover-container">
                <?php foreach($data['images'] as $image):?>
                <div class="cover-photo <?php echo ($image->isCover == 1) ? '--selected': '' ?>" data-img-id="<?php echo $image->id?>" data-gal-id="<?php echo $image->gallery_id?>">
                    <img src="<?php echo URLROOT;?>/uploads/<?php echo $image->image?>" alt="" >
                </div>
                <?php endforeach;?>
            </div>
        </div> 
    </div>

            
    <script>
        $('.cover-photo').click(function(){
         
            var img_id = $(this).attr('data-img-id');
            var gal_id = $(this).attr('data-gal-id');
            
            $.ajax({ 
                url:'<?php echo URLROOT;?>/galleries/changeCover',
                data: { 
                    image_id: img_id, 
                    gallery_id : gal_id},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    if(res == 1){
                        location.reload();
                    }
                    // $('#new_modal').html(res);
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })

        $('.up_vote').click(function(){
         
            var upvote = $(this).attr('data-img-id');
            
            
            $.ajax({ 
                url:'<?php echo URLROOT;?>/forum/addUpVote',
                data: { 
                    : img_id, 
                    gallery_id : gal_id},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    if(res == 1){
                        location.reload();
                    }
                    // $('#new_modal').html(res);
                }, 
                error: function(er){
                    console.log(er);
                }
            })
     })
    </script>