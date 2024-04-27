<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This is lets users login after the input their information to the sign-in page.
If the information is correct they will be sent to index.php. If not they will return to the sign-in page.

Code Author(s): 

PHP - Luxsan Jeyasingam
-->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


    include 'connectToDatabase.php';

    $findUser = "SELECT * FROM account WHERE email = '$email'";
    $result = $conn->query($findUser);

    if ($result->num_rows > 0) {
        $userAccount = $result->fetch_row();
        if ($userAccount[2] == $password) { 
            header("Location: https://localhost/Web%20Dev%20A2/server/1-index.php?account_id=$userAccount[0]");
            $conn->close();
            exit();        
    } else {
        header("Location: https://localhost/Web%20Dev%20A2/pages/sign-in.html?invalid=incorrectPass");
        $conn->close();
        exit();
    }} 
    else {
        header("Location: https://localhost/Web%20Dev%20A2/pages/sign-in.html?invalid=emailNotExist");
        $conn->close();
        exit();
    }
    }

    
    ?>
</body>
</html>