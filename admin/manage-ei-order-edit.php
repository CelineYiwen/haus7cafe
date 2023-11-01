<?php include('../frontend/config/constants.php'); 
include('login-check.php'); ?>
<?php
 

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
	<link rel="icon" 
      type="image/png" 
      href="../images/logo.png">

	<title>Haus 7 Cafe Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<img src="../images/logo.png" width="80px" alt="">
		</a>
		<ul class="side-menu top">
			<li >
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="manage-admin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Admin Panel</span>
				</a>
			</li>
			<li>
				<a href="manage-online-order.php">
					<i class='bx bxs-cart'></i>
					<span class="text">Online Orders&nbsp;</span>
						<?php 
					if($row_online_order_notif>0)
					{
						?>
						<span class="num-ei"><?php echo $row_online_order_notif; ?></span>
						<?php
					}
					else
					{
						?>
						<span class=""> </span>
						<?php
					}
					?>
				</a>
			</li>
			<li class="active">
				<a href="manage-ei-order.php">
					<i class='bx bx-qr-scan'></i>
					<span class="text" >Eat In Orders&nbsp;&nbsp;&nbsp;
						
					</span>
					<?php 
					if($row_ei_order_notif>0)
					{
						?>
						<span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
						<?php
					}
					else
					{
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
					<i class='bx bxs-log-out-circle' ></i>
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
			<i class='bx bx-menu' ></i>
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
						window.location.href='login.php';
						</script>";
  	
				<?php

				}
				?>
			</div> 
			<div class="fetch_message">
				<div class="action_message notfi_message">
					<a href="messages.php"><i class='bx bxs-envelope' ></i></a>
					<?php 

					if($row_message_notif>0)
					{
						?>
						<span class="num"><?php echo $row_message_notif; ?></span>
						<?php
					}
					else
					{
						?>
						<span class=""></span>
						<?php

					}
					?>
					
				</div>
					
			</div>
			<div class="notification" >
				<div class="action notif">
				<i class='bx bxs-bell' onclick= "menuToggle();"></i>
				<div class="notif_menu">
				<ul><?php 
							
							if($row_stock_notif>0 and $row_stock_notif !=1 )
							{
								?>
								<li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Items are running out of stock</li></a>
								<?php
							}
							else if($row_stock_notif == 1)
							{
								?>
								<li><a href="inventory.php"><?php echo $row_stock_notif ?>&nbsp;Item is running out of stock</li></a>
								<?php
							}
							else
							{
								
							}
							if($row_ei_order_notif>0)
							{
								?>
								<li><a href="manage-online-order.php"><?php echo $row_online_order_notif ?>&nbsp;New Online Order</li></a>
								<?php

							}
							if($row_online_order_notif>0)
							{
								?>
								<li><a href="manage-ei-order.php"><?php echo $row_ei_order_notif ?>&nbsp;New Eat In Order</li></a>
								<?php

							}
							?>
						
					</ul>
				</div>
				<?php 
				if($row_stock_notif>0 || $row_online_order_notif>0 || $row_ei_order_notif>0)
				{
				$total_notif = $row_online_order_notif+$row_ei_order_notif+$row_stock_notif;
					?>
					
					<span class="num"><?php echo $total_notif; ?></span>
					<?php
				}
				else
				{
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="manage-online-order.php">Eat In Orders</a>
						</li>
					</ul>
				</div>
				
			</div>
			<br/>

		<div class="table-data">
			<div class="order">
			<div class="head">

			<table class="">
                    <thead>
                        <tr>
							<th>Trans ID</th>
                            <th>Table ID</th>
							<th>Item Name</th>
							<th>Order Date</th>
                            <th>Total</th>
                            <th>Payment Status</th>
							<th>Order Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    <?php

$query = "SELECT * FROM `tbl_eipay` ORDER BY id DESC";

					
                    $user_result=mysqli_query($conn,$query);


                    while($user_fetch=mysqli_fetch_assoc($user_result))
                    {
						$tran_id = $user_fetch['tran_id'];
						$table_id = $user_fetch['table_id'];
						$ItemName = $user_fetch['ItemName'];
						$order_date = $user_fetch['order_date'];
						$amount = $user_fetch['amount'];
						$payment_status = $user_fetch['payment_status'];
						$order_status = $user_fetch['order_status'];
						?>
                        
                        <tr>
							<td><?php echo $tran_id; ?></td>
                            <td><?php echo $table_id; ?></td>
                            <td><?php echo $ItemName; ?></td>
							<td><?php echo $order_date; ?></td>
							<td><?php echo $amount; ?></td>					

                            <td>
							<?php 
							if($payment_status=="successful")
							{
								echo "<span class='status process'>$payment_status</span>";
							}
							else if($payment_status=="Processing")
							{
								echo "<span class='status pending'>$payment_status</span>";
							}
							
							?>
							</td>
							<td>
								<?php 
										if($order_status=="Pending")
											{
											echo "<span class='status process'>$order_status</span>";
											}
											else if($order_status=="Processing")
											{
											echo "<span class='status pending'>$order_status</span>";
											}
											else if($order_status=="Delivered")
											{
											echo "<span class='status completed'>$order_status</span>";
											}
											else if($order_status=="Cancelled")
											{
											echo "<span class='status cancelled'>$order_status</span>";
											}
							
											?>
											<br><br>

							<span>
							<a href="<?php echo SITEURL; ?>update-ei-order.php?tran_id=<?php echo $tran_id; ?>" class="button-5" role="button">Update</a>
                            				

										</span>
							</td>
							<?php
                            
                    }

                ?>
                    

            

                    </tbody>
                </table>                       
				</div>
				</div>
				
			</div>



			


	
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script-admin.js"></script>
</body>
</html>