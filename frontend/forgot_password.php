<?php
// Include the constants file
include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login-front.css">
    <link rel="icon" type="image/png" href="../images/logo.png">

    <title>Forgot Password</title>
</head>

<body>
    <!-- Reset Password Form -->
    <div class="container">

        <div class="brand-title">Forgot Password</div>

        <!-- Form for Resetting Password -->
        <form action="forgot_password.php" class="inputs" method="POST" name="form1">

            <!-- Username Input -->
            <label>Username</label>
            <input type="text" name="username" required>

            <!-- New Password Input -->
            <label>New Password</label>
            <input type="password" name="new-password" required>

            <!-- Retype New Password Input -->
            <label>Retype New Password</label>
            <input type="password" name="retype-password" required>

            <br>

            <!-- Password Requirements -->
            <label style="color: red;">* Password must contain the following:<br />
                One lowercase letter,<br />
                One capital (uppercase) letter,<br />
                A number,<br />
                A special symbol,<br />
                Minimum 8 characters long.<br />
            </label>

            <br>
            Remember your password?
            <a href="login.php">Back to Login</a>
            <!-- Back to Login Link -->
            <br>

            <br><br>

            <!-- Reset Password Button -->
            <button type="submit" name="reset_password" value="reset_password">Reset Password</button>
        </form>
    </div>

</body>

</html>


<?php

// Check if the reset_password form is submitted
if (isset($_POST['reset_password'])) {

    // Retrieve user input from the form
    $username = $_POST['username'];
    $newPassword = $_POST['new-password'];
    $retypePassword = $_POST['retype-password'];

    // Check if the new password meets security requirements
    if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $newPassword)) {

        // Check if the username exists in the database
        $check_username = "SELECT * FROM tbl_users WHERE username = '$username'";
        $res_check_username = mysqli_query($conn, $check_username);

        // If username exists
        if (mysqli_num_rows($res_check_username) > 0) {

            // Username exists, proceed to update the password
            if ($newPassword === $retypePassword) {

                // Hash the new password
                $hashedNewPassword = md5($newPassword);

                // Update the password in the database
                $update_password = "UPDATE tbl_users SET password = '$hashedNewPassword' WHERE username = '$username'";
                $res_update_password = mysqli_query($conn, $update_password);

                // Check if password update was successful
                if ($res_update_password) {
                    echo "<script>alert('Password reset successfully'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Failed to reset the password. Please try again.'); window.location.href='forgot_password.php';</script>";
                }
            } else {
                // Passwords do not match
                echo "<script>alert('Passwords do not match. Please retype the new password.'); window.location.href='forgot_password.php';</script>";
            }
        } else {
            // Username not found in the database
            echo "<script>alert('Username not found.'); window.location.href='forgot_password.php';</script>";
        }
    } else {
        // Password does not meet security requirements
        echo "<script>alert('Your password does not meet the security requirements. Please revise it to meet the password criteria.'); window.location.href='forgot_password.php';</script>";
    }
}
?>