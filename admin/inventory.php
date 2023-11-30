<?php

// Include necessary files and configurations
include('../frontend/config/constants.php');
include('login-check.php');

// Disable error reporting and display for a cleaner output
error_reporting(0);
@ini_set('display_errors', 0);

?>

<?php
// Query to check for pending or processing Eat In Orders
$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);

// Query to check for pending or processing Online Orders
$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);

// Query to check for low stock items
$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);


//Message Notification
// Query to check for unread messages
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
	<!-- My CSS -->
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

			<!-- List item for managing online orders -->
			<li>

			<!-- Link to the manage-online-order.php page -->
				<a href="manage-online-order.php">

				<!-- Icon for online orders -->
					<i class='bx bxs-cart'></i>

					<!-- Text for online orders -->
					<span class="text">Online Orders&nbsp;</span>

					<?php
					// Check if there are notifications for online orders
					if ($row_online_order_notif > 0) {
					?>

					<!-- Display the number of notifications if there are any -->
						<span class="num-ei"><?php echo $row_online_order_notif; ?></span>
					<?php
					} else {
					?>
						<!-- Display an empty space if there are no notifications -->
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

			<!-- List item for managing Eat In orders -->
			<li>

				<!-- Link to the manage-ei-order.php page -->
				<a href="manage-ei-order.php">

					<!-- Icon for Eat In orders -->
					<i class='bx bx-qr-scan'></i>

					<!-- Text for Eat In orders -->
					<span class="text">Eat In Orders&nbsp;&nbsp;&nbsp;

					</span>

					<?php
					// Check if there are notifications for Eat In orders
					if ($row_ei_order_notif > 0) {
					?>
						<!-- Display the number of notifications if there are any -->
						<span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
					<?php
					} else {
					?>
						<!-- Display an empty space if there are no notifications -->
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
			<li class="">
				<a href="manage-food.php">
					<i class='bx bxs-food-menu'></i>
					<span class="text">Food Menu</span>
				</a>
			</li>
			<li class="active">
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
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
				</div>
			</form>
			<div class="bx.bx-menu">
				<?php

				// Check if the user is logged in
				if (isset($_SESSION['user-admin'])) {

					// If logged in, get the username from the session
					$username = $_SESSION['user-admin'];

				?>
					<!-- Display the dropdown menu for the logged-in user -->
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username; ?></a>
					</div>
				<?php
				} else {
					// If not logged in, display an alert and redirect to the login page
				?>
					echo "<script>
						alert('Please login');
						window.location.href = 'login.php';
					</script>";

				<?php

				}
				?>
			</div>

			<!-- Container for fetching and displaying messages -->
			<div class="fetch_message">

				<!-- Action message container with notification icon -->
				<div class="action_message notfi_message">

					<!-- Link to the messages.php page -->
					<a href="messages.php"><i class='bx bxs-envelope'></i></a>
					
					<?php
					// Check if there are notifications for messages
					if ($row_message_notif > 0) {
					?>
						<!-- Display the number of notifications if there are any -->
						<span class="num"><?php echo $row_message_notif; ?></span>
					<?php
					} else {
					?>
						<!-- Display an empty space if there are no notifications -->
						<span class=""></span>
					<?php

					}
					?>

				</div>

			</div>

			<!-- Container for notifications -->
			<div class="notification">

			<!-- Notification action container with bell icon and toggle function -->
				<div class="action notif">
					<i class='bx bxs-bell' onclick="menuToggle();"></i>

					<!-- Notification menu with a list of notifications -->
					<div class="notif_menu">
						<ul>
							
							<?php
							// Check if there are stock notifications
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

							// Check if there are Eat In order notifications
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
							<?php

							}

							// Check if there are Online order notifications
							if ($row_online_order_notif > 0) {
							?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;New Eat In Order</li></a>
							<?php

							}
							?>

						</ul>
					</div>
					<?php

					// Check if there are any notifications and display the total count
					if ($row_stock_notif > 0 || $row_online_order_notif > 0 || $row_ei_order_notif > 0) {
						$total_notif = $row_online_order_notif + $row_ei_order_notif + $row_stock_notif;
					?>

						<span class="num"><?php echo $total_notif; ?></span>
					<?php
					} else {
					?>
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
					<h1>Inventory</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Inventory</a>
						</li>
					</ul>
				</div>

			</div>

			<?php

			// Check if the 'unauthorized' session variable is set
			if (isset($_SESSION['unauthorized'])) {

				// Display the content of the 'unauthorized' session variable (possibly an unauthorized access message)
				echo $_SESSION['unauthorized'];

				// Unset the 'unauthorized' session variable to avoid displaying the message again
				unset($_SESSION['unauthorized']);
			}

			?>
			<br />

			<div class="table-data">
				<div class="order">
					<div class="head">
					</div>
					<table class="">
						<tr>
							<th>Item Name</th>
							<th>Image</th>
							<th>Available Stocks</th>
							<th>Actions</th>
						</tr>

						<?php
						// SQL query to retrieve all records from tbl_food
						$sql = "SELECT * FROM tbl_food";

						// Execute the SQL query
						$res = mysqli_query($conn, $sql);

						// Check the number of rows returned
						$count = mysqli_num_rows($res);

						// Check if there are any records
						if ($count > 0) {

							// Loop through each record
							while ($row = mysqli_fetch_assoc($res)) {
								
								//Get the values from individual Columns
								$id = $row['id'];
								$Item_Name = $row['title'];
								$image_name = $row['image_name'];
								$stock = $row['stock'];
						?>
						
						<!--Breaking the PHP to write HTML -->

								<tr>
									<td><?php echo $Item_Name; ?></td>
									<td>

										<?php
										//Displaying Image
										//Check whether image available in database
										if ($image_name == "") {

											// No image in database. Show error message
											echo "<div class='error text-center'>Image Not Available</div>";
										} else {
											// Image available. Displaying image
										?>
										
											<!-- Breaking PHP to write HTML -->
											<img src="<?php echo SITEURL; ?>../images/food/<?php echo $image_name; ?>" width="100px">

										<?php
										}
										
										?>
									</td>
									<td>

										<?php
										// Displaying stock status based on quantity
										if ($stock < 100 && $stock >= 50) {
											echo "<span class='status process'>$stock</span>";
										} else if ($stock < 50 && $stock >= 0) {
											echo "<span class='status pending'>$stock</span>";
										} else {
											echo "<span class='status completed'>$stock</span>";
										}

										?>

									</td>

									<td>
										<!-- Link to update-inventory.php with item ID -->
										<a href="<?php echo SITEURL; ?>update-inventory.php?id=<?php echo $id; ?>" class="button-5" role="button">Update</a>
									</td>

								</tr>

						<?php

							}
						} else {
						}
						?>

					</table>

				</div>
			</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>