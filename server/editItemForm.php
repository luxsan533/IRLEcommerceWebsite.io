<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the php file that is the edit item page form of our Assignment 2.
It is used to let users edit the information of the products that they sell.

Code Author(s): 

HTML - Inigo Abeul
PHP - Luxsan Jeyasingam 

-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Abuel-Jeyasingam-Icalina">
        <title>Sell Item</title>
        <link rel="stylesheet" type="text/css" href="../2-css/sellItem.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script src="..\3-js\validateProduct.js"></script>
    </head>
    <body>
        <?php
            $id = $_GET['account_id'];
            $item_id = $_GET['item_id'];
            $name = $_GET['Name'];
            $price = $_GET['FullPrice'];
            $image = $_GET['Image'];
            $brand = $_GET['Brand'];
            $category = $_GET['Category'];
            $description = $_GET['Description'];
        ?>
        <div class="container">
            <header class="header-logo-only">
                <a href="1-index.php?account_id=<?php echo $id?>"><img src="../0-assets/irl-logo/png/logo-no-background.png" title="Go to Home" alt="irl-logo"></a> 
            </header>           
            <main>                
            <form action="../server/editProduct.php" method="post" class="form" onsubmit="return validate()">
                <input type='hidden' name='accountId' value=<?php echo $id?>>

                    <h1 class="title">Edit Product</h1>              
                    
                    <div class="form-field">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" placeholder="Name of item" id="name" value="<?php echo $name?>">
                    </div>

                    <div class="form-field">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value=<?php echo $price ?>>
                    </div>

                    <div class="form-field">
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" placeholder="Item Brand" id="brand" value=<?php echo $brand ?>>
                    </div>
                    <div class="form-field">
                        <select name="category" id="category">
                            <option>Choose a category</option> 
                            <option value="Men" <?php if ($category == "Men") {echo "selected";} ?>>Men</option>
                            <option value="Ladies" <?php if ($category == "Ladies") {echo "selected";} ?>>Ladies</option>
                            <option value="Kids" <?php if ($category == "Kids") {echo "selected";} ?>>Kids</option>
                            <option value="Accessories" <?php if ($category == "Accessories") {echo "selected";} ?>>Accessories</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="image">Write the url for the image of the product</label>
                        <input type="text" name="image" id="image" value=<?php echo $image ?>>
                    </div>

                    <div class="form-field">
                        <label for="description">Description</label>
                        <br>
                        <textarea name="description" id="description" cols="91" rows="5" ><?php echo $description?></textarea>
                    </div>
                    <input type="hidden" name="itemId" value=<?php echo $item_id?>>
                    <button id="editProductButton" class="button" type="submit">Edit</button>
                </form>
            </main>
            <footer>
                <p>2024 IRL. All Rights Reserved.</p>
            </footer>
        </div>
    </body>
</html>