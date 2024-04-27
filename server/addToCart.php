<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file allows users to add products to their shopping cart.
Code Author(s): 

PHP - Luxsan Jeyasingam -->

<!DOCTYPE html>
<html>
<head>
    <title>addToCart</title>
    <link rel="stylesheet" type="text/css" href="../2-css/search.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formType = $_POST['form_type'];
        $accountId = $_POST['accountId'];
        $itemId = $_POST['itemId'];
        $size = $_POST['size'];

        include 'connectToDatabase.php';

        if ($formType === "wishlistAddToCart") {
            $deleteFromWishlist = "DELETE FROM wishlistitem WHERE account_id = $accountId AND item_id = $itemId";
            $conn->query($deleteFromWishlist);
        }

        $accountId = $conn->real_escape_string($accountId);


        $addToCart = "INSERT INTO cartItem (account_id, item_id, size) VALUES ('$accountId', '$itemId', '$size')";
        $conn->query($addToCart);

        $url = "https://localhost/Web%20Dev%20A2/server/7-shopping-cart.php?account_id=$accountId";
        header("Location: $url");
    }

    ?>
</body>
</html>