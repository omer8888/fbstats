<?php
require_once("Resources/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userModel = (new UsersService())->getUserByUserName($username);

    if (password_verify($password, $userModel->getPassword())) {
        $_SESSION['username'] = $username;
        echo "Login successful!"; //using this for redirect
        exit();
    } else {
        echo "Incorrect password!";
    }
}

?>
