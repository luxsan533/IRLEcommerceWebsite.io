<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used to display the results page.
It is reached after a user uses the search bar and searches for a word or uses the nav bar. It display all products that
contain the searched word or based on the category.

Code Author(s): 

PHP - Luxsan Jeyasingam
HTML - Robelene Icalina
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Abuel-Jeyasingam-Icalina">
        <title>IRL</title>
        <link rel="stylesheet" type="text/css" href="../2-css/results.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script src="..\3-js\filterResults.js"></script>
    </head>
    <body>
    <?php
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $accountId = $_POST['accountId'];
            $searchWord = $_POST['search'];
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $accountId = $_GET['accountId'];
            $searchWord = "";
            $category = $_GET['category'];        
        }
    
        include 'connectToDatabase.php';

        if ($searchWord != '') {
            $items = "SELECT * FROM item i JOIN account a ON i.SellerAccountId = a.id WHERE i.Name LIKE '%$searchWord%'";
        } else {
            $items = "SELECT * FROM item i JOIN account a ON i.SellerAccountId = a.id";
        }
        $result = $conn->query($items);
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

        $conn->close();
        include 'header.php';
    ?>
    <main>
        <div class="main-container">
            <div class="filter-container">
                <div class="cat-link">
                    <a href="#">HOME / CATEGORIES <?php echo "$accountId" ?></a>
                </div>
                <div class="filter">
                    <p class="filter-title">FILTER</p>
                    <hr>
                    <div class="category-container">
                        <p>CATEGORY</p>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-men" class="filter-checkbox">
                            <!-- echo "<div class='product category-$item[7]'> -->
                            <label for="checkbox-men">MEN</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-ladies" class="filter-checkbox">
                            <label for="checkbox-ladies">LADIES</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-kids" class="filter-checkbox">
                            <label for="checkbox-kids">KIDS</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-accessories" class="filter-checkbox">
                            <label for="checkbox-accessories">ACCESSORIES</label>
                        </div>
                    </div>
                    <div class="category-container">
                        <p>PRICE</p>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-50" class="filter-checkbox price-filter">
                            <label for="checkbox-50">$0.00 - $50.00</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-100" class="filter-checkbox price-filter">
                            <label for="checkbox-100">$50.00 - $100.00</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-150" class="filter-checkbox price-filter">
                            <label for="checkbox-150">$100.00 - $150.00</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-200" class="filter-checkbox price-filter">
                            <label for="checkbox-200">$150.00 - $200.00</label>
                        </div>
                        <div class="cat-checkbox">
                            <input type="checkbox" id="checkbox-200plus" class="filter-checkbox price-filter">
                            <label for="checkbox-200plus">ABOVE $200</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-product">
                <div class="title-filter">
                    <h1>Results</h1>
                    <div class="filter-icon">
                        <a href="#"><img src="../0-assets/irl-images/icon/bx-filter.svg" alt="add-to-cart"></a>
                        <p>Filter</p>
                    </div>
                </div>
                <div class="product-container">
                    <?php
                        foreach ($data as $index => $item) {

                            $params = array(
                                'account_id' => $accountId,
                                'item_id' => $item[0],
                                'Name' => $item[1],
                                'FullPrice' => $item[2],
                                'Image' => $item[3],
                                'Brand' => $item[4],
                                'Category' => $item[5],
                                'Description'=> $item[6],
                                'SellerAccountId' => $item[8],
                                'SellerName' => $item[9],

                            );
                            
                            $queryString = http_build_query($params);
                            
                            $url = '..\\server\\3-product-description.php?' . $queryString;

                            echo "<div class='product category-$item[5] price-$item[2]'>
                            <a href=$url><img id='itemImage' src=$item[3] alt='product-$index'></a>
                            <div class='desc'>
                                <span>$item[4]</span>
                                <h4>$item[1]</h4>
                                <div class='price-addcart'>
                                    <h5>$item[2]</h5>
                                </div>
                            </div>
                        </div>";
                        }
                    ?>
                </div>  
            </div>
        </div>
    </main>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "<script> categorizeResults('$category') </script>";
    }
    include 'footer.php';
    ?>
    </body>
</html>