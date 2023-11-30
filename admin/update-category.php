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
					<h1>Update Category</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="" href="manage-category.php">Manage Category</a>
						</li>
						<li>
							<a class="active" href="update-category.php.php">Update Category</a>
						</li>
					</ul>
				</div>

			</div>

			<br />

			<!-- Update Category Form Start-->

			<?php

			//Check whether the id is set or not
			if (isset($_GET['id'])) {
				//Get the ID and all other details
				//echo "Getting the Data";
				$id = $_GET['id'];
				//Create SQL Query to get all other details
				$sql = "SELECT * FROM tbl_category WHERE id=$id";

				//Execute the Query
				$res = mysqli_query($conn, $sql);

				//Count the Rows to check whether the id is valid or not
				$count = mysqli_num_rows($res);

				if ($count == 1) {
					//Get all the data
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				} else {
					//redirect to manage category with session message
					$_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
					header('location:' . SITEURL . 'manage-category.php');
				}
			} else {
				//redirect to Manage CAtegory
				header('location:' . SITEURL . 'manage-category.php');
			}

			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<form action="" method="POST" enctype="multipart/form-data">

							<table class="">
								<tr>
									<td>Title: </td>
									<td>
										<!-- Input field for category title -->
										<input type="text" name="title" value="<?php echo $title; ?>" id="ip2" required>
									</td>
								</tr>

								<tr>
									<td>Current Image: </td>
									<td>
										<?php

										// Check if a current image exists
										if ($current_image != "") {
										?>
											<!-- Display the current image -->
											<img src="<?php echo SITEURL; ?>../images/category/<?php echo $current_image; ?>" width="150px">
										<?php
										} else {
											// Display a message if no image is available
											echo "<div class='error'>Image Not Added.</div>";
										}
										?>
									</td>
								</tr>

								<tr>
									<td>New Image: </td>
									<td>
										<!-- Input field for uploading a new image -->
										<input type="file" name="image">
									</td>
								</tr>

								<tr>
									<td>Featured: </td>
									<td>
										<!-- Radio buttons for featured status -->
										<input <?php if ($featured == "Yes") {
													echo "checked";
												} ?> type="radio" name="featured" value="Yes" required> Yes

										<input <?php if ($featured == "No") {
													echo "checked";
												} ?> type="radio" name="featured" value="No" required> No
									</td>
								</tr>

								<tr>
									<td>Active: </td>
									<td>
										<!-- Radio buttons for active status -->
										<input <?php if ($active == "Yes") {
													echo "checked";
												} ?> type="radio" name="active" value="Yes" required> Yes

										<input <?php if ($active == "No") {
													echo "checked";
												} ?> type="radio" name="active" value="No" required> No
									</td>
								</tr>

								<tr>
									<td>
										<!-- Hidden input fields for current image, category ID, and form submission -->
										<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="submit" name="submit" value="Update Category" class="button-8" role="button">
									</td>
								</tr>

							</table>

						</form>

						<?php

						if (isset($_POST['submit'])) {
							//echo "Clicked";
							//1. Get all the values from our form
							$id = $_POST['id'];
							$title = $_POST['title'];
							$current_image = $_POST['current_image'];
							$featured = $_POST['featured'];
							$active = $_POST['active'];

							//2. Updating New Image if selected
							//Check whether the image is selected or not
							if (isset($_FILES['image']['name'])) {
								//Get the Image Details
								$image_name = $_FILES['image']['name'];

								//Check whether the image is available or not
								if ($image_name != "") {
									//Image Available

									//A. UPload the New Image

									//Auto Rename our Image
									//Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
									$ext = end(explode('.', $image_name));

									//Rename the Image
									$image_name = "Food_Category_" . rand(000, 999) . '.' . $ext; // e.g. Food_Category_834.jpg


									$source_path = $_FILES['image']['tmp_name'];

									$destination_path = "../images/category/" . $image_name;

									//Finally Upload the Image
									$upload = move_uploaded_file($source_path, $destination_path);

									//Check whether the image is uploaded or not
									//And if the image is not uploaded then we will stop the process and redirect with error message
									if ($upload == false) {
										//SEt message
										$_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
										//Redirect to Add CAtegory Page
										header('location:' . SITEURL . 'manage-category.php');
										//STop the Process
										die();
									}

									//B. Remove the Current Image if available
									if ($current_image != "") {
										$remove_path = "../images/category/" . $current_image;

										$remove = unlink($remove_path);

										//CHeck whether the image is removed or not
										//If failed to remove then display message and stop the processs
										if ($remove == false) {
											//Failed to remove image
											$_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
											header('location:' . SITEURL . 'manage-category.php');
											die(); //Stop the Process
										}
									}
								} else {
									$image_name = $current_image;
								}
							} else {
								$image_name = $current_image;
							}

							//3. Update the Database
							$sql2 = "UPDATE tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active' 
                    WHERE id=$id
                ";

							//Execute the Query
							$res2 = mysqli_query($conn, $sql2);

							//4. REdirect to Manage Category with MEssage
							//CHeck whether executed or not
							if ($res2 == true) {
								//Category Updated
								$_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
								header('location:' . SITEURL . 'manage-category.php');
							} else {
								//failed to update category
								$_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
								header('location:' . SITEURL . 'manage-category.php');
							}
						}

						?>


						<!-- Update Category Form End -->


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<!-- Include the script-admin.js file -->
	<script src="script-admin.js"></script>
</body>

</html>