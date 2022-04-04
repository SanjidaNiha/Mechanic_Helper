<?php
    //start the session
    session_start();
    //create constants forstoring non repeating values
    define('SITEURL','http://localhost/MH-website/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'mh-web');

//execute query and save data in database
       $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error()); //database connection
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error()); //selecting database
?>