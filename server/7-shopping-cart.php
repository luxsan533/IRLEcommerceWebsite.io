<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the landing page of our Assignment 2.
This contains the code of the structure of the webpage 1-index.html

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
        <link rel="stylesheet" type="text/css" href="../2-css/shopping-cart.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script src="..\3-js\shoppingCart.js"></script>
    </head>
    <body>
        <?php
            $id = $_GET['account_id'];

            include 'connectToDatabase.php';

            $cart = "SELECT *
            FROM account a JOIN cartitem ac ON a.id = ac.account_id
            JOIN item i ON ac.item_id = i.id
            WHERE a.id = $id";
            
            $result = $conn->query($cart);
            $numRows = mysqli_num_rows($result);

            $conn->close();
            include 'header.php'
        ?>
        <main>
                <div class="cart-container">
                    <div class="cart-title">
                        <h1>Shopping Cart</h1>
                    </div>
                    <div class="action-checkbox">
                        <input type="checkbox" id="checkbox-all" class="checkbox">
                        <label for="checkbox-all">Select all (<?php echo $numRows?>)</label>
                        <p>Delete</p>
                        <p>Add to Wishlist</p>
                    </div>
                    <div class="seller-container">
                        <ul class="cart-items">
                            <?php
                                while($row = $result->fetch_row()) {
                                    // $data[] = $row;
                                    // print_r($row);
                                    $params = array(
                                        'account_id' => $row[0],
                                        'size' => $row[7],
                                        'item_id' => $row[8],
                                        'Name' => $row[9],
                                        'FullPrice' => $row[10],
                                        'Image' => $row[11],
                                        'Brand' => $row[12],
                                        'Category' => $row[13],
                                        'Description' => $row[14],
                                        'SellerAccountId' => $row[15]
                                    );
                                                
                                    // Convert the array into a URL-encoded query string
                                    $queryString = http_build_query($params);
                                    // Combine with a base URL
                                    $url = '..\\pages\\3-product-description.php?' . $queryString;
                                    echo 
                                    "<li class='cart-item'>
                                        <div class='item-details'>
                                            <input type='checkbox' id='checkbox-item1' class='item-checkbox'>
                                            <img src='$row[11]' alt='Product 1'>
                                            <div class='item-info'>
                                                <h3>$row[9]</h3>
                                                <p class='item-detail item-price' id='price'>$$row[10]</p>                     
                                                <p class='item-detail' id='size'>Size: $row[7]</p>
                                                <div class='qty-and-buttons'>
                                                    <select name='quantity' class= 'quantity' size='1'>
                                                        <option value='1' selected>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                        <option value='5'>5</option>
                                                    </select>
                                                    <form method='post' action='deleteFromCart.php'>
                                                        <input type='hidden' name='form_type' value='deleteItem'>
                                                        <input type='hidden' name='accountId' value='$id'>
                                                        <input type='hidden' class='itemId' name='itemId' value='$row[8]'>
                                                        <input type='hidden' class='cartItemId' name='cartItemId' value='$row[4]'>
                                                        <button class='action-btn delete-btn'>Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </div>
                    
                    <form id="purchaseForm" action="deleteFromCart.php" method="post">
                        <input type="hidden" name="form_type" value="purchase">
                        <input type='hidden' name='accountId' value=<?php echo $id?>>
                        <div class="cart-summary">
                            <div class="summary-title">
                                <h3>Cart Summary</h3>
                            </div>
                        <div class="checkout-btn-price">
                            <p id="total-price"><span id="summary-item">Total (0 item): </span>$0.00</p>
                            <button class="checkout-btn">Checkout</button>
                        </div>
                        </div>
                    </form>
                </div>
        </main>
        <?php
            include 'footer.php'
        ?>
    </body>
</html>