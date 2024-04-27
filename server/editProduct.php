<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This file is used for back end management.
It is used to let users edit the information of the products that they sell.

Code Author(s): 

PHP - Luxsan Jeyasingam 

-->

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_POST['accountId'];
        $itemId = $_POST['itemId'];
        $productName = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $description = $_POST['description'];


        include 'connectToDatabase.php';

        $addProduct = "UPDATE item
        SET Name = '$productName',
            FullPrice = '$price',
            Image = '$image',
            Brand = '$brand',
            Category = '$category',
            Description = '$description',
            SellerAccountId = '$accountId'
        WHERE id = $itemId;
        ";
        $conn->query($addProduct);

        $url = "https://localhost/Web%20Dev%20A2/server/account-page.php?account_id=1";
        header("Location: $url");
    }
?>
