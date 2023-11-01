<?php include('../frontend/config/constants.php');
include('login-check.php');

?>
<?php

//Stats

$sales_by_hour =  "SELECT date(order_date) as hname,
					sum(total_amount) as total_sales
					FROM order_manager
					GROUP BY date(order_date)";


$res_sales_by_hour = mysqli_query($conn, $sales_by_hour);

$most_sold_items = "SELECT sum(Quantity) as total_qty,
							Item_Name as item_name
							FROM online_orders_new
							GROUP BY Item_Name
							";
$res_most_sold_items = mysqli_query($conn, $most_sold_items);

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

// Revenue Generated
$revenue = "SELECT SUM(total_amount) AS total_amount FROM order_manager
			WHERE order_status='Delivered' ";
$res_revenue = mysqli_query($conn, $revenue);
$total_revenue = mysqli_fetch_array($res_revenue);

//Total Orders Delivered

$orders_delivered = "SELECT order_status FROM order_manager
					 WHERE order_status='Delivered'";
$res_orders_delivered = mysqli_query($conn, $orders_delivered);
$total_orders_delivered = mysqli_num_rows($res_orders_delivered);

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
			<li>
				<a href="inventory.php">
					<i class='bx bxs-box'></i>
					<span class="text">Inventory</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-box'></i>
					<span class="text">Coupon & Feedback</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
			<li>
				<a href="tableorder-menu.php">
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
				<div class="action notif" onclick="menuToggle();">
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
					<h1>Eat In Orders</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="feedback.php">Coupon & Feedback</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Table --->


			<div class="table-data">
				<div class="order">
					<div class="head">


					</div>
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Coupon Code</th>
								<th>Username</th>
								<th>Often Visit</th>
								<th>Quality</th>
								<th>Cleanliness</th>
								<th>Service Satification</th>
								<th>Appreciate</th>
								<th>Other Feedback</th>
								<th>Date</th>
								<th>Coupon Status</th>
							</tr>
						</thead>

						<?php

						$sql = "SELECT * FROM tbl_feedback";
						$res = mysqli_query($conn, $sql);

						if ($res == TRUE) {
							$count = mysqli_num_rows($res);

							if ($count > 0) {
								while ($rows = mysqli_fetch_assoc($res)) {
									$id = $rows['id'];
									$coupon_code = $rows['coupon_code'];
									$username = $rows['username'];
									$often_visit = $rows['often_visit'];
									$quality = $rows['quality'];
									$cleanliness = $rows['cleanliness'];
									$service_satisfaction = $rows['service_satisfaction'];
									$appreciate = $rows['appreciate'];
									$other_feedback = $rows['other_feedback'];
									$date = $rows['date'];
									$claim_indicator = $rows['claim_indicator'];
						?>
									<tbody>
										<tr>
											<td><?php echo $id; ?></td>
											<td><?php echo $coupon_code; ?></td>
											<td><?php echo $username; ?></td>
											<td><?php echo $often_visit; ?></td>
											<td><?php echo $quality; ?></td>
											<td><?php echo $cleanliness; ?></td>
											<td><?php echo $service_satisfaction; ?></td>
											<td><?php echo $appreciate; ?></td>
											<td><?php echo $other_feedback; ?></td>
											<td><?php echo $date; ?></td>
											<td><?php echo $claim_indicator; ?></td>
											<td>
												<a href="<?php echo SITEURL; ?>update-feedback.php?id=<?php echo $id; ?>" class="button-6" role="button">Update</a>
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
			</div>

			</div>



		</main>



		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>


</body>

</html>