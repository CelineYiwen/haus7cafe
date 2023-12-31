<?php include('config/constants.php'); ?>

<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    // Set a message for users who are not logged in
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel</div>";

    // Redirect to the login page
    header('location:' . SITEURL . 'login.php');
}


// Check if the user is logged in
if (isset($_SESSION['user'])) {

    // Retrieve user information from the database based on the logged-in username
    $username = $_SESSION['user'];
    $fetch_user = "SELECT * FROM tbl_users WHERE username = '$username'";
    $res_fetch_user = mysqli_query($conn, $fetch_user);

    // Loop through the result set to fetch user details
    while ($rows = mysqli_fetch_assoc($res_fetch_user)) {
        $id = $rows['id'];
        $name = $rows['name'];
        $email = $rows['email'];
        $add1 = $rows['add1'];
        $city = $rows['city'];
        $phone = $rows['phone'];
        $username = $rows['username'];
        $password = $rows['password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Haus 7 Cafe</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo SITEURL; ?>" class="navbar-brand p-0">

                    <img src="../images/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="categories.php" class="nav-item nav-link">Categories</a>
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        <a href="contact.php " class="nav-item nav-link">Contact</a>
                    </div>

                    <?php
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user'];

                    ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username; ?></a>
                            <div class="dropdown-menu m-0">
                                <a href="myaccount.php" class="dropdown-item">My Account</a>
                                <a href="feedback.php" class="dropdown-item">Submit Feedback</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    <?php

                    }
                    ?>
                    <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }

                    ?>
                    <a href="mycart.php" class="btn btn-primary py-2 px-4"><i class="fas fa-shopping-cart"></i><span> Cart <?php echo $count; ?></span></a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-1">
                <div class="container text-center my-2 pt-4 pb-1">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="myaccount.php">My Account</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="profile-nav col-md-3">
                    <div class="panel">
                        <div class="user-heading round">
                            <a href="myaccount.php">
                                <img src="../images/avatar.png" alt="">
                            </a>
                            <h1><?php echo $name; ?></h1>

                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="update-account.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                            <li><a href="view-orders.php"> <i class="fa fa-edit"></i> View Orders</a></li>
                            <li><a href="update-password.php"> <i class="fa fa-edit"></i> Change Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="profile-info col-md-9">

                    <div class="panel">

                        <div class="table-data">
                            <div class="order">
                                <div class="head">
                                </div>
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Total</th>
                                            <th>Order</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // Query to select orders from the order_manager table for a specific username, ordered by order_id in descending order
                                        $query = "SELECT * FROM `order_manager` WHERE username='$username' ORDER BY order_id DESC";

                                        // Execute the query and store the result in $user_result
                                        $user_result = mysqli_query($conn, $query);

                                        // Loop through each row in the result set
                                        while ($user_fetch = mysqli_fetch_assoc($user_result)) {

                                            // Extract information for each order
                                            $order_id = $user_fetch['order_id'];
                                            $cus_name = $user_fetch['cus_name'];
                                            $cus_email = $user_fetch['cus_email'];
                                            $cus_add1 = $user_fetch['cus_add1'];
                                            $cus_phone = $user_fetch['cus_phone'];
                                            $payment_status = $user_fetch['payment_status'];
                                            $order_status = $user_fetch['order_status'];
                                            $total_amount = $user_fetch['total_amount'];
                                        ?>

                                            <!-- Display each order in a table row -->
                                            <tr>
                                                <td><?php echo $order_id; ?></td>

                                                <!-- Display payment status with appropriate styling -->
                                                <td>
                                                    <?php
                                                    if ($payment_status == "successful") {
                                                        echo "<span class='status completed'>$payment_status</span>";
                                                    } else if ($payment_status == "Processing") {
                                                        echo "<span class='status pending'>$payment_status</span>";
                                                    }

                                                    ?>
                                                </td>

                                                <!-- Display order status with appropriate styling -->
                                                <td>
                                                    <?php
                                                    if ($order_status == "Pending") {
                                                        echo "<span class='status process'>$order_status</span>";
                                                    } else if ($order_status == "Processing") {
                                                        echo "<span class='status pending'>$order_status</span>";
                                                    } else if ($order_status == "Delivered") {
                                                        echo "<span class='status completed'>$order_status</span>";
                                                    } else if ($order_status == "Cancelled") {
                                                        echo "<span class='status cancelled'>$order_status</span>";
                                                    }

                                                    ?>

                                                </td>

                                                <!-- Display total amount for the order -->
                                                <td><?php echo $total_amount; ?></td>

                                                <!-- Display a nested table for order details -->
                                            <?php
                                            echo "
                            <td>
                                <table class=''>
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                                            // Query to select items for the current order from the online_orders_new table
                                            $order_query = "SELECT * FROM `online_orders_new` WHERE `order_id`='$user_fetch[order_id]' ORDER BY order_id DESC ";
                                            $order_result = mysqli_query($conn, $order_query);

                                            // Loop through each row in the result set and display item details
                                            while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                                                echo "
                                        <tr>
                                            <td>$order_fetch[Item_Name]</td>
                                            <td>$order_fetch[Price]</td>
                                            <td>$order_fetch[Quantity]</td>
                                         
                                        </tr>
                                    ";
                                            }

                                            echo "
                                </tbody>
                                </table>
                            </td>
                        </tr>
                        
                        ";
                                        }

                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>


    <!-- Categories Start -->
    <div class="container">
        <div class="row"></div>
    </div>
    <!-- Categories End  -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Pages</h4>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact Details</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No 7446-H Jalan Kampung, Jalan Puchong Batu 14, 47100 Puchong, Selangor.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>017 - 428 8332</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><a href="mailto: haus7.cafe@gmail.com">haus7.cafe@gmail.com</a></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Haus7cafe"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/haus7cafe/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Business Hours</h4>
                    <p>Monday : Closed</p>
                    <p>Tuesday to Friday : 9:00 am - 5:30 pm</p>
                    <p>Saturday & Sunday : 8:00 am - 5:30 pm</p>
                    <p>&#42;Kitchen Last Call : 4:30 pm</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <?php echo date('F Y'); ?> <a class="border-bottom" href="#">Haus 7 Cafe</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>