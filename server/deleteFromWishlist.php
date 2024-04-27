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

        include 'connectToDatabase.php';

        $itemId = $_POST["itemId"];
        $deleteFromWishlist = "DELETE FROM wishlistitem WHERE account_id = $accountId AND item_id = $itemId";
        $conn->query($deleteFromWishlist);
        $url = "https://localhost/Web%20Dev%20A2/server/8-wishlist-page.php?account_id=$accountId";
        header("Location: $url");
    }
?>
