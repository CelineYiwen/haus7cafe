<?php include('config/constants.php'); ?> 

<?php
// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if the "Add To Cart" button is clicked
    if (isset($_POST['Add_To_Cart'])) {

        // Check if the cart session variable exists
        if (isset($_SESSION['cart'])) {

            // Extract the 'Item_Name' column from the cart session variable
            $myitems = array_column($_SESSION['cart'], 'Item_Name');

            // Check if the selected item is already in the cart
            if (in_array($_POST['Item_Name'], $myitems)) {

                // Display an alert if the item is already in the cart
                echo "<script>
                alert('Item Already In Cart'); 
                window.location.href='menu.php';
                </script>";
            } else {

                // Add the selected item to the cart session variable
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Id' => $_POST['Id'], 'Quantity' => 1);

                // Display an alert indicating that the item has been added to the cart
                echo "<script>
                alert('Added To Cart'); 
                window.location.href='menu.php';
                </script>";
            }
        } else {
            // If the cart session variable doesn't exist, create it and add the selected item
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Id' => $_POST['Id'], 'Quantity' => 1);

            // Display an alert indicating that the item has been added to the cart
            echo "<script>
                alert('Added To Cart'); 
                window.location.href='menu.php';
                </script>";
        }
    }

    // Check if the "Remove Item" button is clicked
    if (isset($_POST['Remove_Item'])) {

        // Iterate through each item in the cart session variable
        foreach ($_SESSION['cart'] as $key => $value) {

            // Check if the current item matches the one to be removed
            if ($value['Item_Name'] == $_POST['Item_Name']) {

                // Remove the item from the cart session variable
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);

                // Display an alert indicating that the item has been removed from the cart
                echo "<script>
            alert('Item Removed From Cart');
            window.location.href='mycart.php';
            
            </script>";
            }
        }
    }

    // Check if the "Modify Quantity" button is clicked
    if (isset($_POST['Mod_Quantity'])) {

        // Iterate through each item in the cart session variable
        foreach ($_SESSION['cart'] as $key => $value) {

            // Check if the current item matches the one for which the quantity is to be modified
            if ($value['Item_Name'] == $_POST['Item_Name']) {

                // Update the quantity of the selected item in the cart session variable
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];

                // Display an alert indicating that the cart has been updated
                echo "<script>
            alert('Cart Updated');
            window.location.href='mycart.php';
            </script>";
            }
        }
    }
}


?>