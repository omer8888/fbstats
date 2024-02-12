<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="Resources/css/home.css">
</head>
<body>
<div class="top-menu">
    <div class="container">
        <div class="logo">Your Logo</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</div>

<div class="content-wrapper">
    <div class="left-sidebar">
        <!-- Left sidebar content (live scores) will go here -->
        <h3>Top Live Scores</h3>
        <ul class="live-scores">
            <!-- Example football games will go here -->
            <li>Game 1</li>
            <li>Game 2</li>
            <li>Game 3</li>
            <li>Game 4</li>
        </ul>
    </div>

    <div class="main-content">
        <!-- Main content of the page will go here -->
        <h1>Welcome to Your Website</h1>
        <p>This is where your main content goes.</p>
        <div class="website-info">
            <h2>About Us</h2>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
            <p>a</p>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        &copy; 2024 Your Website Footer
    </div>
</footer>
</body>
</html>

