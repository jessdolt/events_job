<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT;?>/pages/index">Run it back!!</a>
    <div class="root">
        <div class="events-container">
            <h1 class="event-title">All Events</h1>
            <div class="events">
                <div class="event-header">
                    <ul class="event-head-ul">
                        <li class="event-head">Title</li>
                        <li class="event-head">Description</li>
                        <li class="event-head">Image</li>
                        <li class="event-head">Date & Time</li>
                        <li class="event-head">Edit</li>
                    </ul>
                </div>
                    
    
                <div class="event">
                    <?php foreach($data as $events){?>
                        <ul class="event-head-ul">
                            <li><?php echo $events->title?></li>
                            <li><?php echo $events->description?></li>
                            <li><img src="./uploads/<?php echo $events->image?>" alt="" class="event-img"></li>
                            <li><?php echo $events->data_time?></li>
                            <li><a href="<?php echo URLROOT;?>/events/edit/<?php echo $events->id?>" class="btn btn-edit">Edit</a>
                            <button id="btn-del" data-id="3" data-url="events">Delete</button>
                        </ul>
                    <?php }?>  
                </div>
            </div>
            <a class="btn-link btn-new" href="<?php echo URLROOT;?>/events/add">Add New Event</button>
        </div>
    </div>
   
   <div class="bg-modal">
        <div class="modal">
            <div class="modal-container">
                    <a href="#" id="btn-cancel">Cancel</a>
                    <a href="ARGOX OBOB" id="btn-del-modal">Delete</a>
            </div>        
        </div>
   </div>

   <script>
        eventModal();
        function eventModal(){
            const btnCancel = document.getElementById('btn-cancel');
            const delModal = document.querySelector('.bg-modal');

            btnCancel.addEventListener('click', function(){
                delModal.classList.remove('--active');
            })
        }
     
        function eventDelete($id,$type){
            console.log($id);
            const btnDel = document.getElementById('btn-del');
            const delModal = document.querySelector('.bg-modal');
            let btnDelModal = document.getElementById('btn-del-modal');
            let delHref = btnDelModal.getAttribute('href');

           
            delModal.classList.add('--active');
            
            let newHref = '<?php echo URLROOT;?>/events/delete/'+ $id;
            
            btnDelModal.setAttribute('href',newHref);
            console.log(btnDelModal.getAttribute('href'));
        }

   </script>


<?php require APPROOT . '/views/inc/footer.php'; ?>