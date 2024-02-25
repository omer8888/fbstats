<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
$userName = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB Stats</title>
    <link rel="stylesheet" href="Resources/css/menu.css">
    <?php require_once('TopMenu.html'); ?>
    <link rel="stylesheet" href="Resources/css/base_page.css">
    <link rel="stylesheet" href="Resources/css/left_side_menu.css">
</head>
<body>
<?php require_once('left_side_menu.html'); ?>

<div class="main-content">
    <h2>Welcome back <?php echo $userName?></h2>
    <div class="website-info">
        <h3>about</h3>

    </div>
</div>
</div>

<footer class="footer">
    <div class="container">
        &copy; Omer Naim 2024
    </div>
</footer>
<script src="Resources/js/base_page.js"></script>
</body>
</html>

