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
    <!-- Forgot Password Form -->
    <div class="container">

        <div class="brand-title">Forgot Password</div>

        <form action="" class="inputs" method="POST" name="form1">

            <label>Username</label>
            <input type="text" placeholder="" name="username" required>

            <label>Email ID</label>
            <input type="email" name="email" required>

            <label>Contact Number</label>
            <input type="text" name="contact_no" required>

            <label>New Password</label>
            <input type="password" name="new_password" required>

            <label>Confirm New Password</label>
            <input type="password" name="confirm_new_password" required>

            <br>
            Remember your password?
            <a href="login.php">Back to Login</a>
            <br>

            <button type="submit" name="reset_password" value="reset_password">Reset Password</button>
        </form>

    </div>

</body>

</html>

<?php
include('config/constants.php');

if (isset($_POST['reset_password'])) {
    // echo "Clicked";

    //1. Get the data from form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contact_no'];
    $new_password = md5($_POST['new_password']);
    $confirm_new_password = md5($_POST['confirm_new_password']);

    //2. Check whether the user with current ID and Password exists or not
    $sql = "SELECT * FROM tbl_users WHERE username='$username' AND email='$email'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);


    if ($res == true) {
        //Check whether data is available or not
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //User exists and password can be changed
            //echo "User Found";
            //Check whether the new password and confirm password match or not
            if ($new_password == $confirm_new_password) {
                //Update the password
                //echo "Password Match";
                $sql2 = "UPDATE tbl_users SET
            password = '$new_password'
            WHERE id=$id
        ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Check whether the Query executed or not
                if ($res2 == true) {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";

                    //Redirecting the user
                    header('location:' . SITEURL . 'forgot-password.php');
                } else {
                    //Display error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Failed to Change Password. Try Again Please.</div>";

                    //Redirecting the user
                    header('location:' . SITEURL . 'forgot_password.php');
                }
            } else {
                $_SESSION['pwd-not-match'] = "<div class='error'>Passwords Did Not Match. Try Again Please.</div>";

                //Redirecting the user
                header('location:' . SITEURL . 'forgot_password.php');
            }
        } else {
            //User does not exist. Set message and redirect
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";

            //Redirecting the user
            header('location:' . SITEURL . 'forgot_password.php');
        }
    }
}

?>