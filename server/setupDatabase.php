<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
It is used for the initial set up of the database. It takes the inputs from the database form to connect to the users sql, and creates
a new database to store this website's data. It then creates tables for accounts, items, cartitems and wishlistitems.

Code Author(s): 

PHP - Luxsan Jeyasingam
HTML - Inigo Abeul
-->

<!DOCTYPE html>
<html>
<head>
    <title>Setup database</title>
</head>
<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $server = $_POST["server"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $conn = mysqli_connect($server, $username, $password);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sqlFile = 'sql/create_db.sql';

        $sql = file_get_contents($sqlFile);

        $sql = str_replace('%SERVER_NAME%', $server, $sql);

        if (mysqli_multi_query($conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database and user: " . mysqli_error($conn);
        }
        mysqli_close($conn);        

        session_start();
        $_SESSION['dbserver'] = $server;
        $_SESSION['dbusername'] = $username;
        $_SESSION['dbpassword'] = $password;

        include 'connectToDatabase.php';

        $sqlFile = 'sql/account.sql';

        $sql = file_get_contents($sqlFile);

        if (mysqli_multi_query($conn, $sql)) {
            echo "Created Account Tables";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);       
        
        include 'connectToDatabase.php';

        $sqlFile = 'sql/item.sql';

        $sql = file_get_contents($sqlFile);

        if (mysqli_multi_query($conn, $sql)) {
            echo "Created Item Tables";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);        
        
        include 'connectToDatabase.php';

        $sqlFile = 'sql/cartitem.sql';

        $sql = file_get_contents($sqlFile);

        if (mysqli_multi_query($conn, $sql)) {
            echo "Created Item Tables";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
                
        include 'connectToDatabase.php';

        $sqlFile = 'sql/wishlistitem.sql';

        $sql = file_get_contents($sqlFile);

        if (mysqli_multi_query($conn, $sql)) {
            echo "Created Item Tables";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);        


        header("Location: https://localhost/Web%20Dev%20A2/pages/register.html");
    }
    ?>
</body>
</html>