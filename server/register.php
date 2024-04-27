<!--
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This is lets users create accounts after they input their information to the register html page.
If the information is correct they will be sent to index.php. If not they will return to the sign-in page.

Code Author(s): 

PHP - Luxsan Jeyasingam
-->

<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpw = $_POST['confirm-pw'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        include 'connectToDatabase.php';

        $addAccount = "INSERT INTO account (name, password, email) VALUES ('$name', '$password', '$email')";

        if ($conn->query($addAccount) === TRUE) {
          echo "<script>alert('Account created. Redirecting you to sign in.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
        header("Location: https://localhost/Web%20Dev%20A2/pages/sign-in.html");
        $conn->close();
    }
?>
</body>
</html>