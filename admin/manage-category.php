<?php

// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');


// Disable error reporting and displaying errors
// Setting it to 0 means no errors will be reported.
error_reporting(0);

// error control operator
// PHP will not display error messages directly on the web page.
@ini_set('display_errors', 0);

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
			<li class="active">
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
				// Check if the user is logged in as an admin
				if (isset($_SESSION['user-admin'])) {

					// Retrieve and display the username
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

		<?php
		// Check and display related session messages for various scenarios

		// Check if there is an 'add' session message
		if (isset($_SESSION['add'])) {
			echo $_SESSION['add'];			// Display the 'add' message
			unset($_SESSION['add']);		// Remove the 'add' session message
		}

		// Check if there is a 'remove' session message
		if (isset($_SESSION['remove'])) {
			echo $_SESSION['remove'];			// Display the 'remove' message
			unset($_SESSION['remove']);			// Remove the 'remove' session message
		}

		// Check if there is a 'delete' session message
		if (isset($_SESSION['delete'])) {
			echo $_SESSION['delete'];			// Display the 'delete' message
			unset($_SESSION['delete']);			// Remove the 'delete' session message
		}

		// Check if there is a 'no-category-found' session message
		if (isset($_SESSION['no-category-found'])) {
			echo $_SESSION['no-category-found'];			// Display the 'no-category-found' message
			unset($_SESSION['no-category-found']);			// Remove the 'no-category-found' session message
		}

		// Check if there is an 'update' session message
		if (isset($_SESSION['update'])) {
			echo $_SESSION['update'];			// Display the 'update' message
			unset($_SESSION['update']);			// Remove the 'update' session message
		}

		// Check if there is an 'upload' session message
		if (isset($_SESSION['upload'])) {
			echo $_SESSION['upload'];				// Display the 'upload' message
			unset($_SESSION['upload']);				// Remove the 'upload' session message
		}

		// Check if there is a 'failed-remove' session message
		if (isset($_SESSION['failed-remove'])) {
			echo $_SESSION['failed-remove'];			// Display the 'failed-remove' message
			unset($_SESSION['failed-remove']);			// Remove the 'failed-remove' session message
		}


		?>

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Category</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Category</a>
						</li>
					</ul>
				</div>

			</div>



			<br />

			<!-- Button to add a new category -->
			<a href="<?php echo SITEURL; ?>add-category.php" class="button-8" role="button">Add Category</a>

			<br /> <br />

			<!-- Container for table data -->
			<div class="table-data">
				<div class="order">
					<div class="head">
					</div>

					<!-- Table to display category data -->
					<table class="">
						<tr>
							<!-- Table headers -->
							<th>S.N.</th>
							<th>Title</th>
							<th>Image</th>
							<th>Featured</th>
							<th>Active</th>
							<th>Actions</th>
						</tr>

						<?php
						//Fetching and Displaying data from database

						// SQL query to select all records from the 'tbl_category' table
						$sql = "SELECT * FROM tbl_category";

						// Executing the SQL Query using the mysqli_query function
						$res = mysqli_query($conn, $sql);

						// Counting the number of rows retrieved from the query result
						$count = mysqli_num_rows($res);

						//Fixing Serial Number issue
						$sn = 1; //Create variable and assign (initialize) as 1

						//Check whether there is data in database or not
						if ($count > 0) {

							// Data available in database
							// Get data and display it
							// Loop through each category data and generate a table row
							while ($row = mysqli_fetch_assoc($res)) {

								// Extracting individual data fields from the database result
								$id = $row['id'];
								$title = $row['title'];
								$image_name = $row['image_name'];
								$featured = $row['featured'];
								$active = $row['active'];

						?> <!-- Breaking the PHP to write HTML -->

								<tr>

									<!-- Serial Number -->
									<td><?php echo $sn++; ?></td>

									<!-- Category Title -->
									<td><?php echo $title; ?></td>

									<!-- Category Image -->
									<td>
										<?php
										//Check whether image name is available or not
										if ($image_name != "") {
											//Display the image

										?> <!-- Breaking the PHP to write HTML -->

											<img src="<?php echo SITEURL; ?>../images/category/<?php echo $image_name; ?>" width="100px">

										<?php

										} else {
											// Display a message if no image is available
											echo "<div class='error'>No Image Available</div>";
										}
										?>
									</td>

									<!-- Featured and Active Status -->
									<td><?php echo $featured; ?></td>
									<td><?php echo $active; ?></td>

									<!-- Actions (Update and Delete) -->
									<td>
										<a href="<?php echo SITEURL; ?>update-category.php?id=<?php echo $id; ?>" class="button-5" role="button">Update</a>
										<a href="<?php echo SITEURL; ?>delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="button-7" role="button">Delete</a>
									</td>
								</tr>



							<?php
							}
						}
						
						else {
							// If no data in the database, display a message inside the table
							?> <!-- Breaking the PHP to write HTML-->

							<tr>
								<td colspan="6">
									<div class="error">No Category Added</div>
								</td>
							</tr>

						<?php
						}
						?>


					</table>
				</div>
			</div>
			</div>
			</div>

			</div>

			<!-- Main Content Ends -->


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>