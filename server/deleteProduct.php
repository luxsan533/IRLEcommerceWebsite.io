<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file allows users to delete products that they are selling.

Code Author(s): 

PHP - Luxsan Jeyasingam -->

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_POST['accountId'];
        $itemId = $_POST['itemId'];

        include 'connectToDatabase.php';

        $itemId = $_POST["itemId"];
        $deleteProduct = "DELETE FROM item WHERE id = $itemId";
        $conn->query($deleteProduct);
        $url = "https://localhost/Web%20Dev%20A2/server/account-page.php?account_id=1";
        header("Location: $url");
    }

?>
