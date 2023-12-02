<?php
// Include the constants.php file
include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags for character set, compatibility, and viewport -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Link to the admin CSS file with a version parameter to force cache refresh -->
  <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- Link to Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Link to Google Fonts (Poppins) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

  <!-- Link to the login-front CSS file -->
  <link rel="stylesheet" href="css/login-front.css">

  <!-- Link to the website favicon -->
  <link rel="icon" type="image/png" href="../images/logo.png">

  <!-- Title of the HTML page -->
  <title>Login</title>
</head>

<body>


  <!-- Sign In Form -->
  <div class="container">
    <div class="brand-logo"></div>
    <div class="brand-title">User Login</div>

    <!-- Form for User Login -->
    <form action="" class="inputs" method="POST" name="form1">

      <!-- Username Input -->
      <label>Username</label>
      <input type="text" name="username" required>

      <!-- Password Input -->
      <label>Password</label>
      <input type="password" name="password" required>

      <br>

      <!-- Forgot Password Link -->
      <a href="forgot_password.php">Forgot Password?</a>
      <br>

      <br>

      <!-- Sign Up Link -->
      Don't Have an account?
      <a href="register.php">Sign Up Here</a>
      <br>

      <!-- Login Button -->
      <button type="submit" name="submit" value="login">Login</button>

    </form>
  </div>



</body>

</html>

<?php

// Check if the login form is submitted
if (isset($_POST['submit'])) {

  // $username = $_POST['username'];
  // $password = md5($_POST['password']); //md5 encryption

  //Preventing From SQL Injection

  // Retrieve and sanitize user input
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));

  // Construct SQL query to check user credentials
  $sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
  $res = mysqli_query($conn, $sql);

  // Get the number of rows returned by the query
  $count = mysqli_num_rows($res);

  // Check if a user with the given credentials is found
  if ($count == 1) {
    // User found, login successful

    // Set a session variable indicating successful login
    $_SESSION['login']  = "<div class='success'>Login Successful</div>";

    // Set the 'user' session variable to the username
    $_SESSION['user'] = $username;

    // Redirect to the index.php page
    header('location:' . SITEURL . 'index.php');
  }
  
  else {
    // Display an alert for wrong username or password
    echo "<script>
                alert('Wrong Username or Password'); 
                window.location.href='login.php';
                </script>";
  }
}

?>