<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title']?></h1>
    <div class="container">
        <a href="<?php echo URLROOT;?>/events" class="nav-link">Events</a>
        <a href="<?php echo URLROOT;?>/job_portals" class="nav-link">Job Portal</a>
        <a href="<?php echo URLROOT;?>/users" class="nav-link">Users</a>
        <a href="<?php echo URLROOT;?>/surveys" class="nav-link">Survey</a>
        <a href="<?php echo URLROOT;?>/alumni" class="nav-link">Alumni</a>
        <a href="<?php echo URLROOT;?>/sideNav" class="nav-link">Side Nav</a>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

