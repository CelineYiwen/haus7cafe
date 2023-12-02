<?php
include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="css/eipay.css">
  <link rel="icon" type="image/png" href="../images/logo_ntx.png">

</head>

<body>

  <div class="container">
    <div class="brand-logo"></div>
    <div class="brand-title">Haus 7 Cafe</div>


    <?php
    // Check if the 'fail' session variable is set
    if (isset($_SESSION['fail'])) {

      // Display the failure message
      echo $_SESSION['fail'];

      // Unset (remove) the 'fail' session variable to avoid displaying it again
      unset($_SESSION['fail']);
    }
    ?>

    <!-- Form to navigate to the homepage -->
    <form action="<?php echo SITEURL ?>index.php">
      <button>Homepage</button>
    </form>


  </div>

</body>

</html>