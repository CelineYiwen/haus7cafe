
<?php

// Authorization - Access Control
// Check whether the user is logged in or not
if(!isset($_SESSION['user-admin'])) //If user session is not set
{

    // If user session is not set, indicating the user is not logged in
    // Redirect to the login page with a message

    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel</div>";
    header('location:'.SITEURL.'login.php');
}

// If the user session is set, the user is considered logged in and can access the Admin Panel

?>