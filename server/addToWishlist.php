<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file allows users to add products to their shopping cart.
Code Author(s): 

PHP - Luxsan Jeyasingam -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $accountId = $_POST['accountId'];
        $itemId = $_POST['itemId'];

        include 'connectToDatabase.php';
   
        $addToWishlist = "INSERT INTO wishlistitem (account_id, item_id) VALUES ('$accountId', '$itemId')";
        $conn->query($addToWishlist);

        $url = "https://localhost/Web%20Dev%20A2/server/8-wishlist-page.php?account_id=$accountId";
        header("Location: $url");
    }

    ?>
</body>
</html>