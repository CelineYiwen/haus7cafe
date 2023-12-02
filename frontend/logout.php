<?php 

// Including constants.php for SITEURL
include('config/constants.php');

// 1. Destroy the session

// Unset the 'user' session variable
unset($_SESSION['user']);

// 2. Redirect to the login page

// Use the header function to redirect to the login page using the SITEURL constant
header('location:'.SITEURL.'index.php');

?>