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

			<li class="active">
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

					<!-- Page title -->
					<h1>Update Eat In Order</h1>

					<!-- Breadcrumb navigation -->
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-ei-order.php">Eat In Orders</a>
						</li>
					</ul>
				</div>
			</div>

			<br>

			<?php

			// Retrieve ID from the URL
			$id = $_GET['id'];

			// SQL query to fetch details of the specified Eat In Order
			$sql = "SELECT * FROM tbl_eipay WHERE id=$id";
			$res = mysqli_query($conn, $sql);

			if ($res == true) {
				// Check the number of rows returned
				$count = mysqli_num_rows($res);

				if ($count == 1) {

					// Fetch details of the Eat In Order
					$row = mysqli_fetch_assoc($res);

					$table_id = $row['table_id'];
					$amount = $row['amount'];
					$tran_id = $row['tran_id'];
					$order_date = $row['order_date'];
					$payment_status = $row['payment_status'];
					$order_status = $row['order_status'];
				}
				
				else {

					// Redirect to manage Eat In Orders page if no or multiple records found
					header('location:' . SITEURL . 'manage-ei-order.php');
				}
			}

			?>

			<div class="table-data">
				<div class="order">
					<div class="head">

						<!-- More secure for sensitive data because the data is not exposed in the URL. -->
						<form action="" method="POST">

							<table class="rtable">
								<tr>
									<td>Table ID</td>
									<td>
										<input type="text" name="table_id" value="<?php echo $table_id; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Amount</td>
									<td>
										<input type="text" name="amount" value="<?php echo $amount; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Transaction ID</td>
									<td>
										<input type="text" name="tran_id" value="<?php echo $tran_id; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Order Date</td>
									<td>
										<input type="text" name="order_date" value="<?php echo $order_date; ?>" id="ip2">
									</td>
								</tr>

								<tr>
									<td>Payment Status</td>
									<td>

									<!-- Dropdown menu for selecting payment status -->
										<select name="payment_status">
											<option <?php if ($payment_status == "Pending") {
														echo "selected";
													} ?> value="Pending">Pending</option>
											<option <?php if ($payment_status == "successful") {
														echo "selected";
													} ?> value="successful">successful</option>
										</select>

									</td>
								</tr>
								<tr>
									<td>Order Status</td>
									<td>

									<!-- Dropdown menu for selecting order status -->
										<select name="order_status">
											<option <?php if ($order_status == "Pending") {
														echo "selected";
													} ?> value="Pending">Pending</option>
											<option <?php if ($order_status == "Processing") {
														echo "selected";
													} ?> value="Processing">Processing</option>
											<option <?php if ($order_status == "Delivered") {
														echo "selected";
													} ?> value="Delivered">Delivered</option>
											<option <?php if ($order_status == "Cancelled") {
														echo "selected";
													} ?> value="Cancelled">Cancelled</option>
										</select>
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<!-- Hidden input field for the order ID -->
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<!-- Submit button for updating the order -->
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

			// Check whether the Submit button is clicked or not
			if (isset($_POST['submit'])) {

				// Get all the values from the form to update
				$id = $_POST['id'];
				$table_id = $_POST['table_id'];
				$amount = $_POST['amount'];
				$tran_id = $_POST['tran_id'];
				$order_date = $_POST['order_date'];
				$payment_status = $_POST['payment_status'];
				$order_status = $_POST['order_status'];
				
				// SQL query to update the Eat In Order
				$sql = "UPDATE tbl_eipay SET
					table_id = '$table_id',
					amount = '$amount',
					tran_id = '$tran_id',
					order_date = '$order_date',
					payment_status = '$payment_status',
					order_status = '$order_status' 
					WHERE id='$id'
				";

				// Execute the SQL query
				$res = mysqli_query($conn, $sql);

				if ($res == true) {

					// If the update is successful, set success message and redirect to the management page
					$_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
					header('location:' . SITEURL . 'manage-ei-order.php');
				}
				
				else {
					// If the update fails, set error message and redirect to the management page
					$_SESSION['update'] = "<div class='error'>Failed to Update Order</div>";
					header('location:' . SITEURL . 'manage-ei-order.php');
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