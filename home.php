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
    <title>FB Stats</title>
    <link rel="stylesheet" href="Resources/css/home.css">
</head>
<body>
<div class="top-menu">
    <div class="container">
        <div class="logo">FBstats</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">LiveNow</a></li>
            <li><a href="#">FavoriteGames</a></li>
            <li><a href="#">MyAccount</a></li>
            <li><a href="#">Contect</a></li>
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
        <h1>Welcome to FB stats Website</h1>
        <p>This is main content.</p>
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
        &copy; Omer Naim 2024
    </div>
</footer>
</body>
</html>

