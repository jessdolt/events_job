<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="root">
        <div class="events-container">
            <h1 class="event-title">All Events</h1>
            <div class="events">
                <div class="event-header">
                    <ul class="event-head-ul">
                        <li class="event-head">Title</li>
                        <li class="event-head">Description</li>
                        <li class="event-head">Image</li>
                        <li class="event-head">Edit</li>
                    </ul>
                </div>
                <div class="event">
                    <ul class="event-head-ul">
                        <li>Pup Event</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi cum adipisci nesciunt. Aliquam nulla quia nemo necessitatibus iure repudiandae voluptatibus.</li>
                        <li><img src=""></li>
                        <li><a class="btn btn-edit">Edit</a><a class="btn btn-delete">Delete</a></li>
                    </ul>
                </div>
            </div>

            <button class="btn btn-new">Add New Event</button>
        </div>
    </div>
   
<?php require APPROOT . '/views/inc/footer.php'; ?>