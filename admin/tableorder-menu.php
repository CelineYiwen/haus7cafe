<?php include('../frontend/config/constants.php');
include('login-check.php');

?>

<?php
//Orders

$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);

$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);

// Stock Notification
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
		<a href="#" class="brand">
			<div class="centered-image">
				<img src="../images/logo1.jpg" width="80px" alt="">
			</div>
		</a>
		<ul class="side-menu top">
			<li class="">
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
					<span class="text">Online Orders &nbsp;</span>
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
				<a href="manage-ei-order.php">
					<i class='bx bx-qr-scan'></i>
					<span class="text">Eat In Orders &nbsp;&nbsp;&nbsp;

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
		</ul>

		<ul class="side-menu">
			<li class="active">
				<a href="#">
					<i class='bx bx-qr-scan'></i>
					<span class="text">Take Table Order</span>
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

	<!-- Dynamic Dashborad -->

	<?php
	//Categories

	$sql = "SELECT * FROM tbl_category";

	$res = mysqli_query($conn, $sql);

	$row_cat = mysqli_num_rows($res);

	//Items

	$sql2 = "SELECT * FROM tbl_food";

	$res2 = mysqli_query($conn, $sql2);

	$row_item = mysqli_num_rows($res2);

	//Orders

	$sql3 = "SELECT * FROM order_manager";

	$res3 = mysqli_query($conn, $sql3);

	$row_order = mysqli_num_rows($res3);

	//Eat In Orders


	$sql4 = "SELECT * FROM tbl_eipay";

	$res4 = mysqli_query($conn, $sql4);

	$row_ei_order = mysqli_num_rows($res4);

	?>


	<!-- Dynamic DashBoard -->


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

			<div class="notification" onclick="menuToggle();">
				<div class="action notif " onclick="menuToggle();">
					<i class='bx bxs-bell ' onclick="menuToggle();"></i>
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

		<!-- Menu Start -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Take Table Order</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="tableorder-menu.php">Take Table Order</a>
						</li>
					</ul>
				</div>
			</div>

			</br>
			<div class="left">
				<label for="color">Select Table:</label>
				<select name="tablenumber" id="tablenumber">
					<option value="">--- Choose a table number ---</option>
					<option value="Table 1">Table 1</option>
					<option value="Table 2">Table 2</option>
					<option value="Table 3">Table 3</option>
					<option value="Table 4">Table 4</option>
					<option value="Table 5">Table 5</option>
					<option value="Table 6">Table 6</option>
					<option value="Table 7">Table 7</option>
					<option value="Table 8">Table 8</option>
					<option value="Table 9">Table 9</option>
					<option value="Table 10">Table 10</option>
					<option value="Table 11">Table 11</option>
					<option value="Table 12">Table 12</option>
				</select>
			</div>

			<br>

			<div class="table-data">
				<div class="order">
					<div class="head">
					</div>

					<table class="">
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Description</th>
							<th>Price</th>
						</tr>

						<?php
						//Getting Eat in order data from datbase
						$sql = "SELECT * FROM tbl_food WHERE active='Yes'";

						//Execute Query
						$res = mysqli_query($conn, $sql);
						//Count the Rows
						$count = mysqli_num_rows($res);
						$sn = 1; //Create a Serial Number and set its initail value as 1
						if ($count > 0) {
							//Order Available
							while ($row = mysqli_fetch_assoc($res)) {
								//Get all the order details
								$id = $row['id'];
								$title = $row['title'];
								$description = $row['description'];
								$price = $row['price'];
						?>

								<tr>
									<td><?php echo $sn++; ?>. </td>
									<td><?php echo $title; ?></td>
									<td><?php echo $description; ?></td>
									<td><?php echo $price; ?></td>
									<td>
										<input type="submit" name="submit" value="Send to Kitchen" class="button-8" role="button">
									</td>
								</tr>

						<?php

							}
						} else {
							//Order not Available
							echo "<tr><td colspan='7' class='error'>Orders not Available</td></tr>";
						}
						?>
					</table>

				</div>
			</div>
			</div>

			</div>
			</div>
			</div>
		</main>
	</section>
	<!--Menu Ends -->

	<script src="script-admin.js"></script>
</body>

</html>


<?php



if (isset($_POST['submit'])) {

	if (empty($_POST["tablenumber"])) {
		$errors[] = "Please select table number";
		die;
	} else {
		$monitors_old = validateInput($_POST["tablenumber"]);
	}

	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']); //md5 encryption

	$check_duplicate = "SELECT username FROM tbl_admin
						WHERE username = '$username'";
	$res_check_duplicate = mysqli_query($conn, $check_duplicate);

	$rows_check_duplicate = mysqli_num_rows($res_check_duplicate);
	if ($rows_check_duplicate > 0) {
		echo "<script>
                alert('Username already exists! Try a different username.'); 
                window.location.href='add-admin.php';
                </script>";
	} else {
		$sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    	";
	}

	$res = mysqli_query($conn, $sql) or die(mysqli_error());

	if ($res == true) {

		$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
	} else {
		$_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
	}
}

?>