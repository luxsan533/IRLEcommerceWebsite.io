<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file saves the products created by users to the database.

Code Author(s): 

PHP - Luxsan Jeyasingam -->

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_POST['accountId'];
        $productName = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $description = $_POST['description'];

        include 'connectToDatabase.php';

        $addProduct = "INSERT INTO item (Name, FullPrice, Image, Brand, Category, Description, SellerAccountId) 
        VALUES ('$productName', '$price', '$image', '$brand', '$category', '$description', '$accountId')";
        $conn->query($addProduct);

        $url = "https://localhost/Web%20Dev%20A2/server/account-page.php?account_id=$accountId";
        header("Location: $url");
    }

    ?>
