<?php
require_once("Resources/config.php");
require_once 'Resources/base_helper.php';
echo "first page Hello world \n it will be a great project";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = query("SELECT * FROM users WHERE username= $username");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Correct username and password
            $_SESSION['username'] = $username;
            echo "Login successful!";
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