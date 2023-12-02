<?php
include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eat in Payment</title>
  <link rel="stylesheet" href="css/eipay.css">
  <link rel="icon" type="image/png" href="../images/logo_ntx.png">

</head>

<body>

  <div class="container">
    <div class="brand-logo"></div>
    <div class="brand-title">Haus 7 Cafe</div>



    <?php
    // Check if the 'success' session variable is set
    if (isset($_SESSION['success'])) {
      // Display the success message
      echo $_SESSION['success'];

      // Unset (remove) the 'success' session variable to avoid displaying it again
      unset($_SESSION['success']);
    }
    ?>

    <!-- Form to navigate to the homepage -->
    <form action="<?php echo SITEURL; ?>" method="POST">
      <button type="submit" name="submit" class="btn btn-primary btn-lg">Homepage</button>
    </form>


  </div>


</body>

</html>