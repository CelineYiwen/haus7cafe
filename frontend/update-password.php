<?php

// Include the constants.php file
include('config/constants.php');

// Set the default time zone to Asia/Kuala_Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    // User is not logged in
    // Redirect to the login page with a message
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel</div>";
    header('location:' . SITEURL . 'login.php');
}

// Check if the user is logged in
if (isset($_SESSION['user'])) {

    // Get the username from the session
    $username = $_SESSION['user'];

    // Fetch user details from the database based on the username
    $fetch_user = "SELECT * FROM tbl_users WHERE username = '$username'";
    $res_fetch_user = mysqli_query($conn, $fetch_user);

    // Loop through the result set to retrieve user details
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
    <title>Haus 7 Cafe - Categories</title>
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
                        <a href="categories.php" class="nav-item nav-link active">Categories</a>
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        <a href="contact.php " class="nav-item nav-link">Contact</a>
                    </div>

                    <?php
                    if (isset($_SESSION['user'])) {
                        // If the user is logged in, display a dropdown with account options
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
                        // If the user is not logged in, display a "Login" link
                    ?>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    <?php

                    }
                    ?>

                    <?php
                    // Count the items in the cart
                    $count = 0;

                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }

                    ?>

                    <!-- Display a link to the shopping cart with the cart count -->
                    <a href="mycart.php" class="btn btn-primary py-2 px-4"><i class="fas fa-shopping-cart"></i><span> Cart <?php echo $count; ?></span></a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-1">
                <div class="container text-center my-2 pt-4 pb-1">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="myaccount.php">My Account</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <div class="container bootstrap snippets bootdey">
            <div class="row">

                <div class="table-data">
                    <div class="order">
                        <div class="head">

                            <form action="" method="POST">
                                <table class="tbl-30">
                                    <tr>
                                        <td>Current Password</td>
                                        <td>
                                            <input type="password" name="current_password" id="ip2">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>New Password</td>
                                        <td>
                                            <input type="password" name="new_password" id="ip2"> <br>

                                            <label style="color: red;">* Password must contain the following:<br />
                                                One lowercase letter,<br />
                                                One capital (uppercase) letter,<br />
                                                A number,<br />
                                                A special symbol,<br />
                                                Minimum 8 characters long.<br />
                                            </label>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Confirm Password</td>
                                        <td>
                                            <input type="password" name="confirm_password" id="ip2">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                                            <input type="submit" name="submit" value="Change Password" class="button-8" role="button">
                                        </td>
                                    </tr>

                                </table>

                            </form>

                        </div>
                    </div>
                </div>

                <?php
                // Check whether the submit button is clicked or not
                if (isset($_POST['submit'])) {

                    // Get the data from the form
                    $username = $_POST['username'];
                    $current_password = md5($_POST['current_password']);
                    $new_password = md5($_POST['new_password']);
                    $confirm_password = md5($_POST['confirm_password']);

                    // Check if the new password meets security requirements
                    if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $new_password)) {

                        // Check if the current password matches the one in the database
                        $update_password = "SELECT * FROM tbl_users WHERE username='$username' AND password='$current_password'";
                        $res_update_password = mysqli_query($conn, $update_password);

                        if ($res_update_password == true) {
                            $count = mysqli_num_rows($res_update_password);

                            if ($count == 1) {
                                // Check if the new password and confirm password match
                                if ($new_password == $confirm_password) {

                                    // Update the password in the database
                                    $sql2_update_password = "UPDATE tbl_users SET password = '$new_password' WHERE username='$username'";
                                    $res2_update_password = mysqli_query($conn, $sql2_update_password);

                                    if ($res2_update_password == true) {
                                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                                        header('location:' . SITEURL . 'myaccount.php');
                                    } else {
                                        $_SESSION['pwd-not-match'] = "<div class='error'>Failed to Change Password. Try Again Please.</div>";
                                        header('location:' . SITEURL . 'myaccount.php');
                                    }
                                } else {
                                    $_SESSION['pwd-not-match'] = "<div class='error'>Passwords Did Not Match. Try Again Please.</div>";
                                    header('location:' . SITEURL . 'myaccount.php');
                                }
                            } else {
                                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                                header('location:' . SITEURL . 'admin/myaccount.php');
                            }
                        }
                    } else {
                        // Display an error if the new password does not meet the security requirements
                        $_SESSION['pwd-not-match'] = "<div class='error'>Your password does not meet the security requirements. Please revise it to meet the password criteria.</div>";
                        header('location:' . SITEURL . 'myaccount.php');
                    }
                }
                ?>

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