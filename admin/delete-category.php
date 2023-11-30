<?php

    // Include necessary configuration and login-check files
    include('../frontend/config/constants.php');
    include('login-check.php');

    // Check if both 'id' and 'image_name' parameters are set in the URL
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // Get 'id' and 'image_name' from the URL
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Check if 'image_name' is not empty
        if($image_name != "")
        {
            // Construct the path to the category image
            $path = "../images/category/".$image_name;

            // Attempt to remove the category image file
            $remove = unlink($path);

            // Check if the removal was unsuccessful
            if($remove==false)
            {
                // Set an error message in session and redirect
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                header('location:'.SITEURL.'manage-category.php');
                die();
            }
        }

    // SQL query to delete the category from the database
    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

        // Check if the deletion was successful
        if($res==true)
        {
            // Set a success message in session and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            header('location:'.SITEURL.'manage-category.php');
        }
        else
        {
            // Set an error message in session and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            header('location:'.SITEURL.'manage-category.php');
        }
    }
    else
    {
        // Redirect if 'id' or 'image_name' parameters are not set in the URL
        header('location:'.SITEURL.'manage-category.php');
    }
?>