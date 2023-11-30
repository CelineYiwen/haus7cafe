<?php 

// Including the constant file and login-check file
include('../frontend/config/constants.php');
include('login-check.php');


// Get the 'id' parameter from the URL
$id = $_GET['id'];

// SQL query to delete the admin from the database
$sql = "DELETE FROM tbl_admin WHERE id=$id";


//Execute the query
$res = mysqli_query($conn, $sql);

//Check whether the query executed succesfully or not

if($res == true){

    // Set an error message in session
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

    // Redirect to the manage admin page
    header('location:'.SITEURL.'manage-admin.php');
}
else{

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin</div>";
    header('location:'.SITEURL.'manage-admin.php');
}

//3. Redirect to manage admin page with message(Succuess/error)



?>