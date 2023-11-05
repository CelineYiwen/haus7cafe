<?php

include('../frontend/config/constants.php');
include('login-check.php');

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


function getGUIDnoHash()
{
	mt_srand((float)microtime() * 10000);
	$charid = md5(uniqid(rand(), true));
	$c = unpack("C*", $charid);
	$c = implode("", $c);

	return substr($c, 0, 20);
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
				<img src="../images/logo1.jpg" width="80px" alt="">
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
			<li class="active">
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

			<li class="active">
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





		<!-- Your HTML content, including sidebar, navigation, and order form -->
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
							<a class="active" href="manage-online-order.php">Take Table Order</a>
						</li>
					</ul>
				</div>
			</div>

			<br>
			<div class="table-data">
				<div class="order">
					<div class="head"></div>
					<form action="" method="POST">
						<div class="left">
							<label for="tablenumber">Select Table:</label>
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
								<!-- Add options for other tables -->
							</select>
						</div>

						<div class="left">
							<label style="display: none;">GUID Value:</label>
							<span style="display: none;"><?php echo getGUIDnoHash(); ?></span>
						</div>
						<br>
						<br>
						<table class="">
							<tr>
								<th>S.N.</th>
								<th>Title</th>
								<th>Description</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
							<?php
							// Fetch menu items from the database
							$sql = "SELECT * FROM tbl_food WHERE active='Yes'";
							$res = mysqli_query($conn, $sql);
							$sn = 1; // Serial number counter
							while ($row = mysqli_fetch_assoc($res)) {
							?>
								<tr>
									<td><?php echo $sn++; ?>.</td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td>
										<input type="checkbox" name="selected_items[]" value="<?php echo htmlspecialchars(json_encode($row)); ?>">
									</td>
								</tr>
							<?php
							}
							?>
						</table>
						<input type="submit" name="submit" value="Send to Kitchen" class="button-8" role="button">
					</form>
				</div>
			</div>
		</main>

		<?php

		// Initialize variables for error handling
		$db_error = '';
		$order_success = false;

		if (isset($_POST['submit'])) {

			if (empty($_POST["tablenumber"])) {
				$db_error = "Please select table number.";
				echo "<script>
                    alert('Please select table number.'); 
                    </script>";
			} else {
				$table_id = $_POST['tablenumber'];
				$date = date("Y-m-d H:i:s");
				// Generate a unique identifier for trans_id
				$tran_id = getGUIDnoHash();

				$item_price = 0;
				$total_amount = 0;

				// Define an array to store selected items
				$selected_items = [];

				// Check if any items are selected
				if (!empty($_POST['selected_items'])) {
					$selected_items = $_POST['selected_items'];
				} else {
					$db_error = "Please select at least one item.";
					echo "<script>
                    alert('Please select at least one item.'); 
                    </script>";
				}

				// Loop through selected items and insert them into the database
				foreach ($selected_items as $item) {
					// Extract item details
					$item_data = json_decode($item, true);

					// Debugging: Output item_data
					var_dump($item_data);

					// Check if $item_data is not null
					if ($item_data) {

						$item_title = $item_data['title'];
						$item_price = $item_data['price'];

						$total_amount = $total_amount + $item_price;




						// Insert item details into tbl_eipay_details
						$Insertdetailquery = "INSERT INTO tbl_eipay_details (item_name, price, quantity, tran_id)
				VALUES ('$item_title', '$item_price', 1, '$tran_id')";

						$res_insert_detailquery = mysqli_query($conn, $Insertdetailquery);
					} else {
						echo "<script>alert('Item data is null.');</script>";
					}
				}

				// Insert the item into the tbl_eipay table
				$Insertquery = "INSERT INTO tbl_eipay (table_id, amount, order_date, payment_status, order_status, tran_id)
			VALUES ('$table_id', '$total_amount', '$date', 'Pending', 'Pending', '$tran_id')";

				$res_insert_query = mysqli_query($conn, $Insertquery);

				if ($res_insert_query) {
					echo "<script>alert('Order sent to kitchen.');</script>";
				} else {
					echo "<script>alert('Order failed to send to the kitchen.');</script>";
					echo "SQL Error: " . mysqli_error($conn); // Check for SQL errors
				}
			}
		}
		?>

</body>

</html>