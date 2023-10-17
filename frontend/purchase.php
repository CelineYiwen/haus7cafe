<?php include('config/constants.php'); ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/eipay.css">
    <link rel="icon" 
      type="image/png" 
      href="../images/logo.png">
    
</head>
<body>


 <?php 
 date_default_timezone_set('Asia/Kuala_Lumpur');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $cur_random_value = $_POST['tran_id'];
        $amount = $_POST['amount'];
        $username = $_POST['username'];
        $cus_name = $_POST['cus_name'];
        $cus_email = $_POST['cus_email'];
        $cus_add1 = $_POST['cus_add1'];
        $cus_city = $_POST['cus_city'];
        $cus_phone = $_POST['cus_phone'];
        $order_date = date("Y-m-d h:i:sa");
        
        $query1 = "INSERT INTO `order_manager`(`username`,`cus_name`, `cus_email`, `cus_add1`, `cus_city`, `cus_phone`, `payment_status`, `order_date`,`total_amount`,`transaction_id`,`order_status`) VALUES ('$_POST[username]','$_POST[cus_name]','$_POST[cus_email]','$_POST[cus_add1]','$_POST[cus_city]','$_POST[cus_phone]','$_POST[payment_status]','$order_date','$_POST[amount]','$_POST[tran_id]','Pending')";
        if(mysqli_query($conn,$query1))
        {
            $Order_Id = mysqli_insert_id($conn); 
            $query2 = "INSERT INTO `online_orders_new`(`order_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($conn,$query2);

            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_Name,$Price,$Quantity);

                foreach($_SESSION['cart'] as $key => $values)
                {
                    $Item_Name = $values['Item_Name'];
                    $Price = $values['Price'];
                    $Quantity = $values['Quantity'];
                    $Id = $values['Id'];
                    
                    mysqli_stmt_execute($stmt);

                $update_quantity_query = "UPDATE `tbl_food` SET
                                         stock = stock - $Quantity
                                         WHERE title = '$Item_Name'
                                         
                                        ";
                //echo $update_quantity_query;

                $res_update_quantity_query = mysqli_query($conn, $update_quantity_query);
                }

                unset($_SESSION['cart']);

                echo"<script>
                alert('Thank you for choosing our restaurant. We have received your order and it is being sent to the kitchen now. Our chefs will prepare your food with care and quality. We hope you enjoy your meal and have a wonderful day.');
                window.location.href='mycart.php';
                </script>";
                
            }
            else
            {
                echo"<script>
                alert('SQL Query Prepare Error');
                window.location.href='mycart.php';
                </script>";
            }

        }
        else
        {
            echo"<script>
            alert('SQL Error');
            window.location.href='mycart.php';
            </script>";
        }
    }

}

?>

</body>
</html>