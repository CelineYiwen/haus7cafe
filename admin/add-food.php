<?php

// Include necessary files
include('../frontend/config/constants.php');
include('login-check.php');

// Disable error reporting and suppress error display
// Setting it to 0 means no errors will be reported.
error_reporting(0);

// error control operator
// PHP will not display error messages directly on the web page.
@ini_set('display_errors', 0);


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
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
							<?php

							}

							// Display a notification for new online orders
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
					<h1>Add Food</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Add Food</a>
						</li>
					</ul>
				</div>

			</div>
			<br>

			<?php

			// Check if the 'upload' session variable is set
			if (isset($_SESSION['upload'])) {
				// Echo the value of 'upload' and then unset it
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}

			?>

			<?php
			if (isset($_SESSION['upload'])) {
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<!-- More secure for sensitive data because the data is not exposed in the URL. -->
						<form action="" method="POST" enctype="multipart/form-data">

							<table class="rtable">

								<tr>
									<td>Title</td>
									<td>
										<input type="text" name="title" id="ip2">
									</td>
								</tr>

								<tr>
									<td>Description</td>
									<td>
										<textarea name="description" cols="24" rows="5"></textarea>
									</td>
								</tr>

								<tr>
									<td>Price</td>
									<td>
										<input type="text" name="price" id="ip2">
									</td>
								</tr>

								<tr>
									<td>Select Image</td>
									<td>
										<input type="file" name="image">
									</td>
								</tr>

								<tr>
									<td>Category</td>
									<td>
										<select name="category">

											<?php
											//Create PHP Code to display categories from Database
											//1. CReate SQL to get all active categories from database
											$sql = "SELECT * FROM tbl_category WHERE active='Yes'";

											//Executing qUery
											$res = mysqli_query($conn, $sql);

											//Count Rows to check whether we have categories or not
											$count = mysqli_num_rows($res);

											//IF count is greater than zero, we have categories else we donot have categories
											if ($count > 0) {
												//WE have categories
												while ($row = mysqli_fetch_assoc($res)) {
													//get the details of categories
													$id = $row['id'];
													$title = $row['title'];

											?>

													<option value="<?php echo $id; ?>"><?php echo $title; ?></option>

												<?php
												}
											} else {
												//WE do not have category
												?>
												<option value="0">No Category Found</option>
											<?php
											}


											//2. Display on Drpopdown
											?>

										</select>
									</td>
								</tr>

								<tr>
									<td>Featured</td>
									<td>
										<input type="radio" name="featured" value="Yes"> Yes
										<input type="radio" name="featured" value="No"> No
									</td>
								</tr>

								<tr>
									<td>Stock</td>
									<td>
										<input type="number" name="stock" id="ip2">
									</td>
								</tr>

								<tr>
									<td>Active</td>
									<td>
										<input type="radio" name="active" value="Yes"> Yes
										<input type="radio" name="active" value="No"> No
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<input type="submit" name="submit" value="Add Food" class="button-8" role="button">
									</td>
								</tr>

							</table>

						</form>
					</div>
				</div>
			</div>


			<?php

			//Check whether the button is clicked or not

			if (isset($_POST['submit'])) {
				//Add the food in database
				//echo "Button Clicked";
				//1. Get the data from form 
				$title = $_POST['title'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$stock = $_POST['stock'];
				$category = $_POST['category'];

				//Check whether radio button for "featured" is checked or not
				if (isset($_POST['featured'])) {
					$featured = $_POST['featured'];
				} else {
					$featured = "No"; // Setting the default value
				}


				//Check whether radio button for "active" is checked or not
				if (isset($_POST['active'])) {
					$active = $_POST['active'];
				} else {
					$active = "No"; // Setting the default value
				}





				//2. Upload the image if selected

				//Check whether the select image is clicked or not and upload only if its selected
				if (isset($_FILES['image']['name'])) {
					//Get the details of the selected image
					$image_name = $_FILES['image']['name'];

					//Check whether the image(to be uploaded) is selected or not

					if ($image_name != "") {
						//Image(to be uploaded) is selected
						//A. Rename the image
						//Getting extension of image

						$ext = end(explode('.', $image_name));

						//Create new name for image

						$image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext;


						//B. Upload the image
						//Get the source path and destination path
						//Source path is the current location of the image
						$src = $_FILES['image']['tmp_name'];

						//Destination path for the image to be uploaded

						$dst = "../images/food/" . $image_name;

						//Finally upload food image
						$upload = move_uploaded_file($src, $dst);

						//Check whether image is uploaded or not

						if ($upload == false) {
							//Failed to upload the image
							//Redirect to add food page with error message
							$_SESSION['upload'] = "<div class='error text-center'>Failed to Upload Image</div>";
							header('location:' . SITEURL . 'add-food.php');
							//Stop the process
							die();
						}
					}
				} else {
					$image_name = ""; //Setting default value as blank

				}



				//3. Insert into database

				//Creating SQL Query
				$sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            stock = '$stock',
            active = '$active'
            
            ";

				//Execute the Query

				$res2 = mysqli_query($conn, $sql2);
				//4. Redirect with message to manage food page
				//Check whether data is inserted or not
				if ($res2 == true) {
					//Data inserted successfully
					$_SESSION['add'] = "<div class='success text-center'>Food Added Successfully</div>";
					header('location:' . SITEURL . 'manage-food.php');
				} else {
					//Failed to Insert Data
					$_SESSION['add'] = "<div class='error text-center'>Failed to Add Food</div>";
					header('location:' . SITEURL . 'manage-food.php');
				}
			}


			?>







		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>