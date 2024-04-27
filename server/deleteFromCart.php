<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file allows users to delete products from their shopping cart.
Code Author(s): 

PHP - Luxsan Jeyasingam -->

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_POST['accountId'];
        $formType = $_POST['form_type'];
        // echo "<h1>$formType</h1>";

        include 'connectToDatabase.php';

        if ($formType === "deleteItem") {
            $itemId = $_POST["itemId"];
            $cartItemId = $_POST["cartItemId"];

            $deleteFromCart = "DELETE FROM cartItem WHERE id = $cartItemId";
            $conn->query($deleteFromCart);
        } else {
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'cartitemId-') === 0) {
                    $deleteFromCart = "DELETE FROM cartItem WHERE id = $value";  
                    $conn->query($deleteFromCart);
                }
            }
        }
        // $url = "https://localhost/Web%20Dev%20A2/server/1-index.php?account_id=$accountId";
        $url = "https://localhost/Web%20Dev%20A2/server/7-shopping-cart.php?account_id=$accountId";
        header("Location: $url");
    }
?>
