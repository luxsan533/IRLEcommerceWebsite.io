<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the wishlist page of our Assignment 2.
This contains the code of the structure of the webpage 8-wishlist-page.html

Code Author(s): 

HTML - Robelene Icalina
PHP - Luxsan Jeyasingam
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Abuel-Jeyasingam-Icalina">
        <title>IRL</title>
        <link rel="stylesheet" type="text/css" href="../2-css/wishlist-page.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php
            $id = $_GET['account_id'];

            include 'connectToDatabase.php';

            $wishlist = "SELECT *
            FROM account a JOIN wishlistitem wc ON a.id = wc.account_id
            JOIN item i ON wc.item_id = i.id
            WHERE a.id = $id";
            
            $result = $conn->query($wishlist);
            $numRows = mysqli_num_rows($result);

            $conn->close();
            include 'header.php'
    ?>

    
    <main>
        <div class="wishlist-container">
            <h1>My Wishlist (<?php echo $numRows ?>)</h1>
            <div class="product-container">
            <?php
                while($row = $result->fetch_row()) {
                $params = array(
                    'account_id' => $row[0],
                    'item_id' => $row[7],
                    'Name' => $row[8],
                    'FullPrice' => $row[9],
                    'Image' => $row[10],
                    'Brand' => $row[11],
                    'Category' => $row[12],
                    'Description' => $row[13],
                    'SellerAccountId' => $row[14]
                );
                                            
                $queryString = http_build_query($params);
                $url = '..\\pages\\3-product-description.php?' . $queryString;
                echo 
                "<div class='product'>
                    <a href='#'><img src='$row[10]' alt='product-1'></a>
                    <div class='desc'>
                        <h4>$row[8]</h4>
                        <h5>$$row[9]</h5>
                    </div>
                    <div class='addcart-delete'>
                        <form method='post' action='addToCart.php'>
                            <input type='hidden' name='form_type' value='wishlistAddToCart'>
                            <input type='hidden' name='accountId' value='$id'>
                            <input type='hidden' class='itemId' name='itemId' value='$row[7]'>
                            <button class='action-btn'>Add to Cart</button>
                        </form>
                        <form method='post' action='deleteFromWishlist.php'>
                            <input type='hidden' name='accountId' value='$id'>
                            <input type='hidden' class='itemId' name='itemId' value='$row[7]'>
                            <button class='action-btn'>Delete</button>
                        </form>
                    </div>
                </div>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php
        include 'footer.php'
    ?>
    </body>
</html>