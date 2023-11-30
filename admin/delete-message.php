<?php 

// Including the constant file and login-check file
include('../frontend/config/constants.php');
include('login-check.php');

// Get the 'id' parameter from the URL
$id = $_GET['id'];

// SQL query to delete the message from the database
$sql = "DELETE FROM message WHERE id=$id";

// Execute the query
$res = mysqli_query($conn, $sql);

// Check whether the query executed successfully or not
if($res == true) {

    // Set a success message in session
    $_SESSION['delete'] = "<div class='success'>Message Deleted Successfully</div>";

    // Redirect to the messages page
    header('location:'.SITEURL.'messages.php');
}

else{

    // Set an error message in session
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Message</div>";

    // Redirect to the messages page
    header('location:'.SITEURL.'messages.php');
}


?>