<?php
require_once("Resources/config.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
$userName = $_SESSION['username'];
$userModel = (new UsersService())->getUserByUserName($userName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB Stats</title>
    <link rel="stylesheet" href="Resources/css/menu.css">
    <?php require_once('menu.html'); ?>
    <link rel="stylesheet" href="Resources/css/base_page.css">
    <link rel="stylesheet" href="Resources/css/left_side_menu.css">
</head>
<body>
<?php require_once('left_side_menu.html'); ?>

<div class="main-content">
    <h2>Welcome back <?php echo $userName?></h2>
    <div class="website-info">
        <div class="profile-container">
            <div class="profile-left">
                <img src="<?php echo $userModel->getProfilePic(); ?>" alt="Profile Picture">
            </div>
            <div class="profile-right">
                <p>FirstName: <?php echo $userModel->getFirstName() . ' ' . $userModel->getLastName(); ?></p>
                <p>UserName: <?php echo $userModel->getUserName(); ?></p>
                <p>Email: <?php echo $userModel->getEmail(); ?></p>
                <p>Joined on: <?php echo $userModel->getSignupDate(); ?></p>
                <!-- Add other user information as needed -->
                <button id="editProfileBtn">Edit Profile</button>
            </div>
        </div>
    </div>
</div>
</div>

<footer class="footer">
    <div class="container">
        &copy; Omer Naim 2024
    </div>
</footer>
<script src="Resources/js/base_page.js"></script>
<script src="Resources/js/editProfile.js"></script>
</body>
</html>
