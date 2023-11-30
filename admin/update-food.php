<?php

// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');

// Disable error reporting and displaying errors
// Setting it to 0 means no errors will be reported.
error_reporting(0);

// error control operator
// PHP will not display error messages directly on the web page.
@ini_set('display_errors', 0);

?>

<?php
// Query to fetch orders with 'Pending' or 'Processing' status from tbl_eipay
$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);


// Query to fetch online orders with 'Pending' or 'Processing' status from order_manager
$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);


// Query to fetch food items with stock less than 50 from tbl_food
$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);


// Message Notification
// Query to fetch unread messages from the 'message' table
$message_notif = "SELECT message_status FROM message
				 WHERE message_status = 'unread'";
$res_message_notif = mysqli_query($conn, $message_notif);
$row_message_notif = mysqli_num_rows($res_message_notif);

?>

<?php
//CHeck whether id is set or not 
if (isset($_GET['id'])) {
    //Get all the details
    $id = $_GET['id'];

    //SQL Query to Get the Selected Food
    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    //execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Get the value based on query executed
    $row2 = mysqli_fetch_assoc($res2);

    //Get the Individual Values of Selected Food
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $stock = $row2['stock'];
    $active = $row2['active'];
} else {
    //Redirect to Manage Food
    header('location:' . SITEURL . 'manage-food.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Include custom CSS file for styling -->
    <link rel="stylesheet" href="style-admin.css">
    <link rel="icon" type="image/png" href="../images/logo1.jpg">

    <title>Haus 7 Cafe Admin</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="index.php" class="brand">
            <div class="centered-image">
                <img src="../images/logo1.jpg" width="130px" alt="">
            </div>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="manage-admin.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Admin Panel</span>
                </a>
            </li>
            <li>
                <a href="manage-online-order.php">

                    <!-- Icon for a shopping cart -->
                    <i class='bx bxs-cart'></i>

                    <!-- Text for the link -->
                    <span class="text">Online Orders&nbsp;</span>

                    <!-- Notification count display -->
                    <?php

                    // Check if there are online order notifications
                    if ($row_online_order_notif > 0) {
                    ?>
                        <!-- Display the notification count if greater than 0 -->
                        <span class="num-ei"><?php echo $row_online_order_notif; ?></span>
                    <?php
                    } else {
                    ?>
                        <!-- Display an empty span if there are no notifications -->
                        <span class=""> </span>
                    <?php
                    }
                    ?>
                </a>
            </li>

            <li>
                <a href="tableorder-menu.php">
                    <i class='bx bx-qr-scan'></i>
                    <span class="text">Take Table Order</span>
                </a>
            </li>

            <li>
                <a href="manage-ei-order.php">
                    <!-- Icon for a QR code scan -->
                    <i class='bx bx-qr-scan'></i>

                    <!-- Text for the link -->
                    <span class="text">Eat In Orders&nbsp;&nbsp;&nbsp;</span>

                    <!-- Notification count display -->
                    <?php
                    // Check if there are Eat In order notifications
                    if ($row_ei_order_notif > 0) {
                    ?>
                        <!-- Display the notification count if greater than 0 -->
                        <span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
                    <?php
                    } else {
                    ?>
                        <!-- Display an empty span if there are no notifications -->
                        <span class=""> </span>
                    <?php
                    }
                    ?>

                </a>
            </li>
            <li>
                <a href="manage-category.php">
                    <i class='bx bxs-category'></i>
                    <span class="text">Category</span>
                </a>
            </li>
            <li class="active">
                <a href="manage-food.php">
                    <i class='bx bxs-food-menu'></i>
                    <span class="text">Food Menu</span>
                </a>
            </li>
            <li class="">
                <a href="inventory.php">
                    <i class='bx bxs-box'></i>
                    <span class="text">Inventory</span>
                </a>
            </li>
            <li class="">
                <a href="feedback.php">
                    <i class='bx bxs-box'></i>
                    <span class="text">Coupon & Feedback</span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <!-- Hamburger menu icon -->
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">
                </div>
            </form>

            <!-- User-related content -->
            <div class="bx.bx-menu">

                <?php
                // Check if the user is logged in as an admin
                if (isset($_SESSION['user-admin'])) {
                    // Retrieve and display the username
                    $username = $_SESSION['user-admin'];

                ?>
                <!-- Dropdown menu for the logged-in user -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username; ?></a>
                    </div>
                <?php

                } else {
                    // If the user is not logged in, display an alert and redirect to the login page
                ?>
                    echo "<script>
                        alert('Please login');
                        window.location.href = 'login.php';
                    </script>";

                <?php

                }
                ?>
            </div>

            <!-- Message notifications -->
            <div class="fetch_message">

            <!-- Container for message-related content -->
                <div class="action_message notfi_message">

                <!-- Link to messages.php with an envelope icon -->
                    <a href="messages.php"><i class='bx bxs-envelope'></i></a>

                    <?php
                    // Check if there are unread messages
                    if ($row_message_notif > 0) {
                    ?>
                    <!-- Display the number of unread messages -->
                        <span class="num"><?php echo $row_message_notif; ?></span>
                    <?php

                    } else {
                    ?>
                    <!-- Display an empty span if there are no unread messages -->
                        <span class=""></span>
                    <?php

                    }
                    ?>

                </div>

            </div>
            <div class="notification">
                <div class="action notif">

                <!-- Bell icon with a click event to toggle a menu (using JavaScript function menuToggle()) -->
                    <i class='bx bxs-bell' onclick="menuToggle();"></i>

                    <!-- Notification menu -->
                    <div class="notif_menu">
                        <ul>
                            <?php
                            // Display a notification if items are running out of stock
                            if ($row_stock_notif > 0 and $row_stock_notif != 1) {
                            ?>
                                <li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Items are running out of stock</li></a>
                            <?php
                            } else if ($row_stock_notif == 1) {
                            ?>
                                <li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Item is running out of stock</li></a>
                            <?php
                            } else {
                            }

                            // Display a notification for new online orders
                            if ($row_ei_order_notif > 0) {
                            ?>
                                <li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
                            <?php

                            }

                            // Display a notification for new Eat In orders
                            if ($row_online_order_notif > 0) {
                            ?>
                                <li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;New Eat In Order</li></a>
                            <?php

                            }
                            ?>

                        </ul>
                    </div>

                    <!-- Display the total number of notifications if there are any -->
                    <?php
                    if ($row_stock_notif > 0 || $row_online_order_notif > 0 || $row_ei_order_notif > 0) {
                        $total_notif = $row_online_order_notif + $row_ei_order_notif + $row_stock_notif;
                    ?>

                        <span class="num"><?php echo $total_notif; ?></span>
                    <?php
                    } else {
                    ?>
                    <!-- Display an empty span if there are no notifications -->
                        <span class=""></span>
                    <?php
                    }
                    ?>
                    </a>
                </div>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Update Menu Item</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="" href="manage-food.php">Food Menu</a>
                        </li>
                        <li>
                            <a class="active" href="manage-admin.php">Update</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">

                        <form action="" method="POST" enctype="multipart/form-data">

                            <table class="">

                                <tr>
                                    <td>Title</td>
                                    <td>
                                        <input type="text" name="title" value="<?php echo $title; ?>" id="ip2">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea id="ip2">
                </td>
            </tr>

            <tr>
                <td>Price</td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>" id="ip2">
                </td>
            </tr>

            <tr>
                <td>Current Image</td>
                <td>
                    <?php
                    if ($current_image == "") {
                        //Image not Available 
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                        //Image Available
                    ?>
                            <img src="<?php echo SITEURL; ?>../images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                            ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category</td>
                <td>
                    <select name="category">

                        <?php
                        //Query to Get ACtive Categories
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Check whether category available or not
                        if ($count > 0) {
                            //CAtegory Available
                            while ($row = mysqli_fetch_assoc($res)) {
                                $category_title = $row['title'];
                                $category_id = $row['id'];

                                //echo "<option value='$category_id'>$category_title</option>";
                        ?>
                                    <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            } else {
                                //CAtegory Not Available
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                                    ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if ($featured == "Yes") {
                                echo "checked";
                            } ?> type="radio" name="featured" value="Yes"> Yes 
                    <input <?php if ($featured == "No") {
                                echo "checked";
                            } ?> type="radio" name="featured" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Stock</td>
                <td>
                    <input type="number" name="stock" value="<?php echo $stock; ?>" id="ip2">
                </td>
            </tr>

            <tr>
                <td>Active</td>
                <td>
                    <input <?php if ($active == "Yes") {
                                echo "checked";
                            } ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if ($active == "No") {
                                echo "checked";
                            } ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="button-8" role="button">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php

        if (isset($_POST['submit'])) {
            //echo "Button Clicked";

            //1. Get all the details from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];

            $featured = $_POST['featured'];
            $stock = $_POST['stock'];
            $active = $_POST['active'];

            //2. Upload the image if selected

            //CHeck whether upload button is clicked or not
            if (isset($_FILES['image']['name'])) {
                //Upload BUtton Clicked
                $image_name = $_FILES['image']['name']; //New Image NAme

                //CHeck whether th file is available or not
                if ($image_name != "") {
                    //IMage is Available
                    //A. Uploading New Image

                    //REname the Image
                    $ext = end(explode('.', $image_name)); //Gets the extension of the image

                    $image_name = "Food-Name-" . rand(0000, 9999) . '.' . $ext; //THis will be renamed image

                    //Get the Source Path and DEstination PAth
                    $src_path = $_FILES['image']['tmp_name']; //Source Path
                    $dest_path = "../images/food/" . $image_name; //DEstination Path

                    //Upload the image
                    $upload = move_uploaded_file($src_path, $dest_path);

                    /// CHeck whether the image is uploaded or not
                    if ($upload == false) {
                        //FAiled to Upload
                        $_SESSION['upload'] = "<div class='error text-center'>Failed to Upload New Image.</div>";
                        //REdirect to Manage Food 
                        header('location:' . SITEURL . 'manage-food.php');
                        //Stop the Process
                        die();
                    }
                    //3. Remove the image if new image is uploaded and current image exists
                    //B. Remove current Image if Available
                    if ($current_image != "") {
                        //Current Image is Available
                        //REmove the image
                        $remove_path = "../images/food/" . $current_image;

                        $remove = unlink($remove_path);

                        //Check whether the image is removed or not
                        if ($remove == false) {
                            //failed to remove current image
                            $_SESSION['remove-failed'] = "<div class='error text-center'>Failed to remove current image.</div>";
                            //redirect to manage food
                            header('location:' . SITEURL . 'manage-food.php');
                            //stop the process
                            die();
                        }
                    }
                } else {
                    $image_name = $current_image; //Default Image when Image is Not Selected
                }
            } else {
                $image_name = $current_image; //Default Image when Button is not Clicked
            }



            //4. Update the Food in Database
            $sql3 = "UPDATE tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    stock = '$stock',
                    active = '$active'
                    WHERE id=$id
                ";

            //Execute the SQL Query
            $res3 = mysqli_query($conn, $sql3);

            //CHeck whether the query is executed or not 
            if ($res3 == true) {
                //Query Exectued and Food Updated
                $_SESSION['update'] = "<div class='success text-center'>Food Updated Successfully.</div>";
                header('location:' . SITEURL . 'manage-food.php');
            } else {
                //Failed to Update Food
                $_SESSION['update'] = "<div class='error text-center'>Failed to Update Food.</div>";
                header('location:' . SITEURL . 'manage-food.php');
            }
        }

        ?>

			


	
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    <!-- Include the script-admin.js file -->
	<script src="script-admin.js"></script>
</body>
</html>