<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the landing page of our Assignment 2.
This contains the code of the structure of the webpage 1-index.html

Code Author(s): 
     
HTML - Robelene Icalina
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Abuel-Jeyasingam-Icalina">
        <title>IRL</title>
        <link rel="stylesheet" type="text/css" href="../2-css/index.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include 'header.php'
        ?>
        <main class="main-container">
            <div class="landing-page">
                <div class="landing-video">
                    <video autoplay muted>
                        <source src="../0-assets/irl-images/index-img/pexels-landing-video(1080p).mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="categories">
                <div class="categories-container">
                    <h1>Shop By Categories</h1>
                    <div class="cat-img-container">
                        <div class="category-img">
                            <a href="#"><img src="../0-assets/irl-images/index-img/pexels-man.jpg" alt="Go to Man's Section" title="Go to Man's Section"></a>
                        </div>
                        <div class="category-img">
                            <a href="#"><img src="../0-assets/irl-images/index-img/pexels-ladies.jpg" alt="Go to Ladies's Section" title="Go to Ladies's Section"></a>
                        </div>
                        <div class="category-img">
                            <a href="#"><img src="../0-assets/irl-images/index-img/pexels-kids.jpg" alt="Go to Kid's Section" title="Go to Kid's Section"></a>
                        </div>
                        <div class="category-img">
                            <a href="#"><img src="../0-assets/irl-images/index-img/pexels-accessories.jpg" alt="Go to Accessories's Section" title="Go to Accessories's Section"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-banner">
                <img src="../0-assets/irl-images/index-img/canva-banner.png" alt="Black Friday Sale!">
            </div>
            <div class="feature-product">
                <h2>Featured Products</h2>
                <p>Spring Collection</p>
                <div class="product-container">
                    <div class="product">
                        <a href="#"><img src="../0-assets/irl-images/products/f1.jpg" alt="product-1"></a>
                        <div class="desc">
                            <span>adidas</span>
                            <h3>Cartoon Astronaut T-shirt</h3>
                            <h4>$78</h4>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="../0-assets/irl-images/products/f1.jpg" alt="product-1"></a>
                        <div class="desc">
                            <span>adidas</span>
                            <h3>Cartoon Astronaut T-shirt</h3>
                            <h4>$78</h4>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="../0-assets/irl-images/products/f1.jpg" alt="product-1"></a>
                        <div class="desc">
                            <span>adidas</span>
                            <h3>Cartoon Astronaut T-shirt</h3>
                            <h4>$78</h4>
                        </div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="../0-assets/irl-images/products/f1.jpg" alt="product-1"></a>
                        <div class="desc">
                            <span>adidas</span>
                            <h3>Cartoon Astronaut T-shirt</h3>
                            <h4>$78</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </main>
        <?php
            include 'footer.php'
        ?>
    </body>
</html>