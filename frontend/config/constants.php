<?php 


// Starting output buffering and session
ob_start();         // to capture output before it is sent to the browser.
session_start();    // to store data across multiple pages for a particular user.

// Creating constant to store non repeating values
// Constants for site URL and database connection
define('SITEURL', '');


// Database connection constants
// Database connection parameters & settings (configuration)
define('LOCALHOST', 'localhost');       //  Database server host name
define('DB_USERNAME', 'root');          //  Database username
define('DB_PASSWORD', '');              //  Database password
define('DB_NAME', 'haus7cafe');         //  Database name

    // Attempt to establish a connection to the database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    // Select the specified database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>