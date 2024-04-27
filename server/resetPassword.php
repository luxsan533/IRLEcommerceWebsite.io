<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This lets users create a new password. After setting a new password users will be sent back to the sign-in page.

Code Author(s): 

PHP - Luxsan Jeyasingam
-->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            include 'connectToDatabase.php';

            $findUser = "SELECT * FROM account WHERE email = '$email'";
            $result = $conn->query($findUser);

            if ($result->num_rows > 0) {
                $changePassword = "UPDATE account
                SET password = '$password'
                WHERE email = '$email'";

                if ($conn->query($changePassword) === TRUE) {
                    echo "<h3>Password changed successfully</h3>";
                    header("Location: https://localhost/Web%20Dev%20A2/pages/sign-in.html");
                    $conn->close();
                    exit();
                } 
            } else {
                header("Location: https://localhost/Web%20Dev%20A2/pages/sign-in.html?invalid=emailNotExist");
                $conn->close();
                exit();
            }
        } else {
            echo "Email or password is missing.";
        }
    }
?>