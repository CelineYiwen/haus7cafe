<?php

// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');

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
			<li class="active">
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
				<a href="manager-category.php">
					<i class='bx bxs-category'></i>
					<span class="text">Category</span>
				</a>
			</li>
			<li>
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
					<h1>Update Coupon Claim</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Update Coupon Claim</a>
						</li>
					</ul>
				</div>

			</div>

			<?php
			//1. Get the ID of Selected Admin
			$id = $_GET['id'];

			//2. Create SQL Query to get the details 
			$sql = "SELECT * FROM tbl_feedback WHERE id=$id";

			//3. Execute the Query

			$res = mysqli_query($conn, $sql);

			//Check whether the query is executed or not

			if ($res == true) {
				//Check whether the data is available or not
				$count = mysqli_num_rows($res);
				//Check whether we have coupon data or not
				if ($count == 1) {
					//Get the Details
					$row = mysqli_fetch_assoc($res);

					$username = $row['username'];
					$coupon_code = $row['coupon_code'];
					$claim_indicator = $row['claim_indicator'];
				} else {
					header('location:' . SITEURL . 'feedback.php');
				}
			}



			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

					<!-- Form for updating user and coupon information -->
						<form action="" method="POST">
							<table class="rtable">
								<!-- Input field for Username -->
								<tr>
									<td>Username</td>
									<td>
										<input type="text" name="username" value="<?php echo $username; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<!-- Input field for Coupon Code -->
									<td>Coupon Code</td>
									<td>
										<input type="text" name="coupon_code" value="<?php echo $coupon_code; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<!-- Dropdown for Coupon Status -->
									<td>Coupon Status</td>
									<td>
										<!-- Options for different coupon statuses with conditional 'selected' attribute -->
										<select name="claim_indicator">
											<option <?php if ($claim_indicator == "Active") {
														echo "selected";
													} ?> value="Active">Active</option>
											<option <?php if ($claim_indicator == "Claimed") {
														echo "selected";
													} ?> value="Claimed">Claimed</option>
											<option <?php if ($claim_indicator == "Cancelled") {
														echo "selected";
													} ?> value="Cancelled">Cancelled</option>
										</select>
									</td>
								</tr>

								<!-- Hidden input field for storing the coupon code -->
								<tr>
									<td colspan="2">
										<input type="hidden" name="coupon_code" value="<?php echo $coupon_code; ?>">

										<!-- Submit button for updating the information -->
										<input type="submit" name="submit" value="Update" class="button-8" role="button">
									</td>
								</tr>

							</table>



						</form>
					</div>
				</div>
			</div>
			</div>

			<?php
			//Check whether the Submit button is clicked or not

			if (isset($_POST['submit'])) {

				// Get values from the form for updating
				$coupon_code = $_POST['coupon_code'];
				$claim_indicator = $_POST['claim_indicator'];

				// Creating SQL Query to update coupon in the 'tbl_feedback' table
				$sql = "UPDATE tbl_feedback SET
					claim_indicator = '$claim_indicator'
					WHERE coupon_code = '$coupon_code'";


				//Executing the Query
				$res = mysqli_query($conn, $sql);

				//Check whether the query is successfully executed or not
				if ($res == true) {

					// Query executed successfully, update session message
					$_SESSION['update'] = "<div class='success'>Coupon Updated Successfully</div>";

					// Redirect to the feedback page
					header('location:' . SITEURL . 'feedback.php');
				} else {
					// Failed to update coupon, update session message
					$_SESSION['update'] = "<div class='error'>Failed to Update Coupon</div>";

					// Redirect to the feedback page
					header('location:' . SITEURL . 'feedback.php');
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