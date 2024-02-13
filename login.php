<?php
require_once("Resources/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = query("SELECT * FROM users WHERE user_name='{$username}'");
    confirm($result);
    if (isset($result) && mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Correct username and password
            $_SESSION['username'] = $username;
            echo "Login successful!"; //using this for redirect
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password!";
        }
    } else {
        // Username not found
        echo "Username not found!";
    }

}
?>
