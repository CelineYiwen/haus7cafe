<?php

// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');

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

							// Display a notification for new Eat In orders
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;new EI order</li></a>
							<?php

							}
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
					<h1>Change Password</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Manage Admin</a>
						</li>
						<li>
							<a class="active" href="manage-admin.php">Change Password</a>
						</li>
					</ul>
				</div>

			</div>
			<?php
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}

			?>
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
										<input type="password" name="new_password" id="ip2">
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
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="submit" name="submit" value="Change Password" class="button-8" role="button">
									</td>
								</tr>
							</table>

							<label style="color: red;">* Password must contain the following:<br />
								One lowercase letter,<br />
								One capital (uppercase) letter,<br />
								A number,<br />
								A special symbol,<br />
								Minimum 8 characters long.<br />
							</label>

						</form>

					</div>
				</div>
			</div>
			
			<?php
			//Check whether the submit button is clicked or not
			if (isset($_POST['submit'])) {

				// Get form data
				$id = $_POST['id'];
				$current_password = $_POST['current_password'];
				$new_password = $_POST['new_password'];
				$confirm_password = $_POST['confirm_password'];

				// Check if the new password meets security requirements
				if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $new_password)) {

					// Query to check if the provided current password is correct
					$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='" . md5($current_password) . "'";
					$res = mysqli_query($conn, $sql);

					if ($res == true) {
						// Count the number of rows returned
						$count = mysqli_num_rows($res);

						// If true, it means that exactly one matching user was found in the database.
						if ($count == 1) {

							// Check if the new and confirm passwords match
							if ($new_password == $confirm_password) {
								$hashedNewPassword = md5($new_password);

								// Update the password in the database
								$sql2 = "UPDATE tbl_admin SET password = '$hashedNewPassword' WHERE id=$id";
								$res2 = mysqli_query($conn, $sql2);

								if ($res2 == true) {
									// Password changed successfully
									$_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
									header('location:' . SITEURL . 'manage-admin.php');
								}
								
								else {
									// Failed to update the password
									$_SESSION['pwd-not-match'] = "<div class='error'>Failed to Change Password. Try Again Please.</div>";
									header('location:' . SITEURL . 'manage-admin.php');
								}
							}
							
							else {
								// New and confirm passwords do not match
								$_SESSION['pwd-not-match'] = "<div class='error'>Passwords Did Not Match. Try Again Please.</div>";
								header('location:' . SITEURL . 'manage-admin.php');
							}
						}
						
						else {
							// User not found
							$_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
							header('location:' . SITEURL . 'manage-admin.php');
						}
					}
					
					else {
						// Failed to verify the current password
						$_SESSION['change-pwd'] = "<div class='error'>Failed to verify the current password. Try Again Please.</div>";
						header('location:' . SITEURL . 'manage-admin.php');
					}
				}
				
				else {
					// Password does not meet security requirements
					$_SESSION['pwd-not-match'] = "<div class='error'>Your password does not meet the security requirements. Please revise it to meet the password criteria.</div>";
					header('location:' . SITEURL . 'manage-admin.php');
				}
			}
			
			?>
			
		</div>
	
	</main>
	<!-- MAIN -->

	</section>
	<!-- CONTENT -->
	
	<!-- Include the script-admin.js file -->
	<script src="script-admin.js"></script>
</body>

</html>