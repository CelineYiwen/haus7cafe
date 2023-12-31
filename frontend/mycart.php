<?php include('config/constants.php'); ?>

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

                <!-- Navbar Items -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="categories.php" class="nav-item nav-link">Categories</a>
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>

                    <?php
                    // Check if a user is logged in
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user'];
                    ?>

                        <!-- Dropdown menu for logged-in user -->
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

                        <!-- Login link for non-logged-in users -->
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    <?php

                    }
                    ?>


                    <?php
                    // Count items in the cart
                    $count = 0;
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }

                    ?>

                    <!-- Cart button -->
                    <a href="mycart.php" class="btn btn-primary py-2 px-4"><i class="fas fa-shopping-cart"></i><span> Cart <?php echo $count; ?></span></a>

                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-1">
                <div class="container text-center my-2 pt-4 pb-1">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12"></div>

                <!-- Cart Table -->
                <div class="col-lg-9 table-responsive">
                    <table class="table" id="cart_table">
                        <thead class="text-center">

                            <!-- Table Header -->
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php

                            $item_price = 0;
                            $total_amount = 0;

                            // Check if the cart session is set
                            if (isset($_SESSION['cart'])) {

                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $item_price = $value['Price'] * $value['Quantity'];
                                    $total_amount = $total_amount + $item_price;

                                    $sn = $key + 1;

                                    // Display each item in the cart as a table row
                                    echo "
                                    
                                        <tr>
                                            <td>$sn</td>
                                            <td>$value[Item_Name]</td>
                                            <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                            <td>
                                                <form action='manage-cart.php' method='POST'>
                                                    <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min = '1' max = '20'>
                                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                                </form>
                                            </td>

                                            <td class='itotal'></td>
                                            
                                            <td>
                                                <form action='manage-cart.php' method='POST'>
                                                    <button name='Remove_Item' class='btn btn-danger btn-sm'>REMOVE</button>
                                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- End of Cart Table -->


                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4">
                        <h4 class="text-center">Total</h4>
                        <h2 class="text-center" id="gtotal"></h2>


                        <br>

                        <?php
                        // Check if a user is logged in
                        if (isset($_SESSION['user'])) {
                            $username = $_SESSION['user'];

                            // Fetch user details from the database
                            $fetch_user = "SELECT * FROM tbl_users WHERE username = '$username'";
                            $res_fetch_user = mysqli_query($conn, $fetch_user);

                            // Loop through the user data
                            while ($rows = mysqli_fetch_assoc($res_fetch_user)) {
                                $username = $rows['username'];
                                $cus_name = $rows['name'];
                                $cus_email = $rows['email'];
                                $cus_add1 = $rows['add1'];
                                $cus_city = $rows['city'];
                                $cus_phone = $rows['phone'];
                            }

                            // Check if the cart session is set and has items
                            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        ?>

                                <?php
                                // Generate a unique transaction ID

                                error_reporting(0);
                                date_default_timezone_set('Asia/Kuala_Lumpur');

                                // Function to generate a random string
                                function rand_string($length)
                                {
                                    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                                    $size = strlen($chars);
                                    for ($i = 0; $i < $length; $i++) {
                                        $str .= $chars[rand(0, $size - 1)];
                                    }

                                    return $str;
                                }

                                // Generate a random string of length 10 for the transaction ID
                                $cur_random_value = rand_string(10);

                                ?>


                                <form action="purchase.php" method="POST">
                                    <!-- Hidden fields for transaction details -->
                                    <div class="form-group">
                                        <input type="hidden" name="amount" value="<?php echo $total_amount; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="tran_id" value="ONL-PAY-<?php echo "$cur_random_value"; ?>" class="form-control">
                                    </div>

                                    <!-- Delivery Address Form -->
                                    <div class="form-group">
                                        <h4 class="text-center">Delivery Address</h4>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $cus_name; ?></label>
                                        <input type="hidden" name="cus_name" value="<?php echo $cus_name; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $cus_email; ?></label>
                                        <input type="hidden" name="cus_email" value="<?php echo $cus_email; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $cus_add1; ?></label>
                                        <input type="hidden" name="cus_add1" value="<?php echo $cus_add1; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $cus_city; ?></label>
                                        <input type="hidden" name="cus_city" value="<?php echo $cus_city; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $cus_phone ?></label>
                                        <input type="hidden" name="cus_phone" value="<?php echo $cus_phone; ?>" class="form-control" min='1' required>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" name="payment_status" value="pending" class="form-control">
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" name="username" value="<?php echo $username; ?>" class="form-control">
                                    </div>

                                    <br>
                                    <a href="update-account.php">Change Shipping Address</a>
                                    
                                    <br><br>

                                    <!-- Payment Mode Selection -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay_mode" value="amrpay" id="flexRadioDefault1" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Pay With CASH
                                        </label>
                                    </div>
                                    <br>

                                    <!-- Creating Session Variables --->
                                    <?php

                                    $_SESSION['amount'] = $total_amount;
                                    ?>

                                    <!-- Creating Session Variables --->

                                    <!-- Checkout Button -->
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <button class="btn btn-primary btn-lg" name="purchase">Checkout</button>
                                </form>
                            <?php



                            }
                        }
                        
                        else {
                            // User not logged in
                            echo "Please login to place order";
                            ?>
                            <a href="login.php">Login</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script>
        
        // Initialize variables
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var igtotal = document.getElementById('gtotal');

        // Function to calculate and update subtotal
        function subTotal() {
            gt = 0;

            // Loop through each item
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

                // Update the grand total
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }

            // Update the grand total display
            gtotal.innerText = gt;
        }

        // Call the subTotal function on page load
        subTotal();

    </script>

</body>

</html>