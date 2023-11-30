<?php

// Include necessary files and configurations
include('../frontend/config/constants.php');

// Unset the user-admin session variable to log out the user
//session_destroy();
unset($_SESSION['user-admin']);

// Redirect to the login page after logging out
header('location:'.SITEURL.'login.php');

?>