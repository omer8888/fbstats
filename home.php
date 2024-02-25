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
            <h3>Sprint #2 Stories (16,2 - 16,3)</h3>
            <p>(3h) users ORM: insert(save), getUser by username (do not use direct queries) - Done</p>
            <p>(30m) create empty default page template with css - Done</p>
            <p>(1h) MyProfile page - provide user details - Done</p>
            <p>(1d) improve home page - Done</p>
            <p>(1d) connect to live sport api - find free api and try demo MVP mode</p>
            <p>(2d) liveScore page - use the pai to display live gave of spain la-liga</p>
            <p>(1h) signup validation + security (register.php)</p>
            <p>(1h) generate random profile pic for each user, and shoe on MyProfile page</p>
            <p>(1h) About page - explain the goal, and creators</p>
            <p>(3h) Clean delete unused code - css , html require</p>
            <p>(3d) go Premium flow: option to purchase subscription that will get u better details (connect to paypal)</p>
            <p>(2d) buy t shirt flow</p>
            <p>(2d) shopping cart - BE</p>
            <p>(1d) improve mobile mode - hamburger menu, fix login view</p>
            <p>(1d) god mode - admin page (users counter, users edit mode, orders)</p>
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

