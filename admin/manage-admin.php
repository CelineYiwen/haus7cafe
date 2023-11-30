<?php
// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');
?>

<?php
$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);

$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);

$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);

//Message Notification
$message_notif = "SELECT message_status FROM message
				 WHERE message_status = 'unread'";
$res_message_notif = mysqli_query($conn, $message_notif);
$row_message_notif = mysqli_num_rows($res_message_notif);


?>

<?php
// Check and display session messages for various scenarios

// Check if there is an 'add' session message
if (isset($_SESSION['add'])) {
	echo $_SESSION['add'];			// Display the 'add' message
	unset($_SESSION['add']);		// Remove the 'add' session message to prevent it from being displayed again
}

// Check if there is a 'delete' session message
if (isset($_SESSION['delete'])) {
	echo $_SESSION['delete'];		// Display the 'delete' message
	unset($_SESSION['delete']);		// Remove the 'delete' session message
}

// Check if there is an 'update' session message
if (isset($_SESSION['update'])) {
	echo $_SESSION['update'];		// Display the 'update' message
	unset($_SESSION['update']);		// Remove the 'update' session message
}

// Check if there is a 'user-not-found' session message
if (isset($_SESSION['user-not-found'])) {
	echo $_SESSION['user-not-found'];		// Display the 'user-not-found' message
	unset($_SESSION['user-not-found']);		// Remove the 'user-not-found' session message
}

// Check if there is a 'pwd-not-match' session message
if (isset($_SESSION['pwd-not-match'])) {
	echo $_SESSION['pwd-not-match'];		// Display the 'pwd-not-match' message
	unset($_SESSION['pwd-not-match']);		// Remove the 'pwd-not-match' session message
}

// Check if there is a 'change-pwd' session message
if (isset($_SESSION['change-pwd'])) {
	echo $_SESSION['change-pwd'];		// Display the 'change-pwd' message
	unset($_SESSION['change-pwd']);		// Remove the 'change-pwd' session message
}
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
			<li class="active">
				<a href="manage-admin.php">
					<i class='bx bxs-group'></i>
					<span class="text">Admin Panel</span>
				</a>
			</li>
			<li>
				<a href="manage-online-order.php">
					<i class='bx bxs-cart'></i>
					<span class="text">Online Orders&nbsp;</span>
					<?php
					if ($row_online_order_notif > 0) {
					?>
						<span class="num-ei"><?php echo $row_online_order_notif; ?></span>
					<?php
					} else {
					?>
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
					<i class='bx bx-qr-scan'></i>
					<span class="text">Eat In Orders&nbsp;&nbsp;&nbsp;

					</span>
					<?php
					if ($row_ei_order_notif > 0) {
					?>
						<span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
					<?php
					} else {
					?>
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
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
				</div>
			</form>
			<div class="bx.bx-menu">
				<?php
				if (isset($_SESSION['user-admin'])) {
					$username = $_SESSION['user-admin'];

				?>
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username; ?></a>
					</div>
				<?php
				} else {
				?>
					echo "<script>
						alert('Please login');
						window.location.href = 'login.php';
					</script>";

				<?php

				}
				?>
			</div>
			<div class="fetch_message">
				<div class="action_message notfi_message">
					<a href="messages.php"><i class='bx bxs-envelope'></i></a>
					<?php

					if ($row_message_notif > 0) {
					?>
						<span class="num"><?php echo $row_message_notif; ?></span>
					<?php
					} else {
					?>
						<span class=""></span>
					<?php

					}
					?>

				</div>

			</div>
			<div class="notification">
				<div class="action notif">
					<i class='bx bxs-bell' onclick="menuToggle();"></i>
					<div class="notif_menu">
						<ul><?php

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
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
							<?php

							}
							if ($row_online_order_notif > 0) {
							?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;New Eat In Order</li></a>
							<?php

							}
							?>

						</ul>
					</div>
					<?php
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
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Admin Panel</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Admin Panel</a>
						</li>
					</ul>
				</div>

			</div>

			<!-- Table --->
			<div>
				<br>
				<a href="add-admin.php" class="button-8" role="button">Add Admin</a>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">


					</div>
					<table>
						<thead>
							<tr>
								<th>Full Name</th>
								<th>Username</th>
								<th>Actions</th>
							</tr>
						</thead>

						<?php
						// Select all records from the tbl_admin table
						$sql = "SELECT * FROM tbl_admin";
						$res = mysqli_query($conn, $sql);

						// Check if the query was executed successfully
						if ($res == TRUE) {

							// Get the number of rows returned by the query
							$count = mysqli_num_rows($res);

							// Check if there are records available
							if ($count > 0) {

								// Loop through each row in the result set
								while ($rows = mysqli_fetch_assoc($res)) {

									// Extract data from the current row
									$id = $rows['id'];
									$full_name = $rows['full_name'];
									$username = $rows['username'];
						?>
									<!-- Displaying admin information in a table -->
									<tbody>
										<tr>
											<td><?php echo $full_name; ?></td>
											<td><?php echo $username; ?></td>
											<td>
												<!-- Buttons for various actions related to the admin -->
												<a href="<?php echo SITEURL; ?>update-password.php?id=<?php echo $id; ?>" class="button-5" role="button">Change Password</a>
												<a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>" class="button-6" role="button">Update</a>
												<a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>" class="button-7" role="button">Delete</a>

											</td>
										</tr>

							<?php

								}
							}
						}

							?>

									</tbody>
					</table>
				</div>

			</div>




			<!-- Table ---->



		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>


</body>

</html>