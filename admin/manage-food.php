<?php

include('../frontend/config/constants.php');
include('login-check.php');

error_reporting(0);
@ini_set('display_errors', 0);

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
			<li class="active">
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



		<main>
			<div class="head-title">
				<div class="left">
					<h1>Food Menu</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Food Menu</a>
						</li>
					</ul>
				</div>

			</div>

			<?php
			// Check if 'add' session variable is set
			if (isset($_SESSION['add'])) {
				// Display and then unset 'add' session variable
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}

			// Check if 'delete' session variable is set
			if (isset($_SESSION['delete'])) {

				// Display and then unset 'delete' session variable
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}

			// Check if 'upload' session variable is set
			if (isset($_SESSION['upload'])) {

				// Display and then unset 'upload' session variable
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}

			// Check if 'unauthorized' session variable is set
			if (isset($_SESSION['unauthorized'])) {

				// Display and then unset 'unauthorized' session variable
				echo $_SESSION['unauthorized'];
				unset($_SESSION['unauthorized']);
			}


			?>
			<br />

			<!-- Display a link/button to add food -->
			<a href="<?php echo SITEURL; ?>add-food.php" class="button-8" role="button">Add Food</a>
			<br /><br />

			<!-- Container for displaying food data in a table -->
			<div class="table-data">
				<div class="order">
					<div class="head">
					</div>

					<!-- Table to display food details -->
					<table class="">

						<tr>
							<!-- Table headers -->
							<th>S.N.</th>
							<th>Title</th>
							<th>Description</th>
							<th>Price</th>
							<th>Image</th>
							<th>Featured</th>
							<th>Active</th>
							<th>Actions</th>
						</tr>

						<?php
						// SQL query to select all records from the 'tbl_food' table
						$sql = "SELECT * FROM tbl_food";
						// Execute the query
						$res = mysqli_query($conn, $sql);
						// Count the number of rows
						$count = mysqli_num_rows($res);

						// Initialize serial number
						$sn = 1;

						// Check if there is data in the table
						if ($count > 0) {

							while ($row = mysqli_fetch_assoc($res)) {
								// Extracting data from each row
								$id = $row['id'];
								$title = $row['title'];
								$description = $row['description'];
								$price = $row['price'];
								$image_name = $row['image_name'];
								$featured = $row['featured'];
								$active = $row['active'];

						?>
								<!-- Displaying each food item in a table row -->
								<tr>
									<td><?php echo $sn++; ?></td>
									<td><?php echo $title; ?></td>
									<td><?php echo $description; ?></td>
									<td><?php echo $price; ?></td>
									<td>
										<?php
										// Check if image is available
										if ($image_name == "") {
											echo "<div class='error text-center'>Image Not Available</div>";
										} else {
										?>

											<img src="<?php echo SITEURL; ?>../images/food/<?php echo $image_name; ?>" width="100px">

										<?php
										}

										?>
									</td>
									<td><?php echo $featured; ?></td>
									<td><?php echo $active; ?></td>
									<td>
										<!-- Buttons for updating and deleting a food item -->
										<a href="<?php echo SITEURL; ?>update-food.php?id=<?php echo $id; ?>" class="button-5" role="button">Update</a>
										<a href="<?php echo SITEURL; ?>delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="button-7" role="button">Delete</a>
									</td>
								</tr>

						<?php

							}
						} else {
							// Display a message if the food table is empty
							echo "<tr><td colspan='7' class='error text-center'>Food Table is Empty</td></tr>";
						}


						?>

					</table>

				</div>
			</div>
			</div>
		</main>
	</section>
	<script src="script-admin.js"></script>
</body>

</html>