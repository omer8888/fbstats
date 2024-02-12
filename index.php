<?php
require_once("Resources/config.php");
// Check if user is logged in
if(isset($_SESSION['username'])){
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Resources/css/register_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>Join now!</h2>
        <form id="signupForm" method="post">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" id="signupBtn">Sign Up</button>
        </form>
        <p id="message"></p>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="Resources/js/register.js"></script>
</body>
</html>
