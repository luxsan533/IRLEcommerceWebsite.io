<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the product description page of our Assignment 2.
It display the information of a single specific product.

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
        <link rel="stylesheet" type="text/css" href="../2-css/product-description.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script src="..\3-js\product-description.js"></script>
        <script src="..\3-js\openSearchBox.js"></script>
    </head>
    <body>
    <?php
        $accountId = $_GET['account_id'];
        $itemId = $_GET['item_id'];
        $name = $_GET['Name'];
        $fullPrice = $_GET['FullPrice'];
        $image = $_GET['Image'];
        $seller = $_GET['Seller'];
        $brand = $_GET['Brand'];
        $category = $_GET['Category'];
        $description = $_GET['Description'];
        $sellerAccountId = $_GET['SellerAccountId'];
        $sellerName = $_GET['SellerName'];
        include 'header.php'
    ?>
        <main>
            <div class="product-main">
                <div class="product-img">
                    <img src="<?php echo "$image"?>" alt="product-1">
                </div>
                <div class="desc">
                    <div class="product-title">            
                        <h1><?php echo "$name"?></h1>
                        <span><?php echo "$brand"?></span>
                        <h2>$<?php echo "$fullPrice"?></h2>
                    </div>
                    <div class="product-size">
                        <p>SIZE</p>
                        <ul>
                            <li class="sizeButton">S</li>
                            <li class="sizeButton">M</li>
                            <li class="sizeButton">L</li>
                            <li class="sizeButton">XL</li>
                        </ul>
                    </div>
                    <?php if ($accountId != $sellerAccountId) {echo "
                        <div class='wishlist-add'>
                        <form action='addToCart.php' method='post'>
                            <input type='hidden' name='form_type' value='productAddToCart'>
                            <input type='hidden' name='accountId' value= $accountId>
                            <input type='hidden' name='itemId' value= $itemId>
                            <input type='hidden' name='size' value='S' id='sizeInput'>
                            <button type='submit'>Add to Cart</button>
                        </form>
                        <form action='addToWishlist.php' method='post'>
                            <input type='hidden' name='accountId' value=$accountId>
                            <input type='hidden' name='itemId' value= $itemId>
                            <button type='submit'>Add to Wishlist</button>
                        </form>
                        </div>";}
                    ?>
                    <div class="sold-by">
                        <p>SOLD BY: <?php echo "$sellerName" ?></p>
                        <div class="seller-info">
                            <div class="seller-photo">
                                <img src="../0-assets/irl-logo/png/logo-black.png"> 
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="product-details">
                <h3>Description</h3>
                <p><?php echo $description ?></p>
            </div>
        </main>
        <?php
            include 'footer.php'
        ?>
    </body>
</html>