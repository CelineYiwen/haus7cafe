<?php
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
        <form action="forgot_password.php" class="inputs" method="POST" name="form1">

            <label>Username</label>
            <input type="text" name="username" required>
            <label>New Password</label>
            <input type="password" name="new-password" required>
            <label>Retype New Password</label>
            <input type="password" name="retype-password" required>

            <br>

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
            <br>

            <br><br>

            <button type="submit" name="reset_password" value="reset_password">Reset Password</button>
        </form>
    </div>

</body>

</html>


<?php

if (isset($_POST['reset_password'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['new-password'];
    $retypePassword = $_POST['retype-password'];

    // Check if the new password meets security requirements
    if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[^A-Za-z0-9]).{8,}$/", $newPassword)) {

        // Check if the username exists in the database
        $check_username = "SELECT * FROM tbl_users WHERE username = '$username'";
        $res_check_username = mysqli_query($conn, $check_username);

        if (mysqli_num_rows($res_check_username) > 0) {

            // Username exists, proceed to update the password
            if ($newPassword === $retypePassword) {
                $hashedNewPassword = md5($newPassword);
                $update_password = "UPDATE tbl_users SET password = '$hashedNewPassword' WHERE username = '$username'";
                $res_update_password = mysqli_query($conn, $update_password);

                if ($res_update_password) {
                    echo "<script>alert('Password reset successfully'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Failed to reset the password. Please try again.'); window.location.href='forgot_password.php';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match. Please retype the new password.'); window.location.href='forgot_password.php';</script>";
            }
        } else {
            echo "<script>alert('Username not found.'); window.location.href='forgot_password.php';</script>";
        }
    } else {
        echo "<script>alert('Your password does not meet the security requirements. Please revise it to meet the password criteria.'); window.location.href='forgot_password.php';</script>";
    }
}
?>