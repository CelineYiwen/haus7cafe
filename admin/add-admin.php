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

//Message Notification
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
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style-admin.css">
	<link rel="icon" type="image/png" href="../images/logo1.jpg">

	<title>Haus 7 Cafe Admin</title>
</head>

<body>

	<section id="sidebar">
		<a href="index.php" class="brand">
			<div class="centered-image">
				<img src="../images/logo1.jpg" width="190px" alt="">
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
				<a href="manage-category.php">
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

	<section id="content">
		<nav>
			<!-- Hamburger menu icon -->
			<i class='bx bx-menu'></i>

			<a href="#" class="nav-link"></a>
			<form action="#">
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
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Add Admin</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Admin Panel</a>
						</li>
						<li>
							<a class="active" href="add-admin.php">Add Admin</a>
						</li>
					</ul>
					<?php

					if (isset($_SESSION['add'])) {
						echo $_SESSION['add'];
						unset($_SESSION['add']);
					}
					?>
				</div>
			</div>
			<br>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<!-- More secure for sensitive data because the data is not exposed in the URL. -->
						<form action="" method="POST">
							<table class="rtable-center">
								<tr>
									<td>Full Name</td>
									<td><input type="text" name="full_name" id="ip2" required></td>

								</tr>
								<tr>
									<td>Username</td>
									<td><input type="text" name="username" id="ip2" required></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" id="ip2" required></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" value="Add Admin" class="button-8" role="button">
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
		</main>
	</section>
	<script src="script-admin.js"></script>
</body>

</html>


<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check if the password meets security requirements
	if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $password)) {

		// Check if the username already exists in the database
		$check_duplicate = "SELECT username FROM tbl_admin WHERE username = '$username'";
		$res_check_duplicate = mysqli_query($conn, $check_duplicate);
		$rows_check_duplicate = mysqli_num_rows($res_check_duplicate);

		// If the username already exists, display an alert and redirect
		if ($rows_check_duplicate > 0) {
			echo "<script>alert('Username already exists! Try a different username.'); window.location.href='add-admin.php';</script>";
		}
		
		else {
			// Hash the password using MD5 encryption
			$hashedPassword = md5($password);

			// Insert new admin into the database
			$sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$full_name', '$username', '$hashedPassword')";
			$res = mysqli_query($conn, $sql) or die(mysqli_error());

			// Check if the insertion was successful and redirect accordingly
			if ($res == true) {
				$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
				header("location:" . SITEURL . 'manage-admin.php');
			} else {
				$_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
				header("location:" . SITEURL . 'add-admin.php');
			}
		}
	}
	
	else {
		// If the password does not meet the security requirements, display an alert and redirect
		echo "<script>alert('Your password does not meet the security requirements. Please revise it to meet the password criteria.'); window.location.href='add-admin.php';</script>";
	}
}


?>