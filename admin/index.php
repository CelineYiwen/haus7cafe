<?php

// Include the constants.php file, which contain configuration settings or constants.
include('../frontend/config/constants.php');

// Include the login-check.php file, which handles user authentication.
include('login-check.php');

?>

<?php

// Stats

// Query to retrieve total sales by date
$sales_by_date =  "SELECT date(order_date) as date_name,
					sum(total_amount) as total_sales
					FROM order_manager
					WHERE payment_status = 'successful'
					GROUP BY date(order_date)";

$res_sales_by_date = mysqli_query($conn, $sales_by_date);

// Query to retrieve most sold items
$most_sold_items = "SELECT sum(OON.Quantity) as total_qty,
					OON.Item_Name as item_name
					FROM online_orders_new OON
						INNER JOIN order_manager OM
							ON OON.Order_ID = OM.Order_ID
					WHERE OM.payment_status = 'successful'
					GROUP BY OON.Item_Name
					";

$res_most_sold_items = mysqli_query($conn, $most_sold_items);


// Orders

// Query to get notifications for pending or processing orders from tbl_eipay
$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);


// Query to get notifications for pending or processing orders from order_manager
$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);


// Stock Notification

// Query to get stock notifications for items with stock less than 50
$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock < 50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);


// Revenue Generated

// Query to calculate total revenue from successful orders
$revenue = "SELECT SUM(total_amount) AS total_amount FROM order_manager
			WHERE payment_status = 'successful' ";
$res_revenue = mysqli_query($conn, $revenue);
$total_revenue = mysqli_fetch_array($res_revenue);


// Total Orders Delivered

// Query to get total delivered orders
$orders_delivered = "SELECT order_status FROM order_manager
					 WHERE order_status='Delivered'";
$res_orders_delivered = mysqli_query($conn, $orders_delivered);
$total_orders_delivered = mysqli_num_rows($res_orders_delivered);


// Message Notification

// Query to get unread message notifications
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


	<!-- Chart --->

	<!-- Chart Library - Google Charts -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		// Load the visualization library and set a callback function
		// loads the Google Charts library with the specified version and the "corechart" package.
		google.charts.load("current", {
			packages: ["corechart"]
		});

		// Callback function to draw the chart when the library is loaded
		// ensures that the chart is drawn when the library is ready.
		google.charts.setOnLoadCallback(drawChart);

		// Function to draw the chart
		// contains the logic for drawing the pie chart.
		function drawChart() {

			// Define the data for the chart
			var data = google.visualization.arrayToDataTable([
				['Item Name', 'Sales'],
				<?php

				// Loop through the result set of most sold items and generate chart data
				while ($row_sales = mysqli_fetch_array($res_most_sold_items)) {
					echo "['" . $row_sales["item_name"] . "', " . $row_sales["total_qty"] . "],";
				}
				?>
			]);

			// Define options for the chart
			var options = {
				title: 'Most Famours Items',
				pieHole: 0.4,
				fontName: 'Poppins',
				fontSize: 12,
				//is3D:true,

				titleTextStyle: {
					color: "Grey",
					fontName: "Poppins",
					fontSize: 16,
					bold: false,
					italic: false
				},

			};

			// Create a new PieChart and draw it in the specified HTML element
			// creates a new instance of the PieChart class
			var chart = new google.visualization.PieChart(document.getElementById('donutchart_msi'));

			// draws the chart using the specified data and options.
			chart.draw(data, options);
		}
	</script>

	<!-- Chart End -->


	<!-- Chart Section Start -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">

		// Load the Google Charts library with the 'bar' package
		google.charts.load('current', {
			'packages': ['bar']
		});

		// Set a callback function to draw the chart when the library is loaded
		google.charts.setOnLoadCallback(drawChart);

		// Function to draw the bar chart
		function drawChart() {

			// Define the data for the chart
			var data = google.visualization.arrayToDataTable([

				['Date', 'Sales'],

				<?php

				// Loop through the result set of sales by hour and generate chart data
				while ($row_sales_by_date = mysqli_fetch_array($res_sales_by_date)) {
					echo "['" . $row_sales_by_date["date_name"] . "', " . $row_sales_by_date["total_sales"] . "],";
				}

				?>

			]);

			// Define options for the chart
			var options = {
				hAxis: {
					title: 'Date',
					titleTextStyle: {
						color: 'Black'
					}
				},
				
				colors: ['#3498db', 'green'],

				chart: {
					title: 'Sales By Date',
				}
			};

			// Create a new Bar chart and draw it in the specified HTML element
			// Creates a new instance of the Bar chart class
			var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

			// Draw the chart using the specified data and options
			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>
	<!-- Chart Section End -->

	<title>Haus 7 Cafe Admin</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">

		<!-- Brand Logo -->
		<a href="#" class="brand">
			<div class="centered-image">
				<img src="../images/logo1.jpg" width="130px" alt="">
			</div>
		</a>

		<!-- Sidebar Menu -->
		<ul class="side-menu top">

			<!-- Dashboard Link -->
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<!-- Admin Panel Link -->
				<a href="manage-admin.php">
					<i class='bx bxs-group'></i>
					<span class="text">Admin Panel</span>
				</a>
			</li>

			<!-- Online Orders Link with Notification Count -->
			<li>
				<a href="manage-online-order.php">
					<i class='bx bxs-cart'></i>
					<span class="text">Online Orders &nbsp;</span>

					<?php
					// Display notification count if there are notifications
					if ($row_online_order_notif > 0) {
					?>
						<span class="num-ei"><?php echo $row_online_order_notif; ?></span>
					<?php
					} else {
						// Display an empty span if there are no notifications
					?>
						<span class=""> </span>
					<?php
					}
					?>
				</a>
			</li>

			<!-- Take Table Order Link -->
			<li>
				<a href="tableorder-menu.php">
					<i class='bx bx-qr-scan'></i>
					<span class="text">Take Table Order</span>
				</a>
			</li>

			<!-- Manage Eat In Orders Link with Notification Count -->
			<li>
				<a href="manage-ei-order.php">
					<i class='bx bx-qr-scan'></i>
					<span class="text">Eat In Orders &nbsp;&nbsp;&nbsp;

					</span>

					<?php
					// Display notification count if there are notifications
					if ($row_ei_order_notif > 0) {
					?>
						<span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
					<?php
					} else {

						// Display an empty span if there are no notifications
					?>
						<span class=""> </span>
					<?php
					}
					?>

				</a>
			</li>

			<!-- Manage Category Link -->
			<li>
				<a href="manage-category.php">
					<i class='bx bxs-category'></i>
					<span class="text">Category</span>
				</a>
			</li>

			<!-- Manage Food Menu Link -->
			<li>
				<a href="manage-food.php">
					<i class='bx bxs-food-menu'></i>
					<span class="text">Food Menu</span>
				</a>
			</li>

			<!-- Inventory Link -->
			<li class="">
				<a href="inventory.php">
					<i class='bx bxs-box'></i>
					<span class="text">Inventory</span>
				</a>
			</li>

			<!-- Coupon & Feedback Link -->
			<li class="">
				<a href="feedback.php">
					<i class='bx bxs-box'></i>
					<span class="text">Coupon & Feedback</span>
				</a>
			</li>
		</ul>

		<!-- Logout Link -->
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

			<!-- Navigation Bar Section -->
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
				</div>
			</form>

			<!-- User Information Section -->
			<div class="bx.bx-menu">

				<?php
				// Check if the user is logged in
				if (isset($_SESSION['user-admin'])) {
					$username = $_SESSION['user-admin'];

				?>
					<!-- Display user information if logged in -->
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username; ?></a>
					</div>
				<?php
				} else {
					// Redirect to login page if not logged in
				?>
					echo "<script>
						alert('Please login');
						window.location.href = 'login.php';
					</script>";

				<?php

				}
				?>
			</div>

			<!-- Message Notification Section -->
			<div class="fetch_message">
				<div class="action_message notfi_message">
					<a href="messages.php"><i class='bx bxs-envelope'></i></a>

					<?php
					// Display message notification count
					if ($row_message_notif > 0) {
					?>
						<span class="num"><?php echo $row_message_notif; ?></span>
					<?php
					} else {
						// Display an empty span if there are no notifications
					?>
						<span class=""></span>
					<?php

					}
					?>

				</div>

			</div>

			<!-- Notification Bell Section -->
			<div class="notification" onclick="menuToggle();">
				<div class="action notif " onclick="menuToggle();">
					<i class='bx bxs-bell ' onclick="menuToggle();"></i>
					<div class="notif_menu">
						<ul>

							<?php
							// Display stock notification if items are running out of stock
							if ($row_stock_notif > 0 and $row_stock_notif != 1) {
							?>
								<li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Items are running out of stock</li></a>
							<?php
							} else if ($row_stock_notif == 1) {

								// Display stock notification if only one item is running out of stock
							?>
								<li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Item is running out of stock</li></a>
							<?php
							} else {
							}

							// Display notification for new online orders
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
							<?php

							}

							// Display notification for new eat-in orders
							if ($row_online_order_notif > 0) {
							?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;New Eat In Order</li></a>
							<?php

							}
							?>

						</ul>
					</div>
					<?php

					// Display total notification count if there are any notifications
					if ($row_stock_notif > 0 || $row_online_order_notif > 0 || $row_ei_order_notif > 0) {
						$total_notif = $row_online_order_notif + $row_ei_order_notif + $row_stock_notif;
					?>

						<span class="num"><?php echo $total_notif; ?></span>
					<?php
					} else {
						// Display an empty span if there are no notifications
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

			<!-- Cards Section -->
			<div class="cards-list">

				<!-- Inventory Card -->
				<div class="card-stock">
					<a href="inventory.php">
						<div class="card_image"> <img src="../images/inventory1.png" /> </div>
					</a>
					<div class="card_title title-white">
						<p></p>
						<p>Inventory</p>
					</div>
				</div>

				<!-- Revenue Generated Card -->
				<div class="card-stock2">
					<div class="card_image">
						<a href=""><img src="../images/revenue1.png" /></a>
					</div>
					<div class="card_title title-white">
						<p>RM<?= $total_revenue['total_amount'] ?></p>
						<p>Revenue Generated</p>
					</div>
				</div>
			</div>

			<div class="cards-list">
				<!-- Orders Completed Card -->
				<div class="card-stock3">
					<div class="card_image">
						<a href="manage-online-order.php"><img src="../images/complete_order1.png" /></a>
					</div>
					<div class="card_title title-white">
						<p><?php echo $total_orders_delivered; ?></p>
						<p>Orders Completed</p>
					</div>
				</div>

				<!-- Menu Items Card -->
				<div class="card-stock4">
					<div class="card_image">
						<a href="manage-food.php"><img src="../images/menu1.png" /></a>
					</div>
					<div class="card_title title-white">
						<p><?php echo $row_item; ?></p>
						<p>Menu Items</p>
					</div>
				</div>
			</div>
			<!-- End of Cards Section -->


			<!-- Chart -->

			<br>
			<ul class="box-info">

				<!-- Donut Chart -->
				<li>
					<div class="chart" id="donutchart_msi" style="width: 650px; height: 320px;"></div>
				</li>

				<!-- Column Chart -->
				<li>
					<div class="chart" id="columnchart_material" style="width: 650px; height: 320px;"></div>
				</li>
			</ul>

			<!-- Chart End --->


		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->

	<!-- Script Section -->
	<script src="script-admin.js"></script>

</body>

</html>