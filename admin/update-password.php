<?php include('../frontend/config/constants.php');
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
				<a href="manager-category.php">
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
							if ($row_ei_order_notif > 0) {
							?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;new EI order</li></a>
							<?php

							}
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
					<h1>Change Password</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Manage Admin</a>
						</li>
						<li>
							<a class="active" href="manage-admin.php">Change Password</a>
						</li>
					</ul>
				</div>

			</div>
			<?php
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}

			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<form action="" method="POST">
							<table class="tbl-30">
								<tr>
									<td>Current Password</td>
									<td>
										<input type="password" name="current_password" id="ip2">
									</td>
								</tr>

								<tr>
									<td>New Password</td>
									<td>
										<input type="password" name="new_password" id="ip2">
									</td>

								</tr>

								<tr>
									<td>Confirm Password</td>
									<td>
										<input type="password" name="confirm_password" id="ip2">
									</td>

								</tr>

								<tr>
									<td colspan="2">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="submit" name="submit" value="Change Password" class="button-8" role="button">
									</td>
								</tr>

							</table>

							<label>* Password security requirements: <br>
								Please include at least one number, <br>
								one alphabet character, and one special character. <br>
								Password must be at least 8 characters long.
							</label>

						</form>

					</div>
				</div>
			</div>

			<?php
			//Check whether the submit button is clicked or not
			if (isset($_POST['submit'])) {
				$id = $_POST['id'];
				$current_password = $_POST['current_password'];
				$new_password = $_POST['new_password'];
				$confirm_password = $_POST['confirm_password'];

				// Check if the new password meets security requirements
				if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $new_password)) {
					$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='" . md5($current_password) . "'";
					$res = mysqli_query($conn, $sql);

					if ($res == true) {
						$count = mysqli_num_rows($res);

						if ($count == 1) {
							if ($new_password == $confirm_password) {
								$hashedNewPassword = md5($new_password);

								$sql2 = "UPDATE tbl_admin SET password = '$hashedNewPassword' WHERE id=$id";
								$res2 = mysqli_query($conn, $sql2);

								if ($res2 == true) {
									$_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
									header('location:' . SITEURL . 'manage-admin.php');
								} else {
									$_SESSION['pwd-not-match'] = "<div class='error'>Failed to Change Password. Try Again Please.</div>";
									header('location:' . SITEURL . 'manage-admin.php');
								}
							} else {
								$_SESSION['pwd-not-match'] = "<div class='error'>Passwords Did Not Match. Try Again Please.</div>";
								header('location:' . SITEURL . 'manage-admin.php');
							}
						} else {
							$_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
							header('location:' . SITEURL . 'manage-admin.php');
						}
					} else {
						$_SESSION['change-pwd'] = "<div class='error'>Failed to verify the current password. Try Again Please.</div>";
						header('location:' . SITEURL . 'manage-admin.php');
					}
				} else {
					$_SESSION['pwd-not-match'] = "<div class='error'>New password does not meet security requirements. Please include at least one number, one alphabet character, and one special character. Password must be at least 8 characters long.</div>";
					header('location:' . SITEURL . 'manage-admin.php');
				}
			}


			?>






			</div>








		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>