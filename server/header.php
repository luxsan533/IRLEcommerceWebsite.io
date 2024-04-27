<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the header of the website that contains the search bar and a nav bar. Both can send users to result page.
The search bar will go to the results page and display products that contain the search word in its title.
The nav bar will go to the results page and display products that belong to the category that was clicked on, except
for the sell item link which will send users to the sell item form.
Code Author(s): 

PHP - Luxsan Jeyasingam
HTML - Robelene Icalina 
-->


<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['account_id'];
    } else {
        $id = $_POST['accountId'];
    }
?>
<script src="..\3-js\openSearchBox.js"></script>
<header class="header-container">
    <div class="nav-top">
        <div class="logo">
            <a href="1-index.php?account_id=<?php echo $id?>"><img src="../0-assets/irl-logo/png/logo-no-background.png" title="Go to Home" alt="irl-logo"></a> 
        </div>
        <form action="results.php?account_id=<?php echo $id ?>" method="post">
            <div class="search">
                <input type="hidden" name="accountId" value=<?php echo $id?>>
                <input type="text" name="search" placeholder="Search" class="search-box">
                <button type="submit">Go</button>
            </div>
        </form>
        <div class="icon-group">
            <a href="#" onclick="openSearchBox()"><img src="../0-assets/irl-images/icon/search-alt-2-regular-24.png" id="search-icon" alt="search" title="Search"></a>
            <a href="account-page.php?account_id=<?php echo $id?>"><img src="../0-assets/irl-images/icon/user-regular-24.png" alt="account" title="Account"></a>
            <a href="8-wishlist-page.php?account_id=<?php echo $id?>"><img src="../0-assets/irl-images/icon/heart-regular-24.png" alt="wishlist" title="Wishlist"></a>
            <a href="7-shopping-cart.php?account_id=<?php echo $id?>"><img src="../0-assets/irl-images/icon/shopping-bag-regular-24.png" alt="cart" title="Cart"></a>                        
        </div>    
    </div>
    <div class="nav-bottom">
        <ul class="navbar">
            <li><a href="results.php?account_id=<?php echo$id?>&category=Men">Men</a></li>
            <li><a href="results.php?account_id=<?php echo$id?>&category=Ladies">Ladies</a></li>
            <li><a href="results.php?account_id=<?php echo$id?>&category=Kids">Kids</a></li>
            <li><a href="sellItem.php?account_id=<?php echo$id?>">Sell</a></li>
        </ul>
    </div>
</header>
