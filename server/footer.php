<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313
This is the footer of the website that contains various links and is on every page.
Code Author(s): 

PHP - Luxsan Jeyasingam
HTML - Robelene Icalina 

-->

<link rel="stylesheet" type="text/css" href="../2-css/index.css">
<footer>
        <div class="footer-container">
            <div class="footer-links">
                <section class="footer-categories">
                    <h3>CATEGORIES</h3>
                    <ul>
                        <li><a href="results.php?account_id=<?php echo$id?>&category=Men">Men</a></li>
                        <li><a href="results.php?account_id=<?php echo$id?>&category=Ladies">Ladies</a></li>
                        <li><a href="results.php?account_id=<?php echo$id?>&category=Kids">Kids</a></li>
                        <li><a href="sellItem.php?account_id=<?php echo$id?>">Sell</a></li>
                    </ul>
                </section>
                <section class="footer-custsvc">
                    <h3>CUSTOMER SERVICE</h3>
                    <ul>
                        <li><a href="account-page.php?account_id=<?php echo $id?>">Account</a></li>
                        <li><a href="../pages/register.html">Sign Up</a></li>
                    </ul>
                </section>
                <section class="footer-company">
                    <h3>COMPANY</h3>
                    <ul>
                        <li><a href="../pages/about.html">About Us</a></li>
                        <li><a href="../pages/contact.html">Contact Us</a></li>
                    </ul>
                </section>
            </div>               
        </div>
    <p>2024 IRL. All Rights Reserved.</p>
</footer>