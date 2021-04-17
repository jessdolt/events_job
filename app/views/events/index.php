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
                            <li><a href="<?php echo URLROOT;?>/events/edit/<?php echo $events->id?>" class="btn btn-edit">Edit</a><a href="<?php echo URLROOT;?>/events/delete/<?php echo $events->id?>"class="btn btn-delete">Delete</a></li>
                        </ul>
                    <?php }?>  
                </div>
            </div>
            <a class="btn-link btn-new" href="<?php echo URLROOT;?>/events/eventAdd">Add New Event</button>
        </div>
    </div>
   
<?php require APPROOT . '/views/inc/footer.php'; ?>