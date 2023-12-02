<?php
// Include the constants.php file
include('config/constants.php');
?>

<?php

// Set the default timezone to Asia/Kuala_Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if the 'submit_message' button is clicked
    if (isset($_POST['submit_message'])) {

        // Retrieve form data
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $message_status = 'unread';
        $date = date("Y-m-d h:i:sa");

        // SQL query to insert the message into the 'message' table
        $send_message = "INSERT INTO `message`(`name`, `phone`, `subject`, `message`, `message_status`, `date`) VALUES ('$name','$phone','$subject','$message','$message_status','$date')";

        // Execute the query
        $res_send_message = mysqli_query($conn, $send_message);

        // Check if the message is sent successfully
        if ($res_send_message == true) {
            echo "<script>
                alert('Message Sent!'); 
                window.location.href='contact.php';
                </script>";
        }
        
        else {
            echo "<script>
                alert('Failed to send message'); 
                window.location.href='contact.php';
                </script>";
        }
    }
}

?>