<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the html file is the sign-in page of our Assignment 2.
This contains the code of the structure of the webpage 5-sign-in.html

Code Author(s): 

HTML - Inigo Abuel
PHP - Luxsan Jeyasingam
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Abuel-Jeyasingam-Icalina">
        <title>Your Account</title>
        <link rel="stylesheet" type="text/css" href="../2-css/account-page.css">
        <link rel="stylesheet" type="text/css" href="../2-css/wishlist-page.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $accountId = $_GET['account_id'];
            }
            
            include 'connectToDatabase.php';

            $accountInfo = "SELECT * FROM item i JOIN account a ON i.SellerAccountId = a.id WHERE a.id = $accountId";
        
            $result = $conn->query($accountInfo);
        
            if ($result->num_rows > 0) {
                function replaceNull($value) {
                    return $value === null ? 'noValue' : $value;
                }
        
                $data = array();
                while($row = $result->fetch_row()) {
                    $data[] = $row;
                    }
                } else {
                        echo "0 results";
                    }
            $name = $data[0][9];
            $email = $data[0][11];
            $conn->close();
            include "header.php"
        ?>
        <div id="account-info">
            <h1 class="info">Account Information</h1>
            <div class="info">
                <img src="../0-assets/irl-images/icon/user-regular-24.png" alt="account" title="Account">
                <h2>Full Name: <?php echo $name ?></h2>
            </div>
            <div class="info">
                <img src="../0-assets/irl-images/icon/user-regular-24.png" alt="account" title="Account">
                <h2>Email: <?php echo $email ?></h2>
            </div>
        <div id="products">
            <h1 class="info">Your products to sell</h1>
        </div>
        <div class="products-container">
            <?php
                foreach ($data as $row) {
                    $params = array(
                        'account_id' => $accountId,
                        'item_id' => $row[0],
                        'Name' => $row[1],
                        'FullPrice' => $row[2],
                        'Image' => $row[3],
                        'Brand' => $row[4],
                        'Category' => $row[5],
                        'Description' => $row[6],
                        'SellerAccountId' => $accountId,
                        'SellerName' => $row[9]
                    );
                                                
                    $queryString = http_build_query($params);
                    $productUrl = '..\\server\\3-product-description.php?' . $queryString;
                    $editUrl = '..\\server\\editItemForm.php?' . $queryString;
                    
                    echo 
                    "<div class='product'>
                        <a href='$productUrl'><img src='$row[3]' alt='product-1'></a>
                        <div class='desc'>
                            <h4>$row[1]</h4>
                            <h5>$$row[2]</h5>
                        </div>
                        <div class='addcart-delete'>
                            <a href='$editUrl'>
                                <button class='action-btn'>Edit Product</button>
                            </a>
                            <form method='post' action='deleteProduct.php'>
                                <input type='hidden' name='accountId' value='$id'>
                                <input type='hidden' class='itemId' name='itemId' value='$row[0]'>
                                <button class='action-btn'>Delete</button>
                            </form>
                        </div>
                    </div>";
                    }
                ?>
            </div>
            <form action="logout.php" method="get">
                <button class="signoutbutton">Sign Out</button>
            </form>
        <?php
            include "footer.php"
        ?>

    </body>
</html>