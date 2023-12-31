<?php

// Including the constant file and login-check files
include('../frontend/config/constants.php');
include('login-check.php');

// Get the message ID from the URL parameter
$id = $_GET['id'];

// Construct the SQL query to update the message status to 'read' for the specified ID
$sql = "UPDATE message SET
        message_status='read'
        WHERE id=$id";

// Execute the SQL query using the database connection
$res = mysqli_query($conn, $sql);

?>
<?php

//Stats
// Query to retrieve total sales by hour
$sales_by_hour =  "SELECT date(order_date) as hname,
					sum(total_amount) as total_sales
					FROM order_manager
					GROUP BY date(order_date)";


$res_sales_by_hour = mysqli_query($conn, $sales_by_hour);

// Query to retrieve most sold items
$most_sold_items = "SELECT sum(Quantity) as total_qty,
							Item_Name as item_name
							FROM online_orders_new
							GROUP BY Item_Name
							";
$res_most_sold_items = mysqli_query($conn, $most_sold_items);

//Orders
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
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);

// Revenue Generated
// Query to calculate total revenue from successful orders
$revenue = "SELECT SUM(total_amount) AS total_amount FROM order_manager
			WHERE order_status='Delivered' ";
$res_revenue = mysqli_query($conn, $revenue);
$total_revenue = mysqli_fetch_array($res_revenue);

//Total Orders Delivered
// Query to get total delivered orders
$orders_delivered = "SELECT order_status FROM order_manager
					 WHERE order_status='Delivered'";
$res_orders_delivered = mysqli_query($conn, $orders_delivered);
$total_orders_delivered = mysqli_num_rows($res_orders_delivered);

//Message Notification
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
		google.charts.load("current", {
			packages: ["corechart"]
		});

		// Callback function to draw the chart when the library is loaded
		google.charts.setOnLoadCallback(drawChart);

		// Function to draw the chart
		function drawChart() {

			// Define the data for the chart
			var data = google.visualization.arrayToDataTable([
				['Item Name', 'Sales'],
				<?php
				//while($row_sales=mysqli_fetch_array($res_sales_by_month))
				while ($row_sales = mysqli_fetch_array($res_most_sold_items)) {

					// Loop through the result set of most sold items and generate chart data
					echo "['" . $row_sales["item_name"] . "', " . $row_sales["total_qty"] . "],";
				}

				?>

			]);

			// Define options for the chart
			var options = {
				title: 'Most Sold Items',
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
			var chart = new google.visualization.PieChart(document.getElementById('donutchart_msi'));

			// draws the chart using the specified data and options.
			chart.draw(data, options);

		}
	</script>

	<!-- Chart End -->

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
				['Time', 'Sales'],
				<?php

				// Loop through the result set of sales by hour and generate chart data
				while ($row_sales_by_hour = mysqli_fetch_array($res_sales_by_hour)) {
					echo "['" . $row_sales_by_hour["hname"] . "', " . $row_sales_by_hour["total_sales"] . "],";
				}

				?>


			]);

			// Define options for the chart
			var options = {
				hAxis: {
					title: 'Time',
					titleTextStyle: {
						color: 'Black'
					}
				},
				colors: ['#eb2f06', 'green'],

				chart: {
					title: 'Sales By Hour',




				}

			};

			// Create a new Bar chart and draw it in the specified HTML element
			var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

			// Draw the chart using the specified data and options
			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>


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
				<a href="tableorder-menu.php">
					<i class='bx bx-qr-scan'></i>
					<span class="text">Take Table Order</span>
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

	<!-- Dynamic DashBoard -->

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

			<a href="messages.php">
				<div class="fetch_message">
			</a>

			<a href="messages.php">
				<div class="action_message notfi_message">
					<i class='bx bxs-envelope'></i>
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

				<!-- Notification Bell Section -->
				<div class="notification" onclick="menuToggle();">
					<div class="action notif" onclick="menuToggle();">
						<i class='bx bxs-bell' onclick="menuToggle();"></i>
						<div class="notif_menu">
							<ul><?php

								if ($row_stock_notif > 0 and $row_stock_notif != 1) {
								?>
									<li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Items are running out of stock</li>
			</a>
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

		// Display total notification count if there are any notifications
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


			<div class="table-data-message">
				<div class="order">
					<div class=""></div>
					<table>

						<?php
						// Selecting a specific message based on the provided ID
						$read_message = "SELECT * FROM message WHERE id='$id'";
						$res_read_message = mysqli_query($conn, $read_message);

						// Checking if the query execution was successful
						if ($res_read_message == TRUE) {

							// Counting the number of rows returned
							$count_message = mysqli_num_rows($res_read_message);

							// Loop through each row in the result set
							while ($rows = mysqli_fetch_assoc($res_read_message)) {
								$name = $rows['name'];
								$phone = $rows['phone'];
								$subject = $rows['subject'];
								$message = $rows['message'];
								$date = $rows['date'];
								$message_status = $rows['message_status'];
						?>
								<tbody>

									<!-- Displaying information for each row -->
									<tr>
										<td><?php echo $name;  ?>
									<tr>
										<td><?php echo $phone; ?></td>
									</tr>
									<tr>
										<td><?php echo $date; ?></td>
									</tr>
									</tr>
									<tr>
										<td><?php echo $subject; ?></td>
									</tr>
									<tr>
										<td><?php echo $message; ?></td>

										<!-- Link to delete the current message -->
										<td><a href="<?php echo SITEURL; ?>delete-message.php?id=<?php echo $id; ?>" class="button-7" role="button">Delete</a></td>
									</tr>



							<?php

							}
						}

							?>

								</tbody>
					</table>
				</div>

			</div>


		</main>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>


</body>

</html>