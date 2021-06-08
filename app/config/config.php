<?php 
    //DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '12345');
    define('DB_NAME', 'events');


    //App Root
    define('APPROOT',dirname(dirname(__FILE__)));
    define('IMAGEROOT', dirname(dirname(dirname(__FILE__))). '\public\uploads\\');

    //Url Root
    define('URLROOT', 'http://localhost/events_pup');
    
    //Site Name
    define('SITENAME', 'Events');