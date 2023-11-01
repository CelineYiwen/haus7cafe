<?php include('config/constants.php'); ?>

<?php 
function getGUIDWithPrefix() {
    mt_srand((double)microtime() * 10000);
    $charid = md5(uniqid(rand(), true));
    $c = unpack("C*", $charid);
    $c = implode("", $c);

    $guid = substr($c, 0, 20);

    return "Free" . $guid;
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


        <!-- Navbar -->
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
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
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
                <div class="container text-center my-3 pt-1 pb-1">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Feedback</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Feedback</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar -->


        <!-- Feedback form Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Feedback Survey</h5>
                    <h1 class="mb-5">We welcome your comments and suggestions.</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="" method="POST">
                                <div class="row g-5">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="often_visit" name="often_visit" required>
                                                <option value="" disabled selected>Select how often you visit</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Rarely">Rarely</option>
                                                <option value="FirstTime">First time</option>
                                            </select>
                                            <label for="often_visit">How often do you visit our restaurant?</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="quality" name="quality" required>
                                                <option value="" disabled selected>Select your rating</option>
                                                <option value="Excellent">Excellent</option>
                                                <option value="VeryGood">Very Good</option>
                                                <option value="Good">Good</option>
                                                <option value="Fair">Fair</option>
                                                <option value="Poor">Poor</option>
                                            </select>
                                            <label for="quality">How would you rate the quality of our food?</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="cleanliness" name="cleanliness" required>
                                                <option value="" disabled selected>Select your rating</option>
                                                <option value="VeryClean">Very Clean</option>
                                                <option value="Clean">Clean</option>
                                                <option value="Neutral">Neutral</option>
                                                <option value="NotSoClean">Not So Clean</option>
                                                <option value="VeryDirty">Very Dirty</option>
                                            </select>
                                            <label for="cleanliness">How would you rate the cleanliness and hygiene of our restaurant?</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="service_satisfaction" name="service_satisfaction" required>
                                                <option value="" disabled selected>Select your satisfaction with service</option>
                                                <option value="VerySatisfied">Very Satisfied</option>
                                                <option value="Satisfied">Satisfied</option>
                                                <option value="Neutral">Neutral</option>
                                                <option value="Dissatisfied">Dissatisfied</option>
                                                <option value="VeryDissatisfied">Very Dissatisfied</option>
                                            </select>
                                            <label for="service_satisfaction">How satisfied are you with the quality of service you received?</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="appreciate" name="appreciate" required>
                                                <option value="" disabled selected>Select the features you appreciate</option>
                                                <option value="FoodQuality">Food quality</option>
                                                <option value="Service">Service</option>
                                                <option value="Ambiance">Ambiance</option>
                                                <option value="Price">Price</option>
                                                <option value="Location">Location</option>
                                            </select>
                                            <label for="appreciate">Which features of our restaurant do you appreciate?</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="If you have additional feedback, please write it here." id="other_feedback" name="other_feedback" style="height: 150px" required></textarea>
                                        <label for="other_feedback">Other Feedback (If Any)</label>
                                    </div>
                                </div>

                                </div>

                                <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit Feedback</button>
                    </div>
                            </form>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
        <!-- Feedback form End -->

        <?php

                if(isset($_POST['submit']))
                {
                    $username = $_SESSION['user'];
                    $often_visit = $_POST['often_visit'];
                    $quality = $_POST['quality'];
                    $cleanliness = $_POST['cleanliness'];
                    $service_satisfaction = $_POST['service_satisfaction'];
                    $appreciate = $_POST['appreciate'];
                    $other_feedback = $_POST['other_feedback'];
                    $coupon_code = getGUIDWithPrefix();
                    $date = date("Y-m-d h:i:sa");
                    $claim_indicator = 'Active';
                    

                    $send_feedback = "INSERT INTO `tbl_feedback`(`username`, `often_visit`, `quality`, `cleanliness`, `service_satisfaction`, `appreciate`, `other_feedback`, `coupon_code`, `date`, `claim_indicator`) VALUES ('$username','$often_visit','$quality','$cleanliness','$service_satisfaction','$appreciate','$other_feedback','$coupon_code','$date','$claim_indicator')";
                    $res_send_feedback = mysqli_query($conn, $send_feedback);

                    if($res_send_feedback == true)
                    {
                        echo "<script>
                            alert('Thank you for your valuable feedback. We appreciate your input, and we are happy to offer you a small free gift as a token of our gratitude. Please claim your free gift at our counter with this code: " . getGUIDWithPrefix() . ". Thanks again for choosing us.'); 
                            window.location.href='feedback.php';
                            </script>";

                    }
                    else
                    {
                        echo "<script>
                            alert('Failed to send feedback'); 
                            window.location.href='feedback.php';
                            </script>";
                    }

                }
        ?>








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